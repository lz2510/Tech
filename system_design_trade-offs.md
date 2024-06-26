# System Design Trade-offs

## latency vs throughput

Improving latency and throughput often involves different strategies, as optimizing for one can sometimes impact the other. However, there are several techniques that can enhance both metrics:

How to Improve Latency
1. Optimize Network Routes: Use Content Delivery Networks (CDNs) to serve content from locations geographically closer to the user. This reduces the distance data must travel, decreasing latency.
2. Upgrade Hardware: Faster processors, more memory, and quicker storage (like SSDs) can reduce processing time.
3. Database Optimization: Use indexing, optimized queries, and in-memory databases to reduce data access and processing time.
4. Code Optimization: Optimize algorithms and remove unnecessary computations to speed up execution.

How to Improve Throughput
1. Scale Horizontally: Add more servers to handle increased load. This is often more effective than vertical scaling (upgrading the capacity of a single server).
2. Implement Caching: Cache frequently accessed data in memory to reduce the need for repeated data processing.
3. Optimize Database Performance: Ensure efficient data storage and retrieval. This may include techniques like partitioning and sharding.
4. Asynchronous Processing: Use asynchronous processes for tasks that don’t need to be completed immediately.

Conclusion
Low latency is crucial for applications requiring fast response times, while high throughput is vital for systems dealing with large volumes of data.

https://www.designgurus.io/course-play/grokking-the-system-design-interview/doc/65b1b089fbe3a07e2aaa6180
