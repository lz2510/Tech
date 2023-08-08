# Messaging

## Queue Message

Messages are stored on the queue until they are processed and deleted. Each message is processed only once, by a single consumer.

![image](https://user-images.githubusercontent.com/1209204/228852869-e198b46d-7f92-4274-976e-95e88bb23c2c.png)


## Pub/Sub Messaging

In a pub/sub model, any message published to a topic is immediately received by all of the subscribers to the topic.

![image](https://user-images.githubusercontent.com/1209204/228853264-0640d851-9193-44be-9ad0-a427e590038c.png)

### implementation in aws

1. SNS
2. SQS

https://docs.aws.amazon.com/prescriptive-guidance/latest/modernization-integrating-microservices/pub-sub.html#example-business-case-3  

## Queue Message vs Pub/Sub Messaging

1. Many producers and consumers can use the queue, but each message is processed only once, by a single consumer. For this reason, this messaging pattern is often called one-to-one, or point-to-point, communications. When a message needs to be processed by more than one consumer, message queues can be combined with Pub/Sub messaging in a fanout design pattern. 

2. The subscribers to the message topic often perform different functions, and can each do something different with the message in parallel. The publisher doesn’t need to know who is using the information that it is broadcasting, and the subscribers don’t need to know who the message comes from. This style of messaging is a bit different than message queues, where the component that sends the message often knows the destination it is sending to. 

https://aws.amazon.com/message-queue/  
https://aws.amazon.com/pub-sub-messaging/  

## Poll model in SQS

Amazon SQS is a message queue service used by distributed applications to exchange messages through a polling model.

Receiver direction is from receiver to sqs, as receiver retrieve message actively, not wait to receive.

<img width="967" alt="Screenshot 2023-04-02 at 09 30 51" src="https://user-images.githubusercontent.com/1209204/229521980-3c4f689b-b2c7-4a33-928e-13c1a44db98b.png">

## Use cases of queue

1. Processing large volumes of data: If you have a task that requires processing a large amount of data, such as generating reports or updating a large number of records, you can use RabbitMQ to break the task up into smaller pieces and distribute the work across multiple workers.
   
2. Sending notifications: If you need to send notifications to users or other parts of your application, you can use RabbitMQ to queue up the messages and send them asynchronously. This can help improve the performance of your application and prevent delays caused by sending notifications in real-time.
   
3. Handling user events: If you need to handle user events, such as sending welcome emails or processing user registrations, you can use RabbitMQ to handle these tasks asynchronously. This can help improve the responsiveness of your application and prevent delays caused by waiting for the user events to complete.

4. Decoupling application components: If you have different parts of your application that need to communicate with each other, you can use RabbitMQ to decouple these components and reduce their dependencies. This can help make your application more modular and easier to maintain over time.

https://medium.com/@256cub/rabbitmq-is-a-message-queue-system-that-allows-you-to-send-and-receive-messages-between-different-f0af4c9b3e06

## outbox pattern

![image](https://github.com/lz2510/TechInterview/assets/1209204/76186cd1-f8ca-4f42-8ffd-e01f97b4a990)

https://microservices.io/patterns/data/transactional-outbox.html  
https://en.wikipedia.org/wiki/Inbox_and_outbox_pattern  
https://blog.ecotone.tech/implementing-outbox-pattern-in-php-symfony-laravel-ecotone/  

## My Database is not a Message Broker!

Whenever we send Messages to Message Broker and store changes in our database, one of those actions may fail. If this happen we will end up in inconsistent state of the system.

### Sending Retries

It’s important to provide a delay between each attempt, this way we give Message Broker a chance to become available, so sending Message can be self-healed.

### Ghost Buster

Messages that have been sent where related data has been rolled back are Ghost Messages. When Message will be consumed there will be nothing to reference too, which will make your Message Handlers fail.

- sending asynchronous Messages happens just before the transaction is committed or simply after Command Handler have finished execution. 

### Dead letter
Storing Messages that failed on sending in Database Dead Letter help us recover from failure and allows for safe commit of the data without losing any information. After Error Message is stored in the database, we can safely review and replay it.

### Message Serialization Failure

To make sending reliable on architecture level, we will need to split serialization from sending and serialize all Messages before we will start sending them. This way we ensure that from application perspective all Messages are fine and what is left to be done is to send Messages to the Message Broker.

### Critical Messages still uses outbox pattern

https://blog.devgenius.io/my-database-is-not-a-message-broker-75d95ea56abc


