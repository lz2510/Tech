# Service in DDD

## Problem

Certain operations in the domain model don't naturally belong to an entity or value object. These operations may involve multiple domain objects or perform actions that are domain-significant but are not the primary responsibility of any single entity or value object. Embedding these operations within entities or value objects can lead to bloated classes that violate the single responsibility principle, making the domain model less cohesive and harder to understand.

## Solution

The Service in DDD is a design pattern that defines operations not specific to any entity or value object but still part of the domain model. Services in DDD come in two flavors: Domain Services and Application Services. 

- Domain Services encapsulate business logic that doesn't naturally fit within a domain entity or value object. They operate on domain concepts and are stateless, focusing purely on domain logic.

- Application Services act as a coordination layer or facade over the domain layer, orchestrating the flow of data to and from the domain entities and domain services, and directing results to the outside world. They are typically where transactions are controlled and can be an entry point for calls from the presentation layer or external systems.

### domain service vs application service

The domain service is an additional layer that also contains domain logic. It’s part of the domain model, just like entities and value objects. 

At the same time, the application service is another layer that doesn’t contain business logic. However, it’s here to coordinate the activity of the application, placed above the domain model.

https://ddd-practitioners.com/home/glossary/service/
