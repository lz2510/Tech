# Microservices

## Data management

### Shared database

### Saga

Implement each business transaction that spans multiple services is a saga. A saga is a sequence of local transactions. Each local transaction updates the database and publishes a message or event to trigger the next local transaction in the saga. If a local transaction fails because it violates a business rule then the saga executes a series of compensating transactions that undo the changes that were made by the preceding local transactions.

https://microservices.io/patterns/data/saga.html

### Api composition

### CQRS

CQRS is an architectural pattern that separates the models for reading and writing data.  

The basic idea is that you can divide a system's operations into two sharply separated categories:  
- Queries. These queries return a result and do not change the state of the system, and they are free of side effects.
- Commands. These commands change the state of a system.

https://docs.microsoft.com/en-us/dotnet/architecture/microservices/microservice-ddd-cqrs-patterns/apply-simplified-microservice-cqrs-ddd-patterns  

### Event sourcing

Event sourcing persists the state of a business entity such an Order or a Customer as a sequence of state-changing events. Whenever the state of a business entity changes, a new event is appended to the list of events. Since saving an event is a single operation, it is inherently atomic. The application reconstructs an entity’s current state by replaying the events.

Applications persist events in an event store, which is a database of events. The store has an API for adding and retrieving an entity’s events. The event store also behaves like a message broker. It provides an API that enables services to subscribe to events. When a service saves an event in the event store, it is delivered to all interested subscribers.

https://microservices.io/patterns/data/event-sourcing.html  
https://medium.com/nerd-for-tech/starting-with-event-sourcing-in-php-161a83597d69

## Communication style

There are two basic messaging patterns that microservices can use to communicate with other microservices.  
1. Synchronous communication. In this pattern, a service calls an API that another service exposes, using a protocol such as HTTP or gRPC. This option is a synchronous messaging pattern because the caller waits for a response from the receiver.
2. Asynchronous message passing. In this pattern, a service sends message without waiting for a response, and one or more services process the message asynchronously.

### Http

HTTP power lies in getting the feedback (Response) right away.  
However HTTP Integration has few drawbacks:
- We need to depend on Service being up and running. In case service is down, we are unable to call it
- Service may be overloaded or simply working slowly, which may creates latency issues on our side
- It creates coupling between Services

### Kafka

- With Messaging we become independent of the state of Services around
- In Messaging, we are in fire-and-forget model. This means we only connect to the Postman (Message Broker) to send a message and the flow continues, no matter of the current Recipient’s state.  
This set us free from the response times of other services.
- Messaging creates decoupled solution, where each Service may be in control of what they want to know (subscribe to).

https://blog.devgenius.io/how-to-integrate-microservices-a506fe2d1a48  
https://docs.microsoft.com/en-us/azure/architecture/microservices/design/interservice-communication

## components

- service register and discovery
- config center
- router
- ratelimit 
- circuit breaker

https://mp.weixin.qq.com/s/A-DcZJY9sJcTQSEoWEibww


