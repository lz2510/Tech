# Enginering

## how to make sure code is good engough and don't introduce new bug

- use code quality tool
- follow best pritice
- when fix a bug. write a test that reproduces the bug. then fix the bug.
- use automaticed test tool to generate test coverage, if lower than coverage rate, then reject.
when develop new feature, write unit and functional test.

## how to avoid introduing new bug when fixing bug

- Write unit test. Every time a bug is discovered in your system, you should write an automated test that reproduces the bug. Then fix the bug. This will improve the system over time.

- Inspect the code. Whenever you fix a bug, it's a good idea to inspect the usages of the function you've changed to try to identify any breaking changes you've introduced.

- Talk to your coworkers about your proposed fix. This could take the form of code reviews but sometimes that won't catch the regressions. Code reviews aren't usually for catching bugs. As a corollary, make sure the rest of the team knows about the changes you're making and give them time to give you feedback on what other parts of the system might rely on the code. Do this even if you're the senior person on the team.

- Familiarize yourself with the system, and work with software a long time. Practice makes perfect. Nobody expects a developer to not introduce bugs into a brand new system or when they're an intern. We've all done it.

- Improve your code design so that code is more loosely coupled. That means following the SRP even it means sacrificing some DRY. Particularly, in OOP systems your code and data should be in the same class and the data should always be private. If this doesn't make sense, there is an impedance mismatch between the problem domain and the design. It should not be possible for a change in data structure in one class to affect the behavior of another class.

https://softwareengineering.stackexchange.com/questions/357343/how-can-i-avoid-causing-bugs-in-the-software-when-i-fix-unrelated-bugs 

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

## Clean Code

- General rules
- Design rules
- Understandability tips
- Names rules
- Functions rules
- Comments rules
- Source code structure
- Objects and data structures
- Tests
- Code smells

https://gist.github.com/wojteklu/73c6914cc446146b8b533c0988cf8d29  

## how to handle with exception

- Catch an exception only when you can handle it and take decision about it
  - retry
  - circuit break
- Always create your own ApplicationError hierarchy
- Never rescue more exceptions than you need to
- Resist the urge to handle exceptions immediately
- Not all exceptions need handling
- Logger.log(everything)

https://rhenache.medium.com/clean-code-handling-exceptions-3ad9aac2ea22  
https://www.toptal.com/abap/clean-code-and-the-art-of-exception-handling

## DTD Data Transfer Object 

spatie/data-transfer-object

https://levelup.gitconnected.com/elegantly-consuming-apis-using-data-transfer-objects-in-php-38ac4d8225a8

## Scrum vs Kanban

Kanban is a methodology centered around visualizing tasks, while Scrum is a methodology that structures workflow and team culture to deliver projects in short timelines. 

Kanban delivers tasks continuously until the project is finished, while Scrum delivers chunks of deliverables in one- to four-week periods.

https://www.coursera.org/articles/kanban-vs-scrum  

## .env

### why .env

You should never store sensitive credentials in your code. Storing configuration in the environment is one of the tenets of a twelve-factor app. Anything that is likely to change between deployment environments – such as database credentials or credentials for 3rd party services – should be extracted from the code into environment variables.

Basically, a .env file is an easy way to load custom configuration variables that your application needs without having to modify nginx virtual hosts. This means you won't have to edit any files outside the project, and all the environment variables are always set no matter how you run your project - Nginx, CLI.

NO editing virtual hosts in Nginx
EASY portability and sharing of required ENV values
COMPATIBLE with CLI runner

### usage
The .env file is generally kept out of version control since it can contain sensitive API keys and passwords. 

A separate .env.example file is created with all the required environment variables defined except for the sensitive ones, which are either user-supplied for their own development environments or are communicated elsewhere to project collaborators. The project collaborators then independently copy the .env.example file to a local .env and ensure all the settings are correct for their local environment, filling in the secret keys or providing their own values when necessary. 

In this usage, the .env file should be added to the project's .gitignore file so that it will never be committed by collaborators. This usage ensures that no sensitive passwords or API keys will ever be in the version control history so there is less risk of a security breach, and production values will never have to be shared with all project collaborators.

https://github.com/vlucas/phpdotenv  

### edge case return false programming

https://www.geeksforgeeks.org/dont-forget-edge-cases/  
https://softwareengineering.stackexchange.com/questions/72761/how-do-you-identify-edge-cases-on-algorithms  

## Data Mapper vs Active Record

Martin Fowler described two main patterns of object persistence. Here they are with very simplistic descriptions:

Active Record — Objects manage their own persistence
Data Mapper — Object persistence is managed by a separate mapper class

Both are ORM. Among ORMs, there are a two very common philosophies or patterns: Active Record and Data Mapper. 

The biggest difference between the data mapper pattern and the active record pattern is that the data mapper is meant to be a layer between the actual business domain of your application and the database that persists its data. Where active record seeks to invisibly bridge the gaps between the two as seamlessly as possible, the role of the data mapper is to allow you to consider the two more independently.

note: business domain, business logic, domain logic, domain object are similar.

### examples

Examples of Active Record ORMs
Ruby on Rails
Laravel’s Eloquent

Examples of Data Mapper
Java Hibernate
Doctrine2

### Data Mapper

The Data Mapper concept insists of business logic, the data mapper itself and database.

From image in website, Data Mapper itself is the separate mapper class that is for persistence. It has sql interface for CURD.

In Docrine, business logic is Entity, Object persistence is managed by EntityManger. So EntityMangager is the data mapper itself.

### Active Record

Active Record means business logic and persistence are put together. For example, in Laravel Equloment, business logic are defined in child model file, and persistence is defined in parent model class. Evey child model file should inherit parent model class.

### Business logic should have both data and behavior

if docrine rich entity violate data mapper without behavior? or it just makes data more flexiabl, it’s not behavior?

It is my belief that data and behavior should not be separate. The two are organic to each other and they exist solely because the other exists. They're like bread and butter, love and marriage, or Jenny and Forrest. They're soulmates. Don't split them up.

### properties defination between Eloquent and Docrine

And how you define properties, which unlike Eloquent (active record) you must explicitly define:
The core thing to note is that table columns and names are explicitly defined.

https://martinfowler.com/eaaCatalog/activeRecord.html
https://martinfowler.com/eaaCatalog/dataMapper.html
https://www.thoughtfulcode.com/orm-active-record-vs-data-mapper/
http://jgaskins.org/blog/2012/04/20/data-mapper-vs-active-record/
