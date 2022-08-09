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
 
   
