# Cache

## Overview

Developers and IT professionals use caching to save and access key-value data in temporary memory faster and with less effort than data stored in conventional data storage. Caches are useful in multiple scenarios with multiple technologies, such as computer caching with random access memory (RAM), network caching on a content delivery network, a web cache for web multimedia data, or a cloud cache to help make cloud-apps more resilient. Developers often design applications to cache processed data and then repurpose it to serve requests faster than in standard database queries.

You can use caching to reduce database costs, deliver higher throughput and lower latency than most databases can offer, and boost the performance of cloud and web applications.

## How does caching work for databases?

Developers can supplement a primary database with a database cache, which they can place within the database or application, or set up as a standalone layer. While they typically rely on a conventional database to store large, durable, complete datasets, they use a cache to store transient subsets of data for quick retrieval.

## Caching patterns

Two common approaches are cache-aside or lazy loading (a reactive approach) and write-through (a proactive approach). A cache-aside cache is updated after the data is requested. A write-through cache is updated immediately when the primary database is updated. With both approaches, the application is essentially managing what data is being cached and for how long.

### Cache-Aside (Lazy Loading) (Read-Through)

An application can emulate the functionality of read-through caching by implementing the cache-aside strategy. 

A cache-aside cache is the most common caching strategy available. The fundamental data retrieval logic can be summarized as follows:

1. When your application needs to read data from the database, it checks the cache first to determine whether the data is available.
2. If the data is available (a cache hit), the cached data is returned, and the response is issued to the caller.
3. If the data isn’t available (a cache miss), the database is queried for the data. The cache is then populated with the data that is retrieved from the database, and the data is returned to the caller.

![image](https://github.com/lz2510/Tech/assets/1209204/b091659c-ea41-4c56-b157-1b598f175df0)

This approach has a couple of advantages:

1. The cache contains only data that the application actually requests, which helps keep the cache size cost-effective.
2. Implementing this approach is straightforward and produces immediate performance gains, whether you use an application framework that encapsulates lazy caching or your own custom application logic.

A disadvantage when using cache-aside as the only caching pattern is that because the data is loaded into the cache only after a cache miss, some overhead is added to the initial response time because additional roundtrips to the cache and database are needed.

### Write-Through

A write-through cache reverses the order of how the cache is populated. Instead of lazy-loading the data in the cache after a cache miss, the cache is proactively updated immediately following the primary database update. The fundamental data retrieval logic can be summarized as follows:

1. The application, batch, or backend process updates the primary database.
2. Immediately afterward, the data is also updated in the cache.

![image](https://github.com/lz2510/Tech/assets/1209204/670f1275-d591-4220-a411-e10082af83bb)

The write-through pattern is almost always implemented along with lazy loading. If the application gets a cache miss because the data is not present or has expired, the lazy loading pattern is performed to update the cache.
The write-through approach has a couple of advantages:
- Because the cache is up-to-date with the primary database, there is a much greater likelihood that the data will be found in the cache. This, in turn, results in better overall application performance and user experience.
- The performance of your database is optimal because fewer database reads are performed.

A disadvantage of the write-through approach is that infrequently-requested data is also written to the cache, resulting in a larger and more expensive cache.
A proper caching strategy includes effective use of both write-through and lazy loading of your data and setting an appropriate expiration for the data to keep it relevant and lean.

### Write-Behind

In the Write-Behind scenario, modified cache entries are asynchronously written to the data source after a configured delay, whether after 10 seconds, 20 minutes, a day, a week or even longer.

### Refresh-Ahead

In the Refresh-Ahead scenario, Coherence allows a developer to configure a cache to automatically and asynchronously reload (refresh) any recently accessed cache entry from the cache loader before its expiration

https://docs.aws.amazon.com/whitepapers/latest/database-caching-strategies-using-redis/caching-patterns.html  
https://learn.microsoft.com/en-us/azure/architecture/patterns/cache-aside  
https://docs.oracle.com/cd/E15357_01/coh.360/e15723/cache_rtwtwbra.htm#COHDG5177  

## What is caching used for?

### Output caching

Output caching helps increase webpage performance by storing the full source code of pages such as HTML and client scripts that a server sends to browsers for rendering. Every time a user views the page, the server caches the output code in the application's memory. This enables the application to serve requests without running page code or communicating with other servers.

### Data caching and database caching

Database speed and throughput can be key factors in overall application performance. Database caching is used for frequent calls to data that doesn't change often, such as pricing or inventory data. It helps websites and applications load faster while increasing throughput and lowering data retrieval latency from back-end databases.

### Storing user session data

Application users often generate data that must be stored for short periods. An in-memory data store like Redis is perfect for efficiently and reliably storing high volumes of session data like user input, shopping cart entries, or personalization preferences at a lower cost than storage or databases.

## Benefits of caching

1. **Faster Response Times**: By serving cached data, the application can respond to user requests much faster, as the data is readily available without the need for expensive database queries or computations.
   
2. **Reduced Database Load**: Frequent database queries can put a strain on the database server, leading to slower performance. Caching helps offload the database by serving frequently accessed data from the cache.

3. **Improved Scalability**: Caching allows the application to handle more concurrent users efficiently, as cached data can be served without consuming additional server resources.

https://medium.com/@noor1yasser9/understanding-caching-in-laravel-b140542f08dd

## Invalidate caches appropriately

When data is updated, the corresponding cache entries should be invalidated to ensure that clients receive the latest data. 

One common approach to cache invalidation is to use a time-based expiration, where cache entries are invalidated after a fixed time period. 

Another approach is to use a "write-through" cache, where updates to the data are also written to the cache to ensure that the cache is always up to date.
