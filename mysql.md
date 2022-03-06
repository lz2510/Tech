# MySQL

## InnoDB vs MyISAM

- InnoDB has row-level locking. MyISAM only has full table-level locking.
- InnoDB has what is called referential integrity which involves supporting foreign keys (RDBMS) and relationship constraints, MyISAM does not (DMBS).
- InnoDB supports transactions, which means you can commit and roll back. MyISAM does not.

reference    
https://kinsta.com/knowledgebase/convert-myisam-to-innodb/  

## Transaction

Transactions are atomic units of work that can be committed or rolled back. When a transaction makes multiple changes to the database, either all the changes succeed when the transaction is committed, or all the changes are undone when the transaction is rolled back.

reference  
https://dev.mysql.com/doc/refman/5.7/en/glossary.html#glos_transaction  
https://en.wikipedia.org/wiki/Database_transaction

## ACID

In computer science, ACID (atomicity, consistency, isolation, durability) is a set of properties of database transactions intended to guarantee data validity despite errors, power failures, and other mishaps.

reference   
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

reference      
https://www.talend.com/resources/sql-vs-nosql/  
https://www.integrate.io/blog/the-sql-vs-nosql-difference/  
https://www.geeksforgeeks.org/difference-between-sql-and-nosql/

## CAP

In theoretical computer science, the CAP theorem, also named Brewer's theorem after computer scientist Eric Brewer, states that any distributed data store can only provide two of the following three guarantees:  
- Consistency  
Every read receives the most recent write or an error.
- Availability      
Every request receives a (non-error) response, without the guarantee that it contains the most recent write.
- Partition tolerance   
The system continues to operate despite an arbitrary number of messages being dropped (or delayed) by the network between nodes.

When a network partition failure happens, it must be decided whether to
- cancel the operation and thus decrease the availability but ensure consistency or to
- proceed with the operation and thus provide availability but risk inconsistency.

Thus, if there is a network partition, one has to choose between consistency and availability. Note that consistency as defined in the CAP theorem is quite different from the consistency guaranteed in ACID database transactions.

Eric Brewer argues that the often-used "two out of three" concept can be somewhat misleading because system designers only need to sacrifice consistency or availability in the presence of partitions, but that in many systems partitions are rare.

