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

The Repository Pattern is a widely-used software design pattern that separates the application logic from the underlying data storage mechanism. It provides an abstraction layer between the application code and the database.

#### benefits of repository pattern

1. **Separation of Concerns**: The pattern separates the data access logic from the application logic, making it easier to maintain and test the code. It allows for different data sources to be used without changing the application code.

2. **Testability**: The pattern makes it easier to write unit tests for the application code by mocking data access logic.

3. **Reusability**: The repository pattern allows for code reuse across different parts of the application.

https://docs.microsoft.com/en-us/archive/msdn-magazine/2009/february/best-practice-an-introduction-to-domain-driven-design  
https://medium.com/microtica/the-concept-of-domain-driven-design-explained-3184c0fd7c3f  
https://medium.com/@soulaimaneyh/laravel-repository-pattern-da4e1e3efc01  

## value object

There are two main characteristics for value objects:
- They have no identity.
- They are immutable.

https://learn.microsoft.com/en-us/dotnet/architecture/microservices/microservice-ddd-cqrs-patterns/implement-value-objects  
https://martinfowler.com/bliki/ValueObject.html  

## should a repository return eloquent model or domain model?

Should return domain model. Can add a mapper to transfer from eloquent model to domain model.  The same as Request of http.

As repository interface is defined in domain. A domain shouldn’t rely on Eloquent of the framework or Request from http. A domain only rely on domain. Even return an array, the element should also be domain instead of eloquent model.

https://github.com/Orphail/laravel-ddd/blob/master/src/Agenda/Company/Application/Repositories/Eloquent/CompanyRepository.php  
https://github.com/Orphail/laravel-ddd/blob/master/src/Agenda/Company/Application/Mappers/CompanyMapper.php  
