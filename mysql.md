# MySQL

## InnoDB vs MyISAM

- InnoDB has row-level locking. MyISAM only has full table-level locking.
- InnoDB has what is called referential integrity which involves supporting foreign keys (RDBMS) and relationship constraints, MyISAM does not (DMBS).
- InnoDB supports transactions, which means you can commit and roll back. MyISAM does not.

### reference
https://kinsta.com/knowledgebase/convert-myisam-to-innodb/  

## Transaction

Transactions are atomic units of work that can be committed or rolled back. When a transaction makes multiple changes to the database, either all the changes succeed when the transaction is committed, or all the changes are undone when the transaction is rolled back.

### reference

https://dev.mysql.com/doc/refman/5.7/en/glossary.html#glos_transaction  
https://en.wikipedia.org/wiki/Database_transaction

## ACID

In computer science, ACID (atomicity, consistency, isolation, durability) is a set of properties of database transactions intended to guarantee data validity despite errors, power failures, and other mishaps.

### reference

https://en.wikipedia.org/wiki/ACID
https://dev.mysql.com/doc/refman/5.7/en/glossary.html#glos_acid

## SQL vs NoSQL

SQL databases are relational, NoSQL databases are non-relational.
1. Language  
SQL database use sql to query data while as a group NoSQL language lack of standard interface.
2. Scalability   
SQL database can be scaled vertically while NoSQL database are scable horizontally.
3. Structure     
SQL databases are table-based, while NoSQL databases are document, key-value, graph, or wide-column stores.
4. Properties   
SQL database tranaction follows ACID while NoSQL database follows CAP.

### reference

https://www.talend.com/resources/sql-vs-nosql/  
https://www.integrate.io/blog/the-sql-vs-nosql-difference/  
https://www.geeksforgeeks.org/difference-between-sql-and-nosql/

## CAP

- Consistency: Every request receives the most recent result, or an error. (Note this is different than in ACID)
- Availability: Every request has a non-error result, regardless of how recent that result is.
- Partition tolerance: Any delays or losses between nodes will not interrupt the system’s operation.

