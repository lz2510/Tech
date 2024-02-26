# Cache

## Overview

Developers and IT professionals use caching to save and access key-value data in temporary memory faster and with less effort than data stored in conventional data storage. Caches are useful in multiple scenarios with multiple technologies, such as computer caching with random access memory (RAM), network caching on a content delivery network, a web cache for web multimedia data, or a cloud cache to help make cloud-apps more resilient. Developers often design applications to cache processed data and then repurpose it to serve requests faster than in standard database queries.

You can use caching to reduce database costs, deliver higher throughput and lower latency than most databases can offer, and boost the performance of cloud and web applications.

## How does caching work for databases?

Developers can supplement a primary database with a database cache, which they can place within the database or application, or set up as a standalone layer. While they typically rely on a conventional database to store large, durable, complete datasets, they use a cache to store transient subsets of data for quick retrieval.

## Caching patterns

Your caching strategy depends on how your application reads and writes data. Is your application write-heavy, or is data written once and read frequently? Is the data that's returned always unique? Different data access patterns will influence how you configure a cache. Common caching types include cache-aside, read-through/write-through, and write-behind/write-back.

Two common approaches are cache-aside or lazy loading (a reactive approach) and write-through (a proactive approach). A cache-aside cache is updated after the data is requested. A write-through cache is updated immediately when the primary database is updated. With both approaches, the application is essentially managing what data is being cached and for how long.

### Cache-Aside (Lazy Loading) (Read-Through)

In a cache-aside arrangement, the database cache sits next to the database. When the application requests data, it will check the cache first. If the cache has the data (a cache hit), then it will return it. If the cache does not have the data (a cache miss), then the application will query the database. The application then stores that data in the cache for any subsequent queries.

Read-through caches are good for read-heavy workloads. 

A cache-aside cache is the most common caching strategy available. The fundamental data retrieval logic can be summarized as follows:

1. When your application needs to read data from the database, it checks the cache first to determine whether the data is available.
2. If the data is available (a cache hit), the cached data is returned, and the response is issued to the caller.
3. If the data isn’t available (a cache miss), the database is queried for the data. The cache is then populated with the data that is retrieved from the database, and the data is returned to the caller.

![image](https://github.com/lz2510/Tech/assets/1209204/b091659c-ea41-4c56-b157-1b598f175df0)

![image](https://github.com/lz2510/Tech/assets/1209204/e0fbfd64-7d91-4c76-bcbb-ecfa254e17c7)


This approach has a couple of advantages:

1. The cache contains only data that the application actually requests, which helps keep the cache size cost-effective.
2. Implementing this approach is straightforward and produces immediate performance gains, whether you use an application framework that encapsulates lazy caching or your own custom application logic.

A disadvantage when using cache-aside as the only caching pattern is that because the data is loaded into the cache only after a cache miss, some overhead is added to the initial response time because additional roundtrips to the cache and database are needed.

### Read-Through

![image](https://github.com/lz2510/Tech/assets/1209204/f7dc5bba-8da4-41ba-ad1d-36fd7cddbffb)

In a read through cache arrangement, the cache sits between the application and the database. It can be envisioned like a straight line from application to database with the cache in the middle. In this strategy, the application will always speak with the cache for a read, and when there is a cache hit, the data is immediately returned. In the case of a cache miss, the cache will populate the missing data from the database and then return it to the application. For any data writes, the application will still go directly to the database.

Read-through caches are also good for read-heavy workloads. 

#### differences between read-through and cache-aside

"An application can emulate the functionality of read-through caching by implementing the cache-aside strategy." It's not correct. They are slightly different as below.

The main differences between read-through and cache-aside is that in a cache-aside strategy the application is responsible for fetching the data and populating the cache, while in a read-through setup, the logic is done by a library or some separate cache provider. A read-through setup is similar to a cache-aside in regards to potential data inconsistency between cache and database.

### Write-Through

A write-through cache reverses the order of how the cache is populated. Instead of lazy-loading the data in the cache after a cache miss, the cache is proactively updated immediately following the primary database update. The fundamental data retrieval logic can be summarized as follows:

1. The application, batch, or backend process updates the primary database.
2. Immediately afterward, the data is also updated in the cache.

![image](https://github.com/lz2510/Tech/assets/1209204/670f1275-d591-4220-a411-e10082af83bb)

![image](https://github.com/lz2510/Tech/assets/1209204/b253e345-1247-4195-8306-fd2196619a6b)

The write-through pattern is almost always implemented along with lazy loading. If the application gets a cache miss because the data is not present or has expired, the lazy loading pattern is performed to update the cache.
The write-through approach has a couple of advantages:
- Because the cache is up-to-date with the primary database, there is a much greater likelihood that the data will be found in the cache. This, in turn, results in better overall application performance and user experience.
- The performance of your database is optimal because fewer database reads are performed.

A disadvantage of the write-through approach is that infrequently-requested data is also written to the cache, resulting in a larger and more expensive cache.
A proper caching strategy includes effective use of both write-through and lazy loading of your data and setting an appropriate expiration for the data to keep it relevant and lean.

### Write-Behind/Wirte-Back

In the Write-Behind scenario, modified cache entries are asynchronously written to the data source after a configured delay, whether after 10 seconds, 20 minutes, a day, a week or even longer.

In this scenario, the application writes data to the cache, which is immediately acknowledged, and then the cache itself writes the data back to the database in the background. Write-behind caches, sometimes known as write-back caches, are best for write-heavy workloads, and they improve write performance because the application doesn't need to wait for the write to complete before moving to the next task.

![image](https://github.com/lz2510/Tech/assets/1209204/df36c16a-0f2a-44cc-b0f3-655c17b53427)


### Refresh-Ahead

In the Refresh-Ahead scenario, Coherence allows a developer to configure a cache to automatically and asynchronously reload (refresh) any recently accessed cache entry from the cache loader before its expiration

### write around

![image](https://github.com/lz2510/Tech/assets/1209204/c1680adb-16ac-4ad3-8941-3f181cd9392d)

https://docs.aws.amazon.com/whitepapers/latest/database-caching-strategies-using-redis/caching-patterns.html 
https://azure.microsoft.com/en-us/resources/cloud-computing-dictionary/what-is-caching/#Types-of-caching  
https://www.prisma.io/dataguide/managing-databases/introduction-database-caching#what-are-the-different-database-caching-strategies  
https://learn.microsoft.com/en-us/azure/architecture/patterns/cache-aside  
https://docs.oracle.com/cd/E15357_01/coh.360/e15723/cache_rtwtwbra.htm#COHDG5177  
https://www.enjoyalgorithms.com/blog/write-around-caching-pattern  

## Benefits of caching

### Improved application performance

Reading data from an in-memory cache is much faster than accessing data from a disk-driven data store. And with faster access to data, the overall application experience significantly improves.

### Reduced database usage and costs

Caching leads to fewer database queries, improving performance and reducing costs by limiting the need to scale database infrastructure and decreasing throughput charges.

### Scalable and predictable performance

A single cache instance can handle millions of requests per second, offering a level of throughput and scalability that databases can't match. Caching also offers the flexibility you need whether you're scaling out or scaling up your applications and data stores. Then your application can let many users access the same files simultaneously, without increasing the load on back-end databases. And if an application often experiences spikes in usage and high throughput, in-memory caches can mitigate latency.

https://azure.microsoft.com/en-us/resources/cloud-computing-dictionary/what-is-caching/#Benefits-of-caching  
https://medium.com/@noor1yasser9/understanding-caching-in-laravel-b140542f08dd  

## What is caching used for?

### Output caching

Output caching helps increase webpage performance by storing the full source code of pages such as HTML and client scripts that a server sends to browsers for rendering. Every time a user views the page, the server caches the output code in the application's memory. This enables the application to serve requests without running page code or communicating with other servers.

### Data caching and database caching

Database speed and throughput can be key factors in overall application performance. Database caching is used for frequent calls to data that doesn't change often, such as pricing or inventory data. It helps websites and applications load faster while increasing throughput and lowering data retrieval latency from back-end databases.

### Storing user session data

Application users often generate data that must be stored for short periods. An in-memory data store like Redis is perfect for efficiently and reliably storing high volumes of session data like user input, shopping cart entries, or personalization preferences at a lower cost than storage or databases.

https://azure.microsoft.com/en-us/resources/cloud-computing-dictionary/what-is-caching/#Uses-and-reasons-for-caching  

## Invalidate caches appropriately

When data is updated, the corresponding cache entries should be invalidated to ensure that clients receive the latest data. 

1. **time-based expiration** One common approach to cache invalidation is to use a time-based expiration, where cache entries are invalidated after a fixed time period. 

2. **update cache from db** Another approach is to use a "write-through" cache, where updates to the data are also written to the cache to ensure that the cache is always up to date.

3. **remove cache and wait for cache aside to add back** It's similiar write around pattern. Only update db and remove cache. Add cache when the next query. The UpdateEntityAsync method shown below demonstrates how to invalidate an object in the cache when the value is changed by the application. The code updates the original data store and then removes the cached item from the cache.

### update db first or removing cache first

The order of the steps is important. Update the data store before removing the item from the cache. If you remove the cached item first, there is a small window of time when a client might fetch the item before the data store is updated. That will result in a cache miss (because the item was removed from the cache), causing the earlier version of the item to be fetched from the data store and added back into the cache. The result will be stale cache data.

和陈皓，有过几次架构方案的讨论，其中一个话题是：数据写操作时，应该先淘汰缓存，还是先修改数据库。

我的观点是：应该先淘汰缓存。理由是：

![image](https://github.com/lz2510/Tech/assets/1209204/856df1d5-ef90-4f3c-b4c8-65b0f3f0e315)

如果先修改数据库，再淘汰缓存，毕竟这两个操作不是原子操作，可能出现修改数据库成功，然后中断（例如，服务重启），导致缓存存在脏数据的问题（数据库中为新，缓存中为旧）。

![image](https://github.com/lz2510/Tech/assets/1209204/ea0b01b4-89a5-4014-b11a-a9d957194986)

然而如果先淘汰缓存，即使操作中断，未来得及修改数据库，也最多额外引入一次cache miss，而不会引发脏数据（数据库中为旧，缓存中为NULL）。

陈皓的观点是：应该先修改数据库。理由是：

![image](https://github.com/lz2510/Tech/assets/1209204/3827e80d-0116-4477-accb-d76074ca9e93)

如果先淘汰缓存，则并发读操作，会cache miss（2.1操作），并将从库中的脏数据（1.3仍未完成）读取出来（2.2操作），放入缓存，导致缓存存在脏数据的问题（2.3操作）。我俩争论不下。

画外音：按照Cache Aside Pattern，建议先修改数据库。

https://learn.microsoft.com/en-us/azure/architecture/patterns/cache-aside  
https://mp.weixin.qq.com/s/5KaHnfuj1EaiUPsOURglVw  

## Distributed cache vs. session store

People often confuse distributed caches with session stores, which are similar but with different requirements and purposes. Instead of using a distributed cache to supplement a database, developers implement session stores, which are temporary data stores at the user layer, for profiles, messages, and other user data in session-oriented applications like web apps.

What is a session store?
Session-oriented applications track actions that users take while they're signed into the applications. To preserve that data when the user signs out, you can keep it in a session store, which improves session management, reduces costs, and speeds application performance.

How is using a session store different from caching a database?
In a session store, data isn't shared between different users, while with caching, different users can access the same cache. Developers use caching to improve the performance of a database or storage instance, while they use session stores to boost application performance by writing data to the in-memory store, eliminating the need to access a database at all.

Data that's written to a session store is typically short-lived, while data that’s cached with a primary database is usually meant to last much longer. A session store requires replication, high availability, and data durability to ensure that transactional data doesn’t get lost and users remain engaged. On the other hand, if the data in a side-cache gets lost, there’s always a copy of it in the permanent database.

https://azure.microsoft.com/en-us/resources/cloud-computing-dictionary/what-is-caching/#Cache-vs-session-store  
https://stackoverflow.com/questions/33897276/what-is-the-difference-between-a-session-store-and-database  

