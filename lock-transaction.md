# Locking and Transaction

## Shared and Exclusive Locks

InnoDB implements standard row-level locking where there are two types of locks, shared (S) locks and exclusive (X) locks.

- A shared (S) lock permits the transaction that holds the lock to read a row.

- An exclusive (X) lock permits the transaction that holds the lock to update or delete a row.

If transaction T1 holds a shared (S) lock on row r, then requests from some distinct transaction T2 for a lock on row r are handled as follows:

- A request by T2 for an S lock can be granted immediately. As a result, both T1 and T2 hold an S lock on r.

- A request by T2 for an X lock cannot be granted immediately.

If a transaction T1 holds an exclusive (X) lock on row r, a request from some distinct transaction T2 for a lock of either type on r cannot be granted immediately. Instead, transaction T2 has to wait for transaction T1 to release its lock on row r.

https://dev.mysql.com/doc/refman/8.4/en/innodb-locking.html#innodb-shared-exclusive-locks

## Intention Locks

InnoDB supports multiple granularity locking which permits coexistence of row locks and table locks. For example, a statement such as LOCK TABLES ... WRITE takes an exclusive lock (an X lock) on the specified table. To make locking at multiple granularity levels practical, InnoDB uses intention locks. Intention locks are table-level locks that indicate which type of lock (shared or exclusive) a transaction requires later for a row in a table. There are two types of intention locks:

- An intention shared lock (IS) indicates that a transaction intends to set a shared lock on individual rows in a table.

- An intention exclusive lock (IX) indicates that a transaction intends to set an exclusive lock on individual rows in a table.

For example, SELECT ... FOR SHARE sets an IS lock, and SELECT ... FOR UPDATE sets an IX lock.

The intention locking protocol is as follows:

- Before a transaction can acquire a shared lock on a row in a table, it must first acquire an IS lock or stronger on the table.

- Before a transaction can acquire an exclusive lock on a row in a table, it must first acquire an IX lock on the table.

Table-level lock type compatibility is summarized in the following matrix.

![comatibility](https://github.com/user-attachments/assets/da34f4f0-53c7-42f4-8883-12f31f5b1516)


A lock is granted to a requesting transaction if it is compatible with existing locks, but not if it conflicts with existing locks. A transaction waits until the conflicting existing lock is released. If a lock request conflicts with an existing lock and cannot be granted because it would cause deadlock, an error occurs.

Intention locks do not block anything except full table requests (for example, LOCK TABLES ... WRITE). The main purpose of intention locks is to show that someone is locking a row, or going to lock a row in the table.

Transaction data for an intention lock appears similar to the following in SHOW ENGINE INNODB STATUS and InnoDB monitor output:

    TABLE LOCK table `test`.`t` trx id 10080 lock mode IX

## Record Locks

A record lock is a lock on an index record. For example, SELECT c1 FROM t WHERE c1 = 10 FOR UPDATE; prevents any other transaction from inserting, updating, or deleting rows where the value of t.c1 is 10.

Record locks always lock index records, even if a table is defined with no indexes. For such cases, InnoDB creates a hidden clustered index and uses this index for record locking.

Transaction data for a record lock appears similar to the following in SHOW ENGINE INNODB STATUS and InnoDB monitor output:

    RECORD LOCKS space id 58 page no 3 n bits 72 index `PRIMARY` of table `test`.`t`
    trx id 10078 lock_mode X locks rec but not gap
    Record lock, heap no 2 PHYSICAL RECORD: n_fields 3; compact format; info bits 0
     0: len 4; hex 8000000a; asc     ;;
     1: len 6; hex 00000000274f; asc     'O;;
     2: len 7; hex b60000019d0110; asc        ;;

https://dev.mysql.com/doc/refman/8.4/en/innodb-locking.html#innodb-record-locks

## Gap Locks

A gap lock is a lock on a gap between index records, or a lock on the gap before the first or after the last index record. For example, SELECT c1 FROM t WHERE c1 BETWEEN 10 and 20 FOR UPDATE; prevents other transactions from inserting a value of 15 into column t.c1, whether or not there was already any such value in the column, because the gaps between all existing values in the range are locked.

A gap might span a single index value, multiple index values, or even be empty.

## Next-Key Locks

A next-key lock is a combination of a record lock on the index record and a gap lock on the gap before the index record.

Transaction data for a next-key lock appears similar to the following in SHOW ENGINE INNODB STATUS and InnoDB monitor output:


    RECORD LOCKS space id 58 page no 3 n bits 72 index `PRIMARY` of table `test`.`t`
    trx id 10080 lock_mode X
    Record lock, heap no 1 PHYSICAL RECORD: n_fields 1; compact format; info bits 0
     0: len 8; hex 73757072656d756d; asc supremum;;
    
    Record lock, heap no 2 PHYSICAL RECORD: n_fields 3; compact format; info bits 0
     0: len 4; hex 8000000a; asc     ;;
     1: len 6; hex 00000000274f; asc     'O;;
     2: len 7; hex b60000019d0110; asc        ;;

## Insert Intention Locks

An insert intention lock is a type of gap lock set by INSERT operations prior to row insertion. This lock signals the intent to insert in such a way that multiple transactions inserting into the same index gap need not wait for each other if they are not inserting at the same position within the gap. Suppose that there are index records with values of 4 and 7. Separate transactions that attempt to insert values of 5 and 6, respectively, each lock the gap between 4 and 7 with insert intention locks prior to obtaining the exclusive lock on the inserted row, but do not block each other because the rows are nonconflicting.

Transaction data for an insert intention lock appears similar to the following in SHOW ENGINE INNODB STATUS and InnoDB monitor output:

    RECORD LOCKS space id 31 page no 3 n bits 72 index `PRIMARY` of table `test`.`child`
    trx id 8731 lock_mode X locks gap before rec insert intention waiting
    Record lock, heap no 3 PHYSICAL RECORD: n_fields 3; compact format; info bits 0
     0: len 4; hex 80000066; asc    f;;
     1: len 6; hex 000000002215; asc     " ;;
     2: len 7; hex 9000000172011c; asc     r  ;;...

## AUTO-INC Locks

An AUTO-INC lock is a special table-level lock taken by transactions inserting into tables with AUTO_INCREMENT columns. In the simplest case, if one transaction is inserting values into the table, any other transactions must wait to do their own inserts into that table, so that rows inserted by the first transaction receive consecutive primary key values.

## reference

https://mp.weixin.qq.com/s/EjKtAj9H6KpuRlWAfoLYSA

## transaction isolation level

### REPEATABLE READ

This is the default isolation level for InnoDB. Consistent reads within the same transaction read the snapshot established by the first read. This means that if you issue several plain (nonlocking) SELECT statements within the same transaction, these SELECT statements are consistent also with respect to each other. See Section 17.7.2.3, “Consistent Nonlocking Reads”.

For locking reads (SELECT with FOR UPDATE or FOR SHARE), UPDATE, and DELETE statements, locking depends on whether the statement uses a unique index with a unique search condition, or a range-type search condition.

- For a unique index with a unique search condition, InnoDB locks only the index record found, not the gap before it.

- For other search conditions, InnoDB locks the index range scanned, using gap locks or next-key locks to block insertions by other sessions into the gaps covered by the range. For information about gap locks and next-key locks, see Section 17.7.1, “InnoDB Locking”.

It is not recommended to mix locking statements (UPDATE, INSERT, DELETE, or SELECT ... FOR ...) with non-locking SELECT statements in a single REPEATABLE READ transaction, because typically in such cases you want SERIALIZABLE. This is because a non-locking SELECT statement presents the state of the database from a read view which consists of transactions committed before the read view was created, and before the current transaction's own writes, while the locking statements use the most recent state of the database to use locking. In general, these two different table states are inconsistent with each other and difficult to parse.

### READ COMMITTED

Each consistent read, even within the same transaction, sets and reads its own fresh snapshot. For information about consistent reads, see Section 17.7.2.3, “Consistent Nonlocking Reads”.

For locking reads (SELECT with FOR UPDATE or FOR SHARE), UPDATE statements, and DELETE statements, InnoDB locks only index records, not the gaps before them, and thus permits the free insertion of new records next to locked records. Gap locking is only used for foreign-key constraint checking and duplicate-key checking.

## optimistic locking and ABA problems

In the context of optimistic locking, the ABA problem arises when a value is read, another process changes it to a different value, and then changes it back to the original value before the first process attempts to update it, leading to a false assumption of no change. 

Here's a breakdown:

Optimistic Locking:
This concurrency control mechanism assumes that conflicts are rare and allows multiple transactions to access and modify data without immediately locking it. 

ABA Problem:
This occurs when a resource (like a database row) is read, then modified by another process to a different state (B), and then modified back to the original state (A) before the first process attempts to update it. 

How it Fails:
The first process, unaware of the intervening changes, might incorrectly assume that the resource hasn't changed and proceed with its update, potentially leading to data inconsistencies or conflicts. 

### Solutions to the ABA Problem:

#### Version Numbers:
Add a version or timestamp column to the data, incrementing it with each update. The update process can then check if the version number has changed since the data was read, preventing incorrect updates. 

#### Pessimistic Locking:
As an alternative, consider using pessimistic locking, which locks the data during the transaction to prevent conflicts. 

