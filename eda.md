# Event Driven Architecture

## what's is event driven architecture
An event-driven architecture uses events to trigger and communicate between decoupled services and is common in modern applications built with microservices. 

An event is a change in state, like an item being placed in a shopping cart on an e-commerce website. 

An event-driven architecture consists of event producers that generate a stream of events, and event consumers that listen for the events.



https://aws.amazon.com/event-driven-architecture/  
https://docs.microsoft.com/en-us/azure/architecture/guide/architecture-styles/event-driven  
https://en.wikipedia.org/wiki/Event-driven_architecture  

## two models

An event driven architecture can use a pub/sub model or an event stream model.

- Pub/sub: The messaging infrastructure keeps track of subscriptions. When an event is published, it sends the event to each subscriber. After an event is received, it cannot be replayed, and new subscribers do not see the event.

- Event streaming: Events are written to a log, like Apache Kafka. Events are strictly ordered (within a partition) and durable. Clients don't subscribe to the stream, instead a client can read from any part of the stream. The client is responsible for advancing its position in the stream. That means a client can join at any time, and can replay events.

https://docs.microsoft.com/en-us/azure/architecture/guide/architecture-styles/event-driven  

## event in laravel

Event and Listener bind together.

## Event vs Command

<img width="747" alt="Commands" src="https://user-images.githubusercontent.com/1209204/179933570-d8996a3b-8408-4807-9b44-3ac3e763dfcf.png">

https://codeopinion.com/commands-events-whats-the-difference/

## use command rather than event

https://medium.com/rocco-scaramuzzi-tech/event-driven-microservice-architecture-dont-use-only-events-but-use-commands-too-b8694d370436  

## Event sourcing

https://microservices.io/patterns/data/event-sourcing.html  
https://martinfowler.com/eaaDev/EventSourcing.html  

## Evento bus

Event bus is a software component that can be used to exchange messages between different parts of the system. In other words, event bus is a centralized software communication hub.

https://www.techyourchance.com/event-bus/  
https://docs.aws.amazon.com/eventbridge/latest/userguide/eb-event-bus.html  

