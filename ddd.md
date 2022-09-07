# DDD

## what's DDD

![image](https://user-images.githubusercontent.com/1209204/180417050-6146b2a1-e5f6-46df-8dc8-abef6f1da166.png)

![image](https://user-images.githubusercontent.com/1209204/180417210-36803ce5-d249-475c-a4cc-5129e42a6e25.png)


https://docs.microsoft.com/en-us/dotnet/architecture/microservices/microservice-ddd-cqrs-patterns/ddd-oriented-microservice

## concepts

### bounded context

### entities

An entity is a "thing" in your system. Entities have both an identity and a lifecycle.

Entities are a combination of data and behavior, like a user or a product. 

Validataion should be put in the entity.

Dependency can be inject to a method. Or can use domain service.

### value objects

Value objects have attributes, but can’t exist on their own. For example, the shipping address can be a value object.

### aggerate

### domain service vs application service

### repository

https://docs.microsoft.com/en-us/archive/msdn-magazine/2009/february/best-practice-an-introduction-to-domain-driven-design  
https://medium.com/microtica/the-concept-of-domain-driven-design-explained-3184c0fd7c3f  
