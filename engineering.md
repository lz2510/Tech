# Enginering

## What is OOP?

Object Oriented Programming (OOP) is a programming paradigm where the complete software operates as a bunch of objects talking to each other. An object is a collection of data and methods that operate on its data.

https://www.geeksforgeeks.org/commonly-asked-oop-interview-questions/

## What are main features of OOP?
- Encapsulation
- Polymorphism
- Inheritance

https://www.geeksforgeeks.org/commonly-asked-oop-interview-questions/

## Advantages of OOP?

The main advantage of OOP is better manageable code that covers following.

1) The overall understanding of the software is increased as the distance between the language spoken by developers and that spoken by users.

2) Object orientation eases maintenance by the use of encapsulation.   One can easily change the underlying representation by keeping the methods same.

OOP paradigm is mainly useful for relatively big software.

https://www.geeksforgeeks.org/commonly-asked-oop-interview-questions/

## code quality tools

- PhpCS - PHP Code Sniffer
- PHPMD - PHP Mess Dector

## SOLID 

### Open closed principle

https://mohasin-dev.medium.com/how-to-use-open-closed-principal-in-php-laravel-af4fa3b2a1c1

### Liskov substitution principle 

To achieve that, your subclasses need to follow these rules: 
* Don’t implement any stricter validation rules on input parameters than implemented by the parent class. 
* Apply at the least the same rules to all output parameters as applied by the parent class. 

https://en.wikipedia.org/wiki/Liskov_substitution_principle  
https://stackify.com/solid-design-liskov-substitution-principle/  
https://www.baeldung.com/solid-principles  
   
## KISS principle 

Keep it simple and stupid

## DRY principle

Don't repeat yourself

## the twelve-factor app

I. Codebase  
One codebase tracked in revision control, many deploys

II. Dependencies  
Explicitly declare and isolate dependencies

III. Config  
Store config in the environment

IV. Backing services  
Treat backing services as attached resources

V. Build, release, run  
Strictly separate build and run stages

VI. Processes  
Execute the app as one or more stateless processes

VII. Port binding  
Export services via port binding

VIII. Concurrency  
Scale out via the process model

IX. Disposability  
Maximize robustness with fast startup and graceful shutdown

X. Dev/prod parity  
Keep development, staging, and production as similar as possible

XI. Logs  
Treat logs as event streams

XII. Admin processes  
Run admin/management tasks as one-off processes

https://12factor.net

## code layer

Service layer    
Action layer  

https://blog.devgenius.io/restructuring-a-laravel-controller-using-services-action-classes-288b802122b5

## clean controller

if we’re handling authorization, validation, business logic and response building all in one place, controller will be bloated.

1. move authorization and validation to request form
2. move business logic to action or service
3. use resources controller or single use controller
4. use DTO

https://medium.com/codex/cleaning-up-laravel-controllers-a2934b7bf1c

## PSR

PSR-1: Basic Coding Standard  
PSR-2: Coding Style Guide  
PSR-4: Autoloader  

https://www.php-fig.org/psr/  
