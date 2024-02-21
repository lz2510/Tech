# Cache

## Caching patterns

Two common approaches are cache-aside or lazy loading (a reactive approach) and write-through (a proactive approach). A cache-aside cache is updated after the data is requested. A write-through cache is updated immediately when the primary database is updated. With both approaches, the application is essentially managing what data is being cached and for how long.

### Cache-Aside (Lazy Loading) (Read-Through)

![image](https://github.com/lz2510/Tech/assets/1209204/b091659c-ea41-4c56-b157-1b598f175df0)


An application can emulate the functionality of read-through caching by implementing the cache-aside strategy. 

A cache-aside cache is the most common caching strategy available. The fundamental data retrieval logic can be summarized as follows:

When your application needs to read data from the database, it checks the cache first to determine whether the data is available.
If the data is available (a cache hit), the cached data is returned, and the response is issued to the caller.
If the data isn’t available (a cache miss), the database is queried for the data. The cache is then populated with the data that is retrieved from the database, and the data is returned to the caller.

### Write-Through

![image](https://github.com/lz2510/Tech/assets/1209204/670f1275-d591-4220-a411-e10082af83bb)

A write-through cache reverses the order of how the cache is populated. Instead of lazy-loading the data in the cache after a cache miss, the cache is proactively updated immediately following the primary database update. The fundamental data retrieval logic can be summarized as follows:

The application, batch, or backend process updates the primary database.
Immediately afterward, the data is also updated in the cache.

### Write-Behind

In the Write-Behind scenario, modified cache entries are asynchronously written to the data source after a configured delay, whether after 10 seconds, 20 minutes, a day, a week or even longer.

### Refresh-Ahead

In the Refresh-Ahead scenario, Coherence allows a developer to configure a cache to automatically and asynchronously reload (refresh) any recently accessed cache entry from the cache loader before its expiration

https://docs.aws.amazon.com/whitepapers/latest/database-caching-strategies-using-redis/caching-patterns.html  
https://learn.microsoft.com/en-us/azure/architecture/patterns/cache-aside  
https://docs.oracle.com/cd/E15357_01/coh.360/e15723/cache_rtwtwbra.htm#COHDG5177  

## Benefits of caching

1. **Faster Response Times**: By serving cached data, the application can respond to user requests much faster, as the data is readily available without the need for expensive database queries or computations.
   
2. **Reduced Database Load**: Frequent database queries can put a strain on the database server, leading to slower performance. Caching helps offload the database by serving frequently accessed data from the cache.

3. **Improved Scalability**: Caching allows the application to handle more concurrent users efficiently, as cached data can be served without consuming additional server resources.

https://medium.com/@noor1yasser9/understanding-caching-in-laravel-b140542f08dd

## Invalidate caches appropriately

When data is updated, the corresponding cache entries should be invalidated to ensure that clients receive the latest data. 

One common approach to cache invalidation is to use a time-based expiration, where cache entries are invalidated after a fixed time period. 

Another approach is to use a "write-through" cache, where updates to the data are also written to the cache to ensure that the cache is always up to date.
