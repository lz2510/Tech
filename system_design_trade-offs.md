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

## Scalability

Scalability is the ability of a system to handle an increasing workload, either by adding more resources (scaling out) or by upgrading the capacity of existing resources (scaling up).

A. Horizontal Scaling
Horizontal scaling, also known as scaling out, involves adding more machines or nodes to a system to distribute the workload evenly. 

B. Vertical Scaling
Vertical scaling, or scaling up, refers to increasing the capacity of individual nodes within a system. This can be achieved by upgrading the hardware, such as adding more CPU, memory, or storage. 

Horizontal vs. Vertical Scaling
With horizontal-scaling it is often easier to scale dynamically by adding more machines into the existing pool; Vertical-scaling is usually limited to the capacity of a single server and scaling beyond that capacity often involves downtime and comes with an upper limit.

Good examples of horizontal scaling are Cassandra and MongoDB as they both provide an easy way to scale horizontally by adding more machines to meet growing needs. Similarly, a good example of vertical scaling is MySQL as it allows for an easy way to scale vertically by switching from smaller to bigger machines. However, this process often involves downtime.

https://www.designgurus.io/course-play/grokking-system-design-fundamentals/doc/scalability  
https://www.designgurus.io/blog/grokking-system-design-scalability  

## Availability

Availability is a measure of how accessible and reliable a system is to its users.

Definition of High Availability
High availability is often measured in terms of uptime, which is the ratio of time that a system is operational to the total time it is supposed to be operational. 

Strategies for Achieving High Availability
To achieve high availability, organizations implement various strategies that focus on redundancy, replication, load balancing, distributed data storage, health monitoring, regular system maintenance, and geographic distribution.

https://www.designgurus.io/course-play/grokking-system-design-fundamentals/doc/availability

## Reliability

Reliability refers to the ability of a system to continue operating correctly and effectively in the presence of faults, errors, or failures. In simple terms, a distributed system is considered reliable if it keeps delivering its services even when one or several of its software or hardware components fail. Reliability represents one of the main characteristics of any distributed system, since in such systems any failing machine can always be replaced by another healthy one, ensuring the completion of the requested task.

Take the example of a large electronic commerce store (like Amazon), where one of the primary requirement is that any user transaction should never be canceled due to a failure of the machine that is running that transaction. For instance, if a user has added an item to their shopping cart, the system is expected not to lose it. A reliable distributed system achieves this through redundancy of both the software components and data. If the server carrying the user's shopping cart fails, another server that has the exact replica of the shopping cart should replace it.

Obviously, redundancy has a cost and a reliable system has to pay that to achieve such resilience for services by eliminating every single point of failure.

https://www.designgurus.io/course-play/grokking-the-system-design-interview/doc/638c0b78ac93e7ae59a1b0a5

## Reliability Vs. Availability

If a system is reliable, it is available. However, if it is available, it is not necessarily reliable. In other words, high reliability contributes to high availability, but it is possible to achieve a high availability even with an unreliable product by minimizing repair time and ensuring that spares are always available when they are needed. Let's take the example of an online retail store that has 99.99% availability for the first two years after its launch. However, the system was launched without any information security testing. The customers are happy with the system, but they don't realize that it isn't very reliable as it is vulnerable to likely risks. In the third year, the system experiences a series of information security incidents that suddenly result in extremely low availability for extended periods of time. This results in reputational and financial damage to the customers.

