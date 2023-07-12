# Clean Code & Clean Architecture

## use a model response as agrument to pass service

    class InvitationController extends Controller
    {
        public function send(Request $request, InvitationService $invitationService): JsonResponse
        {
            $invitation = $invitationService->createInvitation($request);
            $invitationService->send($invitation);
        }
    }

The method createInvitation retrun a model response, then use it as agrument to pass to service. This have two problem.

### problem one is logic leaks into controller

One of the main ideas of Clean Architecture (CA) is that Controller does not know anything about Presenter.

Controller limits itself to obtaining an instance of a specific use case and transferring the control to the use case together with any “Request Model” (as a parameter), to use Robert. C. Martin’s terminology, reflecting user’s input. It is the responsibility of the use case to decide what presentation logic (if any) will be executed.

In a typical MVC architecture, Controller will just call a use case (as a function) processing the returned result (or catching any errors) by calling the appropriate Presenter. So the great deal of sophisticated business logic (related to the process flow of the use case) leaks into Controller. This is not desirable, since this logic belongs to the core of the application where it can be isolated and unit tested.

### problem two is service need to know the outer layer details, which violates the dependence rule

For example, many database frameworks return a convenient data format in response to a query. We might call this a RowStructure. We don’t want to pass that row structure inwards across a boundary. That would violate The Dependency Rule because it would force an inner circle to know something about an outer circle.

### there are some solutions
- use array
- use DTO
- use request object, not recommanded

#### controller pass request to service? or should transfer array or DTO?

If request can be mocked when pass request to service? if not, then need pass array. or use DTO which transfers request to object.
Request can't be mocked, it can be created. But this coupled the request. So it's better not to pass request.

https://blog.cleancoder.com/uncle-bob/2012/08/13/the-clean-architecture.html   
https://medium.com/@gushakov/revisiting-cargo-tracking-application-using-clean-ddd-4ed16c0e6ae1  
https://stackoverflow.com/questions/41461497/simulate-a-http-request-and-parse-route-parameters-in-laravel-testcase/61903688#61903688  
https://stackoverflow.com/questions/50375196/how-to-mock-the-request-class-in-laravel  

## Clean Architecture

![image](https://user-images.githubusercontent.com/1209204/179937113-5c7414d9-eea6-42e6-a615-3aa2f36df4af.png)


### The Dependence Rule

The overriding rule that makes this architecture work is The Dependency Rule. This rule says that source code dependencies can only point inwards. Nothing in an inner circle can know anything at all about something in an outer circle. In particular, the name of something declared in an outer circle must not be mentioned by the code in the an inner circle. That includes, functions, classes. variables, or any other named software entity.

By the same token, data formats used in an outer circle should not be used by an inner circle, especially if those formats are generate by a framework in an outer circle. We don’t want anything in an outer circle to impact the inner circles.

### User Cases

The software in this layer contains application specific business rules. It encapsulates and implements all of the use cases of the system. These use cases orchestrate the flow of data to and from the entities, and direct those entities to use their enterprise wide business rules to achieve the goals of the use case.

We do not expect changes in this layer to affect the entities. We also do not expect this layer to be affected by changes to externalities such as the database, the UI, or any of the common frameworks. This layer is isolated from such concerns.

We do, however, expect that changes to the operation of the application will affect the use-cases and therefore the software in this layer. If the details of a use-case change, then some code in this layer will certainly be affected.

https://blog.cleancoder.com/uncle-bob/2012/08/13/the-clean-architecture.html 

## Control flow

### exceptional flows should be in use cases

These exceptional flows will result either in the different type of the response DTO retuned by the use case. Or, it will force the controller to handle several different types of exceptions.
- it means use cases catch exceptions then return or catch exceptions then throw. for return, controller just return. for throw, controller needs to catch then return.

Code dealing with successful or exceptional control flows resulting from a use case’s execution is actually a proper responsibility of the use case. It must be implemented in the control flow of the use case itself: it is an integral part of the business operation embodied by the use case. 

Moreover, we should really be interested to test these scenarios when we are unit testing the use case.

The important point is that we try to maintain all error handling on the level of Use Cases, not allowing any exceptions to “bubble up” back into Controller.

### different phrases

There is an initialization phase. Usually, it is here that we convert Request Model DTOs to the value objects (like entity ID, for example) which will be used in the rest of the flow. Typical exceptions in this part of the flow are exceptions related to the validation of domain value objects resulting from the the invalid input data.

- convert from input data to domain model value object , validate in domain model value object 

There are several main parts of the flow: one for each branch of each “if-then-else” statement, where we actually perform the useful logic of the use case (our specific business scenario). This usually, but not always, will involve leaving the use case through output ports to the secondary adapters. Sometimes, the flow will come back into the use case from the adapters in the form of a response to a call or as an exception. There are many different types of exceptions to be dealt with in these parts of the flow. It might be a security assertion which throws an exception for a permission refused for a particular operation. It might be a violation of aggregate invariant. And, certainly, there will be errors from the persistence gateway or other secondary adapters.

https://medium.com/unil-ci-software-engineering/flow-of-control-in-clean-architecture-23662dfd24f7  
https://softwareengineering.stackexchange.com/questions/357052/clean-architecture-use-case-containing-the-presenter-or-returning-data  

