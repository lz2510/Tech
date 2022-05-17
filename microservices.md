# Microservices

## Data management

### Shared database

### Api composition

## Communication style

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

### Reference
https://blog.devgenius.io/how-to-integrate-microservices-a506fe2d1a48
