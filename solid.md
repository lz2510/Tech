# SOLID principles

## SOLID list

### single-responsibility principle

"There should never be more than one reason for a class to change."[5] In other words, every class should have only one responsibility.

### Open closed principle

"Software entities ... should be open for extension, but closed for modification."

https://mohasin-dev.medium.com/how-to-use-open-closed-principal-in-php-laravel-af4fa3b2a1c1

### Liskov substitution principle 

The principle defines that objects of a superclass shall be replaceable with objects of its subclasses without breaking the application. That requires the objects of your subclasses to behave in the same way as the objects of your superclass. 

To achieve that, your subclasses need to follow these rules: 
* Don’t implement any stricter validation rules on input parameters than implemented by the parent class. 
* Apply at the least the same rules to all output parameters as applied by the parent class. 

https://en.wikipedia.org/wiki/Liskov_substitution_principle  
https://stackify.com/solid-design-liskov-substitution-principle/  
https://www.baeldung.com/solid-principles  

### interface segregation principle

 "Clients should not be forced to depend upon interfaces that they do not use."
 
### dependency inversion principle

"Depend upon abstractions, [not] concretions."

The principle states:[1]

- High-level modules should not import anything from low-level modules. Both should depend on abstractions (e.g., interfaces).
- Abstractions should not depend on details. Details (concrete implementations) should depend on abstractions.

https://en.wikipedia.org/wiki/Dependency_inversion_principle  

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

Remote file server client
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

https://en.wikipedia.org/wiki/Dependency_inversion_principle#Remote_file_server_client

#### boundary

![IMG_7550 copy 2](https://github.com/lz2510/TechInterview/assets/1209204/40ec8cb8-f43c-4cb4-8013-17c9d80896ea)

![IMG_7552 copy](https://github.com/lz2510/TechInterview/assets/1209204/166307df-48c9-434b-aa6a-046467f14c81)

The compile-time dependency is lower level depends on high levels. run-time dependency is that a high level calls a low level, which means a high level depends on a low level.

![IMG_7553 copy 2](https://github.com/lz2510/TechInterview/assets/1209204/ca1169b1-8fbf-491a-a7f7-2e40eef0bace)

![IMG_7555 copy](https://github.com/lz2510/TechInterview/assets/1209204/b8c49c27-57ed-46b2-b9c3-0c3541b93771)

![IMG_7556 copy](https://github.com/lz2510/TechInterview/assets/1209204/2efb733e-7c7e-4e6f-b23e-769f4e8c7010)





