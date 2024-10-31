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
2. Structure     
SQL databases are table-based, while NoSQL databases are document, key-value, graph, or wide-column stores.
3. Properties   
SQL database tranaction follows ACID while NoSQL database follows CAP.
4. Scalability   
SQL database can be scaled vertically while NoSQL database are scable horizontally.

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

## mysql 8 remove int length

Display width specification for integer data types was deprecated in MySQL 8.0.17, and now statements that include data type definitions in their output no longer show the display width for integer types.

The "length" of integer columns has been a confusing feature of MySQL for years. **It's only a hint that affects the display width, not the storage or the range of values.**

The "length" of an integer column doesn't mean anything. A column of int(11) is the same as int(2) or int(40). They are all a fixed-size, 32-bit integer data type. They support the same minimum and maximum value.


https://stackoverflow.com/questions/60892749/mysql-8-ignoring-integer-lengths  
https://dev.mysql.com/doc/relnotes/mysql/8.0/en/news-8-0-19.html  

## prepared statement

In database management systems (DBMS), a prepared statement is a feature used to pre-compile SQL code, separating it from data. Benefits of prepared statements are:
- efficiency, because they can be used repeatedly without re-compiling
- security, by reducing or eliminating SQL injection attacks

https://en.wikipedia.org/wiki/Prepared_statement  

## prepared statement protects from SQL injection

The idea is very simple - the query and the data are sent to the database server separately.

The root of the SQL injection problem is in the mixing of the code and the data.

In fact, our SQL query is a legitimate program. And we are creating such a program dynamically, adding some data on the fly. Thus, the data may interfere with the program code and even alter it.

https://stackoverflow.com/questions/8263371/how-can-prepared-statements-protect-from-sql-injection-attacks  

## prepared statement with PDO

`$stmt = $dbh->prepare("INSERT INTO REGISTRY (name, value) VALUES (:name, :value)");`  
`$stmt->bindParam(':name', $name);`  
`$stmt->bindParam(':value', $value);`

`$name = 'one';`  
`$value = 1;`  
`$stmt->execute();`  

## When should I use UNSIGNED and SIGNED INT in MySQL?

UNSIGNED only stores positive numbers (or zero). On the other hand, signed can store negative numbers (i.e., may have a negative sign).

UNSIGNED ranges from 0 to n, while signed ranges from about -n/2 to n/2.

In this case, you have an AUTO_INCREMENT ID column, so you would not have negatives. Thus, use UNSIGNED. If you do not use UNSIGNED for the AUTO_INCREMENT column, your maximum possible value will be half as high (and the negative half of the value range would go unused).

Do note, however, that UNSIGNED is MySQL-specific and not a standard SQL feature. This means that using UNSIGNED can make a future migration to a different RDBMS more complicated or cause you difficulties when using software libraries targeting standard SQL such as SQLAlchemy. 

https://stackoverflow.com/questions/11515594/when-should-i-use-unsigned-and-signed-int-in-mysql  

## where vs having

The WHERE clause is used in a SELECT, UPDATE, or DELETE statement to filter rows based on a condition. It operates on individual rows before any grouping or aggregation occurs. 

The HAVING clause is used in conjunction with the GROUP BY clause in a SELECT statement to filter groups based on a condition. It operates on the result set after the grouping and aggregation have taken place. It is typically used with aggregate functions like SUM, COUNT, AVG, etc.

https://medium.com/@aizaz2117/mysql-top-most-asked-interview-questions-d7ec27f737ee  

## stored procedure

A stored procedure is a set of pre-compiled SQL statements that are stored in the database and can be executed later. It helps in modularizing and reusing SQL code, improving performance, and enhancing security.

https://medium.com/@aizaz2117/mysql-top-most-asked-interview-questions-d7ec27f737ee  

## Normalization in database design

Normalization is the process of organizing data in a database to eliminate redundancy and improve data integrity. It involves breaking down a table into multiple tables and defining relationships between them using primary keys and foreign keys.

https://medium.com/@aizaz2117/mysql-top-most-asked-interview-questions-d7ec27f737ee  

## Replication Strategies

Here are the top three database replication strategies:

1. Synchronous replication
2. Asynchronous replication
3. Semi-synchronous replication

https://www.designgurus.io/course-play/grokking-system-design-fundamentals/doc/what-is-replication

## replication methods

Primary-Replica (Master-Slave) Replication
Primary-Primary (Master-Master) Replication
Multi-Master Replication

https://www.designgurus.io/course-play/grokking-system-design-fundamentals/doc/replication-methods

## Redundancy and Replication

Redundancy is the duplication of critical components or functions of a system with the intention of increasing the reliability of the system, usually in the form of a backup or fail-safe, or to improve actual system performance. 

Database replication is the process of copying and synchronizing data from one database to one or more additional databases. This is commonly used in distributed systems where multiple copies of the same data are required to ensure data availability, fault tolerance, and scalability.

Redundancy vs. Replication: Key Differences
* Active vs. Passive:
    * Redundancy is often passive – the backup components are there in case of failure but are not actively used in normal operations.
    * Replication is active – all copies of the data are usually utilized in some way, either for load balancing or data recovery.
* Focus:
    * Redundancy focuses on the reliability and availability of the overall system.
    * Replication focuses on the availability and integrity of the data.
* Implementation:
    * Redundancy might involve identical backup systems or components.
    * Replication involves distributing and synchronizing data across different systems.
In essence, while both redundancy and replication are about ensuring high availability and system reliability, redundancy is more about having backup resources at the ready, and replication is about keeping multiple active copies of data. In distributed systems, using both strategies can significantly enhance performance and reliability.

https://www.designgurus.io/course-play/grokking-the-system-design-interview/doc/638c0b7dac93e7ae59a1b0d9  
https://www.designgurus.io/course-play/grokking-system-design-fundamentals/doc/what-is-replication

## data partition

Data partitioning is process of dividing a large database (DB) into smaller, more manageable parts called partitions or shards. Each partition is independent and contains a subset of the overall data.

Partitioning Methods

a. Horizontal Partitioning: Also known as sharding, horizontal data partitioning involves dividing a database table into multiple partitions or shards, with each partition containing a subset of rows.

b. Vertical Partitioning: Vertical data partitioning involves splitting a database table into multiple partitions or shards, with each partition containing a subset of columns. This technique can help optimize performance by reducing the amount of data that needs to be scanned, especially when certain columns are accessed more frequently than others.

c. Hybrid Partitioning: Hybrid data partitioning combines both horizontal and vertical partitioning techniques to partition data into multiple shards. This technique can help optimize performance by distributing the data evenly across multiple servers, while also minimizing the amount of data that needs to be scanned.

https://www.designgurus.io/course-play/grokking-the-system-design-interview/doc/638c0b7aac93e7ae59a1b0c1
