# MySQL

## InnoDB vs MyISAM

- InnoDB has row-level locking. MyISAM only has full table-level locking.
- InnoDB has what is called referential integrity which involves supporting foreign keys (RDBMS) and relationship constraints, MyISAM does not (DMBS).
- InnoDB supports transactions, which means you can commit and roll back. MyISAM does not.

### reference
https://kinsta.com/knowledgebase/convert-myisam-to-innodb/  

### MyISAM vs InnoDBStorage: ACID Properties 
ACID stands for Atomicity, Consistency, Isolation, and Durability. MyISAM doesn’t support ACID properties whereas InnoDB supports ACID properties.
