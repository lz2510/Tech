# Kafka

## Kafka vs RabbitMQ

Apache Kafka:

- Core Design is Distributed streaming platform: Designed for high-throughput, low-latency data streams. A streaming platform is a technology that allows continuous data flow from a source to a destination in real-time. Key characteristic is Real-time processing. Data is processed as it arrives, without the need for batch processing.
- Data Flow Model is Pub-sub model. Messages are published to topics and consumed by multiple subscribers.

RabbitMQ:

- Core Design is Message broker: Designed for reliable, flexible, and scalable messaging.   
- Data Flow Model is Message queuing. Advanced message routing: Offers features like message queues, exchanges, and bindings for complex routing patterns.   

https://aws.amazon.com/compare/the-difference-between-rabbitmq-and-kafka/  

## Kafka vs Redis

1. Subscription
* Redis: Redis supports push-based delivery of messages that means messages published to Redis will be delivered automatically to subscribers immediately.
* Apache Kafka: Kafka supports pull-based delivery of messages, meaning that messages published in Kafka are never distributed directly to consumers, consumers subscribe to topics and ask for messages when consumers are ready to deal with them.

2. Parallelism
* Redis: Redis does not support the concept of parallelism.
* Apache Kafka: Kafka supports parallelism due to the log partitioning of data where multiple consumers consume in consumer groups at the same.

3. Message Retention
* Redis: Redis sends the messages to the consumer all at once and later the message is removed. Thus, no one knows where the data is held.
* Apache Kafka: Because Kafka is a log, there are always messages; you can monitor this by setting a retention policy for messages. E.g. 7 days retention

4. Speed
* Redis: If speed is of a concern than use Redis as messages are not persisted by Redis, so it delivers them more quickly.
* Apache Kafka: Even after it delivers the message, Kafka persists the messages, so it is quite slow compared to Redis.

5. Amount of Data
* Redis: Redis is an in-memory store. It ensures that it uses its primary memory for storage and processing which makes it much faster than the disk-based Kafka. The only issue with Redis ‘ in-memory storage is that we cannot store large amounts of data for a long time. Because the primary in-memory is smaller than a disk
* Apache Kafka: Kafka is meant to handle large amounts of data. It allows as many servers as required to be used. It uses a disk to for its storage, so it may be slow to load. Nevertheless, it can hold a large amount of data (i.e. in terabytes) for a longer retention period thanks to the disk storage ability.

https://www.educba.com/redis-vs-kafka/

## Is Apache Kafka really real-time? No, and yes!

### Hard vs. soft vs. near real-time

Unfortunately, there is more than one “real-time”:

- Real-time: This is the marketing term. It can be anything from zero latency and zero spikes to minutes and beyond.

- Hard real-time: Missing a deadline is a total system failure. Delays or spikes are not accepted. Hence, the goal is to ensure that all deadlines are met,

- Soft real-time: The usefulness of a result degrades after its deadline, thereby degrading the system’s quality of service. The goal becomes meeting a certain subset of deadlines to optimize some application-specific criteria. The particular criteria optimized depend on the application.

- Near real-time: Refers to the time delay introduced, by automated data processing or network transmission, between the occurrence of an event and the use of the processed data. The range goes from microseconds and milliseconds to seconds, minutes, and sometimes even hours or days.

From a more technical point of view, hard real-time is a synchronous push operation. The caller invokes something and must wait for the return. This cannot be implemented with event distribution effectively. It is rather an API call. Soft- and near real-time are asynchronous. The caller propagates an event but others do not affect the outcome.

### Kafka is real-time!

Apache Kafka became the de facto standard for reliable data processing at scale in real-time. Most people agree with this in the IT world. Kafka provides capabilities to process trillions of events per day. Each Kafka broker (= server) can process tens of thousands of messages per second. End-to-end latency from producer to consumer can be as low as ~10ms if the hardware and network setup are good enough. Kafka is battle-tested at thousands of companies for hundreds of different use cases. It uses Apache 2.0 license and provides a huge community and ecosystem. So far so good…

### Kafka is not real-time!
However, in the OT world, things are different: Kafka is only soft real-time. Many OT applications require hard real-time. Hence, scenarios around automotive, manufacturing, and smart cities need to make this distinction. 

### Soft real-time is what you need for most use cases!

Hard real-time is critical for some use cases, such as car engines, medical systems, and industrial process controllers. However, most other use cases only require near real-time. Apache Kafka comes into play to build scalable, reliable, near real-time applications and connect to the OT world. The open architecture and backpressure handling of huge volumes from IoT interfaces are two of the key reasons why Kafka is such a good fit in OT/IT architectures.

https://kai-waehner.medium.com/is-apache-kafka-really-real-time-no-and-yes-4253edbf3922  
