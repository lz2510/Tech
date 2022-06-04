# Kafka

## Kafka vs Redis

1. Subscription
* Redis: Redis supports push-based delivery of messages that means messages published to Redis will be delivered automatically to subscribers immediately.
* Apache Kafka: Kafka supports pull-based delivery of messages, meaning that messages published in Kafka are never distributed directly to consumers, consumers subscribe to topics and ask for messages when consumers are ready to deal with them.

1. Parallelism
* Redis: Redis does not support the concept of parallelism.
* Apache Kafka: Kafka supports parallelism due to the log partitioning of data where multiple consumers consume in consumer groups at the same.
4. Message Retention
* Redis: Redis sends the messages to the consumer all at once and later the message is removed. Thus, no one knows where the data is held.
* Apache Kafka: Because Kafka is a log, there are always messages; you can monitor this by setting a retention policy for messages. E.g. 7 days retention

1. Speed
* Redis: If speed is of a concern than use Redis as messages are not persisted by Redis, so it delivers them more quickly.
* Apache Kafka: Even after it delivers the message, Kafka persists the messages, so it is quite slow compared to Redis.

1. Amount of Data
* Redis: Redis is an in-memory store. It ensures that it uses its primary memory for storage and processing which makes it much faster than the disk-based Kafka. The only issue with Redis ‘ in-memory storage is that we cannot store large amounts of data for a long time. Because the primary in-memory is smaller than a disk
* Apache Kafka: Kafka is meant to handle large amounts of data. It allows as many servers as required to be used. It uses a disk to for its storage, so it may be slow to load. Nevertheless, it can hold a large amount of data (i.e. in terabytes) for a longer retention period thanks to the disk storage ability.

https://www.educba.com/redis-vs-kafka/
