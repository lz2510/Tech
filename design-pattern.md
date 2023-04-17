# Design Pattern

## classification

Design patterns had originally been categorized into 3 sub-classifications based on what kind of problem they solve. 

Creational patterns provide the capability to create objects based on a required criterion and in a controlled way. 

Structural patterns are about organizing different classes and objects to form larger structures and provide new functionality. 

Finally, behavioral patterns are about identifying common communication patterns between objects and realizing these patterns.

https://en.wikipedia.org/wiki/Software_design_pattern#Classification_and_list  

## commaon patterns

| classification      | name |
| ----                | ---- |
| Creational patterns | Singleton |
| Creational patterns | Abstract Factory |
| Creational patterns | Factory Method |
| Structural patterns | Facade |
| Behavioral patterns | Template method |
| Behavioral patterns | Observe or Publish/Subscribe |
| Behavioral patterns | Strategy |
| Behavioral patterns | Chain of responsibility |

## Observe pattern

### 2 kinds of implementations

- Coupling implementation. Typically, the observer pattern is implemented so the "subject" being "observed" is part of the object for which state changes are being observed (and communicated to the observers). This type of implementation is considered "tightly coupled", forcing both the observers and the subject to be aware of each other and have access to their internal parts, creating possible issues of scalability, speed, message recovery and maintenance (also called event or notification loss), the lack of flexibility in conditional dispersion, and possible hindrance to desired security measures. 

- Typical pub-sub implementation. In some (non-polling) implementations of the publish-subscribe pattern (aka the pub-sub pattern), this is solved by creating a dedicated "message queue" server (and sometimes an extra "message handler" object) as an extra stage between the observer and the object being observed, thus decoupling the components. In these cases, the message queue server is accessed by the observers with the observer pattern, "subscribing to certain messages" knowing only about the expected message (or not, in some cases), while knowing nothing about the message sender itself; the sender also may know nothing about the observers. 

### example

Event Listener in laravle is an implemention example.

## Facade pattern

### Facade pattern definition:
Facade helps you to hide any complex implementation of a class to get an instance of it

Wikipedia:
a facade is an object that serves as a front-facing interface masking more complex underlying or structural code

https://dev.to/ahmedash95/design-patterns-in-php-facade-with-laravel-j24  
https://brainlet.medium.com/what-is-laravel-facade-9ce26397942d  
https://en.wikipedia.org/wiki/Facade_pattern  

### facade in larvel is facade pattern or not?

Facade in laravel is not a real facade pattern, just a feature similar to facade pattern.

Apparently some people don’t consider facade in laravel to be a real facade pattern, but I feel like it does coordinate complex interactions behind the scenes so that we can easily use the tools that Laravel provides for us.

The Laravel framework has a feature similar to this pattern, also termed Facades.

http://snags88.github.io/facade-pattern-in-laravel  
https://shishirthedev.medium.com/facade-in-laravel-application-d2a3053f5a71  

## Strategy Pattern vs State Pattern

Patterns are not only about UML, but their definition and idea that stand behind them. While Strategy define different algorithms, State implements a finite state machine.

https://medium.com/@iamprovidence/strategy-vs-state-pattern-6168cc102c91  

