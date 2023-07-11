# SOLID principles

## Purpose of SOLID Principles

- To make code easier to read and understand
- To make it easier to quickly extend with new functionality without breaking the existing one
- To make the code more testable.

https://medium.com/@niranjan.sth8/boosting-laravel-quality-with-solid-principles-best-practices-and-examples-cf84f1651393

## SOLID list

### single-responsibility principle

"There should never be more than one reason for a class to change."[5] In other words, every class should have only one responsibility.

https://medium.com/@niranjan.sth8/boosting-laravel-quality-with-solid-principles-best-practices-and-examples-cf84f1651393  

### Open closed principle

"Software entities ... should be open for extension, but closed for modification."

https://mohasin-dev.medium.com/how-to-use-open-closed-principal-in-php-laravel-af4fa3b2a1c1  
https://medium.com/@niranjan.sth8/boosting-laravel-quality-with-solid-principles-best-practices-and-examples-part-ii-5dfb53db0822  

### Liskov substitution principle 

The principle defines that objects of a superclass shall be replaceable with objects of its subclasses without breaking the application. That requires the objects of your subclasses to behave in the same way as the objects of your superclass. 

To achieve that, your subclasses need to follow these rules: 
* Don’t implement any stricter validation rules on input parameters than implemented by the parent class. 
* Apply at the least the same rules to all output parameters as applied by the parent class. 

https://en.wikipedia.org/wiki/Liskov_substitution_principle  
https://stackify.com/solid-design-liskov-substitution-principle/  
https://www.baeldung.com/solid-principles  

#### challeges
This sounds obvious, however, there are some important thing that needs to be satisfied:

- **Same method signatures.** In PHP we’re not forced to use types so it can happen that the method has different types in MailChimp compared to ConvertKit.
- **It’s also true for return types.** Of course, we can type-hint these, but what about an array or a Collection ? It’s not guaranteed that an array contains the same types in multiple classes, right? As you can see, the addSubscriber method returns an array that contains the subscriber’s data received from the APIs. Both MailChimp and ConvertKit return a different shape. They are arrays, yes, but they are completely different data structures. So we cannot be 100% sure that RegisterController works correctly with any email provider implementation. This is why it’s a good idea to have DTOs when working with 3rd parties.
- **The same exceptions should be thrown from each method.** Since exceptions cannot be type-hinted in the signature it’s also a source of difference between these classes.

https://medium.com/@niranjan.sth8/boosting-laravel-quality-with-solid-principles-best-practices-and-examples-part-iii-l-1f89d8cef180

### interface segregation principle

 "Clients should not be forced to depend upon interfaces that they do not use."

 https://medium.com/@niranjan.sth8/boosting-laravel-quality-with-solid-principles-best-practices-and-examples-part-iv-i-7e07a2fcac96  
 
### dependency inversion principle

"Depend upon abstractions, [not] concretions."

The principle states:[1]

- High-level modules should not import anything from low-level modules. Both should depend on abstractions (e.g., interfaces).
- Abstractions should not depend on details. Details (concrete implementations) should depend on abstractions.

https://en.wikipedia.org/wiki/Dependency_inversion_principle  
https://medium.com/@niranjan.sth8/boosting-laravel-quality-with-solid-principles-best-practices-and-examples-part-v-d-478f11c5b9c3  

#### description

The goal of the dependency inversion pattern is to avoid this highly coupled distribution with the mediation of an abstract layer, and to increase the re-usability of higher/policy layers.

With the addition of an abstract layer, both high- and lower-level layers reduce the traditional dependencies from top to bottom.

In a direct application of dependency inversion, the abstracts are owned by the upper/policy layers. This architecture groups the higher/policy components and the abstractions that define lower services together in the same package. The lower-level layers are created by inheritance/implementation of these abstract classes or interfaces.
The inversion of the dependencies and ownership encourages the re-usability of the higher/policy layers. Upper layers could use other implementations of the lower services. When the lower-level layer components are closed or when the application requires the reuse of existing services, it is common that an Adapter mediates between the services and the abstractions.

https://en.wikipedia.org/wiki/Dependency_inversion_principle

#### Implementations

Two common implementations of DIP use similar logical architecture but with different implications.
A direct implementation packages the policy classes with service abstracts classes in one library. In this implementation high-level components and low-level components are distributed into separate packages/libraries, where the interfaces defining the behavior/services required by the high-level component are owned by, and exist within the high-level component's library. The implementation of the high-level component's interface by the low-level component requires that the low-level component package depend upon the high-level component for compilation, thus inverting the conventional dependency relationship.

￼![Dependency_inversion](https://github.com/lz2510/TechInterview/assets/1209204/4948e73c-6232-4e9a-95ae-6874badd8c29)

Figures 1 and 2 illustrate code with the same functionality, however in Figure 2, an interface has been used to invert the dependency. The direction of dependency can be chosen to maximize policy code reuse, and eliminate cyclic dependencies.
In this version of DIP, the lower layer component's dependency on the interfaces/abstracts in the higher-level layers makes re-utilization of the lower layer components difficult. This implementation instead ″inverts″ the traditional dependency from top-to-bottom to the opposite, from bottom-to-top.
A more flexible solution extracts the abstract components into an independent set of packages/libraries:

￼![DIPLayersPattern_v2](https://github.com/lz2510/TechInterview/assets/1209204/9c8a0355-5267-45fc-b2a2-e5e906455b73)

The separation of each layer into its own package encourages re-utilization of any layer, providing robustness and mobility.[1]

https://en.wikipedia.org/wiki/Dependency_inversion_principle#Implementations

#### example

##### Remote file server client
A remote file server (FTP, cloud storage ...) client can be modeled as a set of abstract interfaces:
1. Connection/Disconnection (a connection persistence layer may be needed)
2. Folder/tags creation/rename/delete/list interface
3. File creation/replacement/rename/delete/read interface
4. File searching
5. Concurrent replacement or delete resolution
6. File history management ...
If local and remote files offers the same abstract interfaces, high-level modules that implement the dependency inversion pattern can use them indiscriminately. The application will be able to save its documents locally or remotely transparently.
The level of service required by high level modules should be considered.
Designing a module as a set of abstract interfaces, and adapting other modules to it, can provide a common interface for many systems.

##### laravel defines some contracts. it’s an example of dependency inversion.

Storage contract defines file interfaces. the high level code can use the same code with different config. It increase reusablity of high level code.

https://en.wikipedia.org/wiki/Dependency_inversion_principle#Remote_file_server_client

#### Generalization restrictions

All variable instantiation requires the implementation of a creational pattern such as the factory method or the factory pattern, or the use of a dependency-injection framework.

instantiation of interfaces has two methods: 
1. a creational pattern such as the factory method or the factory pattern
2. the use of a dependency-injection framework

When using interface as an constructor argument, laravel use dependency injection to load it, which should be setup in another file.







