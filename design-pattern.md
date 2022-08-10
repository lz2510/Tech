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

## Observe

### 2 kinds of implementations

- Coupling implementation. Typically, the observer pattern is implemented so the "subject" being "observed" is part of the object for which state changes are being observed (and communicated to the observers). This type of implementation is considered "tightly coupled", forcing both the observers and the subject to be aware of each other and have access to their internal parts, creating possible issues of scalability, speed, message recovery and maintenance (also called event or notification loss), the lack of flexibility in conditional dispersion, and possible hindrance to desired security measures. 

- Typical pub-sub implementation. In some (non-polling) implementations of the publish-subscribe pattern (aka the pub-sub pattern), this is solved by creating a dedicated "message queue" server (and sometimes an extra "message handler" object) as an extra stage between the observer and the object being observed, thus decoupling the components. In these cases, the message queue server is accessed by the observers with the observer pattern, "subscribing to certain messages" knowing only about the expected message (or not, in some cases), while knowing nothing about the message sender itself; the sender also may know nothing about the observers. 




