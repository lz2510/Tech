# Non-functional requirement

## performance 

performance includes low latency and high throughput 

### Latency

Latency is the time to perform some action or to produce some result. I want to serve the content quickly!
- load balance 
- cache

### Throughput

Throughput is the number of such actions or results per unit of time. I want to handle as many reactions as possible!

- idea behind batch processing (specifically, MapReduce) we increase throughput by splitting a larger task into smaller ones and running tasks in parallel.
- stream processing patterns. we increase throughput by scaling out message consumers
- idea behind scaling data store writes. we increase write throughput using sharding (partitioning)
- idea behind scaling data store reads. we increase read throughput using replication

https://www.designgurus.io/course-play/grokking-system-design-fundamentals/doc/latency-and-performance  
https://leetcode.com/explore/featured/card/system-design-for-interviews-and-beyond/722/how-to-define-system-requirements/4744/  
https://github.com/donnemartin/system-design-primer  
