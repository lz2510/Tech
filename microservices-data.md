# Microservices Data

## Database-per-microservice

## Cross-service queries

### direct HTTP call

### request-reply pattern

### Materialized View Pattern

![image](https://user-images.githubusercontent.com/1209204/188356155-cbc85f58-31cf-4777-a79d-910ded00ea90.png)

## Distributed transactions

### Saga pattern

![image](https://user-images.githubusercontent.com/1209204/188356255-2a3887cc-6de3-417a-b8f4-12946e282ee7.png)

The Saga pattern consists of two main types:

1. Choreography-Based Saga:

In this approach, each microservice is responsible for orchestrating its part of the saga. When a microservice performs its operation, it emits events or messages to notify other microservices about the progress. The other microservices listen to these events and perform their respective operations accordingly. This loosely coupled approach allows for flexibility but might require more complex event handling.

2. Orchestration-Based Saga:
   
In this approach, a centralized orchestrator (a dedicated service or component) is responsible for coordinating the saga steps. The orchestrator determines the order of execution and communicates with each microservice to execute the necessary operations. This approach offers better control and visibility but introduces a single point of failure.

https://medium.com/@miladev95/microservices-saga-5eec6dfa59b4

## High volume data

### CQRS

![image](https://user-images.githubusercontent.com/1209204/188356362-44bd087a-750c-43fd-81cf-4cd6f05831d9.png)

### Event sourcing

![image](https://user-images.githubusercontent.com/1209204/188356337-38001bb8-02fd-4a22-8134-55d06df158c2.png)

## Relational vs. NoSQL data

### ACID for relational database

### Data modles for NoSQL

![image](https://user-images.githubusercontent.com/1209204/188356571-97350d89-b22e-4362-af97-f655e7d2874d.png)

### The CAP theorem

![image](https://user-images.githubusercontent.com/1209204/188356620-8c2d2b7e-257b-4759-bcb3-0d8fb17c559d.png)

## Caching

![image](https://user-images.githubusercontent.com/1209204/188356723-2e2eb1c9-8642-4825-94e5-eaaa986dfcf9.png)

