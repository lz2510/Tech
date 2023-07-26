# Cache

## Benefits of caching

1. **Faster Response Times**: By serving cached data, the application can respond to user requests much faster, as the data is readily available without the need for expensive database queries or computations.
   
2. **Reduced Database Load**: Frequent database queries can put a strain on the database server, leading to slower performance. Caching helps offload the database by serving frequently accessed data from the cache.

3. **Improved Scalability**: Caching allows the application to handle more concurrent users efficiently, as cached data can be served without consuming additional server resources.

https://medium.com/@noor1yasser9/understanding-caching-in-laravel-b140542f08dd

## Invalidate caches appropriately

When data is updated, the corresponding cache entries should be invalidated to ensure that clients receive the latest data. 

One common approach to cache invalidation is to use a time-based expiration, where cache entries are invalidated after a fixed time period. 

Another approach is to use a "write-through" cache, where updates to the data are also written to the cache to ensure that the cache is always up to date.
