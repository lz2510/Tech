# domain event pattern

## Problem

In complex domain models, especially those involving multiple bounded contexts or microservices, it's crucial to capture and respond to significant business events. Traditional approaches might tightly couple different parts of a system or lead to polling mechanisms that are inefficient and delay the propagation of important information.

## Solution

The Domain Event Pattern addresses this by defining domain events as meaningful business events that domain experts care about. These events are raised by the domain model when something significant occurs (e.g., an order is placed, a customer is upgraded to VIP status). Other parts of the system can subscribe to these events and react accordingly, enabling decoupled communication between different bounded contexts or microservices and facilitating a more reactive, event-driven architecture.

https://ddd-practitioners.com/home/glossary/domain-event/  
