# Messaging

## Queue Message

Messages are stored on the queue until they are processed and deleted. Each message is processed only once, by a single consumer.

![image](https://user-images.githubusercontent.com/1209204/228852869-e198b46d-7f92-4274-976e-95e88bb23c2c.png)


## Pub/Sub Messaging

In a pub/sub model, any message published to a topic is immediately received by all of the subscribers to the topic.

![image](https://user-images.githubusercontent.com/1209204/228853264-0640d851-9193-44be-9ad0-a427e590038c.png)


## Queue Message vs Pub/Sub Messaging

1. Many producers and consumers can use the queue, but each message is processed only once, by a single consumer. For this reason, this messaging pattern is often called one-to-one, or point-to-point, communications. When a message needs to be processed by more than one consumer, message queues can be combined with Pub/Sub messaging in a fanout design pattern. 

2. The subscribers to the message topic often perform different functions, and can each do something different with the message in parallel. The publisher doesn’t need to know who is using the information that it is broadcasting, and the subscribers don’t need to know who the message comes from. This style of messaging is a bit different than message queues, where the component that sends the message often knows the destination it is sending to. 

https://aws.amazon.com/message-queue/  
https://aws.amazon.com/pub-sub-messaging/  
