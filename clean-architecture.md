# Clean Architecture

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

#### boundary

![IMG_7550 copy 2](https://github.com/lz2510/TechInterview/assets/1209204/40ec8cb8-f43c-4cb4-8013-17c9d80896ea)

![IMG_7552 copy](https://github.com/lz2510/TechInterview/assets/1209204/166307df-48c9-434b-aa6a-046467f14c81)

The compile-time dependency is lower level depends on high levels. run-time dependency is that a high level calls a low level, which means a high level depends on a low level.

![IMG_7553 copy 2](https://github.com/lz2510/TechInterview/assets/1209204/ca1169b1-8fbf-491a-a7f7-2e40eef0bace)

![IMG_7555 copy](https://github.com/lz2510/TechInterview/assets/1209204/b8c49c27-57ed-46b2-b9c3-0c3541b93771)

![IMG_7556 copy](https://github.com/lz2510/TechInterview/assets/1209204/2efb733e-7c7e-4e6f-b23e-769f4e8c7010)

## Which data cross the boundary

![IMG_8382 copy](https://github.com/lz2510/TechInterview/assets/1209204/c6daceb4-491e-4fe0-8186-b5ebdc8171ce)

## Policy

![IMG_7672](https://github.com/lz2510/TechInterview/assets/1209204/fe01682d-748b-45f9-bd15-1ab1bc0b0f1e)

![IMG_7673](https://github.com/lz2510/TechInterview/assets/1209204/4a35b5f9-e412-4dfd-9b43-c54942130935)

## Level

![IMG_7671](https://github.com/lz2510/TechInterview/assets/1209204/91f88d63-78fe-40ec-9bf9-a62c23d25366)

## entity

![IMG_7665](https://github.com/lz2510/TechInterview/assets/1209204/6525a04c-4be3-4c01-b20b-d62bab30c18e)

![IMG_7666](https://github.com/lz2510/TechInterview/assets/1209204/41b7dd0f-053e-4833-9efa-c8ff724087ed)

## use case

![IMG_7667](https://github.com/lz2510/TechInterview/assets/1209204/fb4ea852-e119-456a-8149-6cdb0da13664)

![IMG_7668](https://github.com/lz2510/TechInterview/assets/1209204/cc843b2d-27da-427d-a832-bf03e7a18dc0)

![IMG_7669](https://github.com/lz2510/TechInterview/assets/1209204/202469fc-7457-4b8d-932a-fd30155c9744)

## request and response models

![IMG_7670](https://github.com/lz2510/TechInterview/assets/1209204/75b16e29-10c2-4150-9aac-8af22e527220)

## three principles of components

![IMG_7780](https://github.com/lz2510/TechInterview/assets/1209204/a9474fb3-e6ea-45a9-9ea8-2da6a2ce2c68)

![IMG_7779](https://github.com/lz2510/TechInterview/assets/1209204/ce2e4a84-714f-42e8-8919-46484b5609ac)

### CCP

![IMG_7786](https://github.com/lz2510/TechInterview/assets/1209204/06354dd8-fbb0-4843-928b-ca14e41ce983)

![IMG_7787](https://github.com/lz2510/TechInterview/assets/1209204/d5495f16-98fc-453c-a57c-4bb4801241bc)

![IMG_7781](https://github.com/lz2510/TechInterview/assets/1209204/1b342735-32d8-40e9-85d0-c63a142c6300)

### CRP

![IMG_7782](https://github.com/lz2510/TechInterview/assets/1209204/08609a3b-a15f-4b70-829a-c396986f11c1)

## Acyclic dependencies principle

![IMG_7783](https://github.com/lz2510/TechInterview/assets/1209204/db6f7bff-5e30-482a-8279-7eee12772855)

![IMG_7784](https://github.com/lz2510/TechInterview/assets/1209204/a0c45b7c-ec2d-4e1d-bed3-8ca7018ff324)

## abstract component

![IMG_8019](https://github.com/lz2510/TechInterview/assets/1209204/c492ce35-aac7-41cd-b7d6-a1932b046923)

## humble object

![IMG_8376 copy](https://github.com/lz2510/TechInterview/assets/1209204/b1304b69-dce8-4f8f-8803-38a49faabf6d)

![IMG_8377 copy](https://github.com/lz2510/TechInterview/assets/1209204/54ae4a59-4fec-4bc6-92f8-67fc0829dd22)

![IMG_8379 copy](https://github.com/lz2510/TechInterview/assets/1209204/c87048de-165a-46a6-b058-9e22dab4ee93)

![IMG_8380 copy](https://github.com/lz2510/TechInterview/assets/1209204/f3a46e59-2745-4553-8b35-f1b533be9c8a)

![IMG_8381 copy](https://github.com/lz2510/TechInterview/assets/1209204/f9ef54ce-21dd-4248-8219-ae5f6d32b98f)

