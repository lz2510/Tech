# DDD

## what's DDD

![image](https://user-images.githubusercontent.com/1209204/180417050-6146b2a1-e5f6-46df-8dc8-abef6f1da166.png)

![image](https://user-images.githubusercontent.com/1209204/180417210-36803ce5-d249-475c-a4cc-5129e42a6e25.png)


https://docs.microsoft.com/en-us/dotnet/architecture/microservices/microservice-ddd-cqrs-patterns/ddd-oriented-microservice

## concepts

### bounded context

Bounded context is a central pattern in domain-driven design that contains the complexity of the application. It handles large models and teams. This is where you implement the code, after you’ve defined the domain and the subdomains.

Bounded contexts actually represent boundaries in which a certain subdomain is defined and applicable. Here, the specific subdomain makes sense, while others don’t.

### entities

An entity is a "thing" in your system. Entities have both an identity and a lifecycle.

Entities are a combination of data and behavior, like a user or a product. 

Validataion should be put in the entity.

Dependency can be inject to a method. Or can use domain service.

### value objects

Value objects have attributes, but can’t exist on their own. For example, the shipping address can be a value object.

### aggerate and aggregate root

Large and complicated systems have countless entities and value objects. That’s why the domain model needs some kind of structure. This will put them into logical groups that will be easier to manage. These groups are called aggregates. They represent a collection of objects that are connected to each other, with the goal to treat them as units. Moreover, they also have an aggregate root. This is the only entity that any object outside of the aggregate can reference to.

### domain service vs application service

The domain service is an additional layer that also contains domain logic. It’s part of the domain model, just like entities and value objects. 

At the same time, the application service is another layer that doesn’t contain business logic. However, it’s here to coordinate the activity of the application, placed above the domain model.

### repository

The repository pattern is a collection of business entities that simplifies the data infrastructure. It releases the domain model from infrastructure concerns. The layering concept enforces the separation of concerns.

https://docs.microsoft.com/en-us/archive/msdn-magazine/2009/february/best-practice-an-introduction-to-domain-driven-design  
https://medium.com/microtica/the-concept-of-domain-driven-design-explained-3184c0fd7c3f  
