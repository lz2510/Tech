# Clean Code

use a model response as agrument to pass service
- logic leaks into controller
- service need to know the outer layer details 
solution
- use array
- use DTO
- use request object, not recommanded

For example, many database frameworks return a convenient data format in response to a query. We might call this a RowStructure. We don’t want to pass that row structure inwards across a boundary. That would violate The Dependency Rule because it would force an inner circle to know something about an outer circle.

conclusion: use model response as argument of a service violates the dependence rule. 

In a typical MVC architecture, Controller will just call a use case (as a function) processing the returned result (or catching any errors) by calling the appropriate Presenter. So the great deal of sophisticated business logic (related to the process flow of the use case) leaks into Controller. This is not desirable, since this logic belongs to the core of the application where it can be isolated and unit tested.

One of the main ideas of Clean Architecture (CA) is that Controller does not know anything about Presenter.

Controller limits itself to obtaining an instance of a specific use case and transferring the control to the use case together with any “Request Model” (as a parameter), to use Robert. C. Martin’s terminology, reflecting user’s input. It is the responsibility of the use case to decide what presentation logic (if any) will be executed.

conclusion: controller pass request to service? or should transfer to array?

if view can be mocked when pass request to service? if not, then need pass array. or use DTO which transfers request to object.

https://stackoverflow.com/questions/41461497/simulate-a-http-request-and-parse-route-parameters-in-laravel-testcase/61903688#61903688

https://stackoverflow.com/questions/50375196/how-to-mock-the-request-class-in-laravel


https://blog.cleancoder.com/uncle-bob/2012/08/13/the-clean-architecture.html   
https://medium.com/@gushakov/revisiting-cargo-tracking-application-using-clean-ddd-4ed16c0e6ae1  

