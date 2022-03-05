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

- SQL databases are relational, NoSQL databases are non-relational.
- SQL databases use structured query language and have a predefined schema. NoSQL databases have dynamic schemas for unstructured data.
- SQL databases are vertically scalable, while NoSQL databases are horizontally scalable.
- SQL databases are table-based, while NoSQL databases are document, key-value, graph, or wide-column stores.
- SQL databases are better for multi-row transactions, while NoSQL is better for unstructured data like documents or JSON.

### reference

https://www.integrate.io/blog/the-sql-vs-nosql-difference/
https://www.geeksforgeeks.org/difference-between-sql-and-nosql/

