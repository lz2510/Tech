# PHP

## php8 new features

### type system completement

PHP has added support for the top type mixed, the bottom type never and null, false and true type.

And support for composite types union types,intersection types and DNF types which combine union and intersection types.

One benefit of union type is improved type safety: Union types can help to catch errors at compile-time rather than run-time, which can make code more reliable and easier to maintain.

- https://wiki.php.net/rfc/union_types_v2
- https://www.php.net/manual/en/language.types.declarations.php#language.types.declarations.mixed
- https://wiki.php.net/rfc/null-false-standalone-types
- https://wiki.php.net/rfc/true-type
- https://wiki.php.net/rfc/dnf_types
- https://medium.com/@moslem.deris/a-guide-to-union-types-in-php-8-examples-best-practices-and-benefits-d51c292f5f54

### readonly properties and readonly classes

This RFC introduces a readonly property modifier, which prevents modification of the property after initialization.

There is no need getter as property is public and setter as you can’t modify after initialization. If you don't initialize in constructor, you still can assign in setter method.

Value objects are often immutable: Properties are initialized once in the constructor, and should not be modified afterwards. PHP currently has no way to enforce this constraint. The closest alternative is to declare the property private, and only expose a public getter:

This doesn't actually make the property readonly, but it does tighten the scope where modification could occur to a single class declaration. Unfortunately, this requires the use of getter boilerplate, which results in worse ergonomics for the consumer.

Support for first-class readonly properties allows you to directly expose public readonly properties, without fear that class invariants could be broken through external modification:

https://wiki.php.net/rfc/readonly_properties_v2  
https://wiki.php.net/rfc/readonly_classes  

### constructor properties

Currently, the definition of simple value objects requires a lot of boilerplate, because all properties need to be repeated at least four times.

Especially for value objects, which commonly do not contain anything more than property declarations and a constructor, this results in a lot of boilerplate, and makes changes more complicated and error prone.

This RFC proposes to introduce a short hand syntax, which allows combining the definition of properties and the constructor:

https://wiki.php.net/rfc/constructor_promotion  
https://medium.com/@benr77/how-to-eliminate-boilerplate-code-with-php-8-1-766637d48353  
https://medium.com/@nemanjamilenkovic_58178/constructor-property-promotion-shakes-up-the-php-world-3c9e1c3d9ed4  

### Consistent Type Errors

For user-defined functions, passing a parameter of illegal type results in a TypeError. For internal functions, the behavior depends on multiple factors, but the default is to throw a warning and return null. This RFC proposes to consistently generate TypeError exceptions for all invalid parameter types, regardless of whether the function is user-defined or extension-defined.

PHP 8 introduces consistent type errors, which treat all type errors as fatal errors. This can help to catch errors more quickly and accurately and can reduce the likelihood of unexpected behavior caused by type errors.

https://wiki.php.net/rfc/consistent_type_errors
https://medium.com/your-software-development-stories/php-8-features-and-improvements-what-developers-need-to-know-3251249e4b8a

### Enum

It's similar to class but has return type.

#### The Pre-Enum Era in PHP

Before PHP 8.1, developers typically used class constants or arrays to represent related values. 

While this approach works, it isn’t devoid of problems. There’s no type safety — any string could be passed instead of one of the constants, leading to potential bugs. Moreover, these constants don’t group themselves under a single type, making it unclear.

#### Enum benefits

1. It's type safety as enum is php level type, so you can use type hint. 

2. Readability. There are no more value checks, type castings, null checks, and so on — you simply define an enum parameter in your method and the programming language is doing all the work.

https://doganoo.medium.com/unlocking-the-power-of-php-enums-best-practices-for-effective-use-2c3fbbf529e8  
https://medium.com/devwarlocks/understanding-and-using-enums-in-php-8-1-3ed076f9f3a8

### Attribute

#### What are Attributes?
Attributes provide a way to add metadata to your code. They are similar to docblocks but are structured and can be retrieved at runtime using PHP's reflection API. This makes them more versatile and powerful than simple comments.

#### The History of Attributes: From Annotations to PHP 8

1. Java and Annotations
1. C# and Attributes
1. Python and Decorators
1. PHP and DocBlocks
1. The Arrival of Attributes in PHP 8

https://medium.com/devwarlocks/creating-custom-attributes-in-php-8-a-guide-6e667c9035d8  
https://wiki.php.net/rfc/attributes_v2  
https://www.doctrine-project.org/2022/11/04/annotations-to-attributes.html  

### Reference

https://www.php.net/releases/8_0_0.php 
https://www.php.net/releases/8.1/en.php  
https://kvnc-inc.medium.com/php-8-1-new-features-array-is-a-list-array-unpack-c2e41cf826bc  
https://wiki.php.net/rfc/array_unpacking_string_keys  

## Lifecycle of laravel

### index.php

The entry point of a laravel application is public/index.php file. All requests are directed to this file by your web server. The index.php file loads the Composer generated autoloader definition, and then retrieves an instance of the Laravel application from bootstrap/app.php. 

### http/console kernel

Then the request goes to the HTTP or console kernel file depending on the type of request. All the actions that we want to do on the request before actually accessing is done here. Typically, these classes handle internal Laravel configuration. Middlewares and everything is defined here. 

### service provider

One of the most important kernel bootstrapping actions is loading the service providers for your application. All of the service providers for the application are configured in the config/app.php configuration file's providers array. 

### routing

Then comes the routing part. All the routings configurations are in App\Providers\RouteServiceProvider file. All the routes from routes folder are loaded .

### final steps

Once the route or controller method returns a response, the response will travel back outward through the route’s middleware.

Then the HTTP kernel’s handle method returns the response object and the index.php file calls the send method on the returned response. The send method sends the response content to the user's web browser.

### reference

https://medium.com/@upinderjits/laravel-lifecycle-8f5baf625b41  
https://laravel.com/docs/9.x/lifecycle  

## E_ERROR

PHP’s E_ERROR typically indicates a major issue with PHP. Normally, PHP may be able to recover from a lesser error and the PHP application could continue to run. However, with E_ERROR, PHP will usually outright fail and stop working entirely.

1. E_ERROR (int)	Fatal run-time errors. These indicate errors that can not be recovered from, such as a memory allocation problem. <b>Execution of the script is halted</b>.	 
2. E_WARNING (int)	Run-time warnings (non-fatal errors). Execution of the script is not halted.

https://rollbar.com/blog/e_errors-in-php/  
https://www.php.net/manual/en/errorfunc.constants.php

## constant

constant is immutable. Once a constant is defined, it can never be changed or undefined.

### how to define?

define() function and const keyword

### how many types?
- normal constant
- class constant
- interface constant

## constant vs static

Bear in mind that in common English "constant" and "static" are analogous, but in programming usage they are for the most part unrelated. A constant is an immutable value. a static value is one that is specific to the class it's in, rather than an instance of that class. There's no overlap in the two notions in either of those contexts the terms have meaning.

In the context of a class, static variables are on the class scope (not the object) scope, but unlike a const, their values can be changed.

https://blog.adamcameron.me/2016/05/php-constants-vs-private-static.html  
https://stackoverflow.com/questions/1685922/php-5-const-vs-static#:~:text=Constant%20is%20just%20a%20constant,the%20instances%20of%20a%20class. 
https://www.php.net/manual/en/language.oop5.static.php 

## void functions

Functions declared with void as their return type must either omit their return statement altogether, or use an empty return statement. null is not a valid return value for a void function.

https://www.php.net/manual/en/migration71.new-features.php  

## class abstraction

### any class that contains at least one abstract method must also be abstract.

Fatal error: Class AbstractClass contains 2 abstract methods and must therefore be declared abstract or implement the remaining methods (AbstractClass::getValue, AbstractClass::prefixValue) in /box/script.php on line 2

    class AbstractClass
    {
      abstract protected function getValue();
      abstract protected function prefixValue($prefix);
    }
    
right:

    abstract class AbstractClass
    {
      abstract protected function getValue();
      abstract protected function prefixValue($prefix);
    }

### a class can be declared as abstract but without any abstract method.

    abstract class AbstractClass
    {
        public function printOut() {
          echo "test";
        }
    }

## abstract class vs interface

### an abstract class can have properties, constant.

    abstract class AbstractClass
    {
      public string $url;
      const NAME = 'abs';
    }

https://www.php.net/manual/en/language.oop5.abstract.php  

### interface can have constant, but can't have properties.

interface officials, it’s possible for interfaces to have constant.

Below is ok.

    interface Template
    {
        const NAME = 'movie';
    }

Below is wrong.

    interface Template
    {
        public string $url;
    }
Fatal error: Interfaces may not include properties 

https://www.php.net/manual/en/language.oop5.interfaces.php  
https://medium.com/@ibrbayazit/php-interface-vs-abstract-class-2b708ea4347c  

### benefits

1. Interface benefits
- Does not modify the hierarchy tree
- Allows to implement N Interfaces

2. Benefits of Abstract Class
   
- It allows to develop the Template Method¹ pattern by pushing the logic to the model.

https://medium.com/@niranjan.sth8/boosting-laravel-quality-with-solid-principles-best-practices-and-examples-part-iii-l-1f89d8cef180  

## how to log error

There are 2 types of errors.
1. Errors emitted by the PHP engine itself when a core function fails or if code can’t be parsed
2. Custom errors your application triggers, usually caused by missing or incorrect user input

For type 1, it should be logged in error.log in php.ini. Because it automatically includes stack trace.

For type 2, it should be logged in application log file. As it belongs to application level. And if only error message are logged, as it's throw in application, so it can be easily located.

That's also why throwable can't be used in catch. As it catches both types. throwable exception can be 2 types. One is php built-in function thrown exception. The one is user defined function thrown exception.

https://stackoverflow.com/questions/15245184/log-caught-exception-with-stack-trace%

## Type hinting – Difference between `Closure` and `Callable`

The difference is, that a Closure must be an anonymous function, where callable also can be a normal function.

So if you only want to type hint anonymous function use: Closure and if you want also to allow normal functions use callable as type hint.

https://stackoverflow.com/questions/29730720/type-hinting-difference-between-closure-and-callable  

### Invokable Objects

Invokable Objects: Objects that implement the __invoke() method can be treated as callables.

    class Greeting {
        public function __invoke($name) {
            echo "Hello, $name!";
        }
    }

    $obj = new Greeting();
    $callable = $obj;
    $callable('John'); // Output

In this example, the Greeting class implements the __invoke() method, allowing objects of that class to be callable.

To summarize, “callable” is a type hint or declaration that denotes a parameter or return value as being a function or method reference, whereas “closure” refers specifically to an anonymous function that can capture variables from its surrounding scope. Closures are a subset of callables but offer additional features such as variable encapsulation.

https://medium.com/@miladev95/php-closure-and-callable-and-difference-2e5d176b3fca

## Variable-length argument lists

PHP has support for variable-length argument lists in user-defined functions by using the ... token.

https://www.php.net/manual/en/functions.arguments.php  

## ReflectionClass

- dependency injection 
- test private and protected properties and methods 

https://rakibdevs.medium.com/exploring-the-power-of-reflectionclass-in-php-a26d5ce533f3  

## Dependency Injection

The basic principle remains the same: rather than having objects create their own dependencies, we pass them in from outside. The benefits are as below:

1. Our class is no longer tightly coupled to the database implementation. We can easily swap out the database object for a different implementation

2. It also make testing better because you can change the real classes for mock classes, or change implementations for the speed of testing, like an SQLite in-memory database.

https://darkghosthunter.medium.com/php-a-noob-explanation-for-dependency-injection-and-di-container-a7179390b26c  
https://medium.com/@miqayelsrapionyan/php-dependency-injection-for-beginners-8eed8f105b4  

## array type hint of objects of a specific calss

option 1:
/** @var ProductSku[] */
private $skus;

option 2:
/** @var ProductSku[] */
private array $skus;

The phpdoc ProductSku[] is only for IDE or static analytic tool like phpstan to check or auto-completed. 
It still works even $skus are assigned not ProductSku[].
Option 2 at least type hint array, while option 1 type hint nothing. Option 2 is better.

Below syntax is not supported by PHP.
option 3:
private ProductSku[] $skus;
private string[] $skus;

https://stackoverflow.com/questions/71265229/is-there-a-type-hint-for-an-array-of-objects-of-a-specific-class-in-php-8-2  
https://externals.io/message/108175  

## array type hint for general

type[] is preferred than array<type>
if type hint key, only array<key, type>

typehint in nested array for phpstan

https://github.com/phpstan/phpstan/discussions/7316  
https://phpstan.org/writing-php-code/phpdoc-types#local-type-aliases  
https://stackoverflow.com/questions/20543050/phpdoc-typehint-in-nested-arrays-with-e-g-2-dimensions  
https://github.com/php-fig/fig-standards/blob/master/proposed/phpdoc.md  
https://github.com/php-fig/fig-standards/blob/master/proposed/phpdoc-tags.md  
    
## phpdoc official syntax
    
There’s no official. psr is standard and preferred . PHPDocumentor isn’t.
    
I found the reference of PHPDocumentor, but I have the feeling, that it is not the official PHP one and not (yet) compatible with PHP 8.0+.
https://stackoverflow.com/questions/66711759/official-phpdoc-reference-for-documenting-php-code   
    
## if nullable type should set default value or not

    public function getReverseList(string $storerKey, ?string $reverseOrderId, ?int $interval = '', ?int $size=20): void

The default is used only when the parameter is not specified; in particular, note that passing null does not assign the default value. the parameter is not specified means don't pass the parameter, passing null still means the parameter is specified.

If a parameter could not be specified in some scenario, then the default value is needed. For example, there are two calls. One pass full parameters, another only passes part of parameters.

If the parameters must be specified in any scenario, then the default value is not needed. 

If the parameter could be null which means still be specified, then use nullable type.

If the parameter can't be null based on business logic, then don't use nullable type, let php language do the type hint check when the parameter is null incorrectly.

### Nullable types
    
Nullable types means null can be passed as an argument. But if there's no default and the parameter is not specified, an error will emit.

    function test(?string $name)
    {
        var_dump($name);
    }

    test('elePHPant');
    test(null);
    test();

    string(10) "elePHPant"
    NULL
    Uncaught Error: Too few arguments to function test(), 0 passed in...

https://www.php.net/manual/en/migration71.new-features.php



### default values
    
The default is used only when the parameter is not specified; in particular, note that passing null does not assign the default value.

    function test2(?string $name='default_value')
    {
        var_dump($name);
    }

    test2(null);
    test2();

    NULL
    string(13) "default_value"

https://www.php.net/manual/en/functions.arguments.php#functions.arguments.default

## null coalescing operator vs null safe operator

null pointer exceptions 

Null represents the absence of a value in PHP. However, when attempting to access properties or call methods on null objects, a fatal error occurs, leading to application crashes. 

It’s important to note that the null safe operator short-circuits the expression as soon as it encounters a null value. This means that subsequent method calls or property accesses in the chain will not be executed if any of the preceding objects are null.

The null coalescing operator and the null safe operator serve different use cases:

Use the null coalescing operator when you want to provide a default value or handle fallback scenarios for null values.

Use the null safe operator when you want to safely access properties and invoke methods on potentially null objects without encountering null pointer exceptions.

https://medium.com/@prevailexcellent/mastering-null-safety-in-php-8-a-comprehensive-guide-to-using-the-null-safe-operator-47835ba1140b

## type safety

Type safety, also known as type correctness or type soundness, is a concept in computer programming that ensures that operations on data are performed with the correct data types and that type-related errors are caught at compile-time or runtime rather than resulting in unexpected behaviors or crashes.

In a type-safe programming language, variables, functions, and expressions have well-defined data types, and the language’s compiler or runtime system enforces rules to ensure that these types are used appropriately. Type safety provides several benefits, including:

1. Compile-time type checking: The compiler checks the types of variables and expressions during the compilation phase. It can catch type-related errors early in the development process, reducing the likelihood of runtime errors and making it easier to maintain and debug code.

2. Prevention of type-related bugs: Type safety helps prevent bugs that may occur due to incompatible data types or incorrect type conversions. This can lead to more robust and reliable software.

3. Increased code readability: Type information provides developers with additional context, making code easier to understand and maintain.

4. Enhanced refactoring support: Type safety facilitates refactoring by ensuring that changes to types propagate consistently through the codebase.

Languages that prioritize type safety are often statically typed, meaning that variable types are checked at compile-time, like Java, C++, or TypeScript. In contrast, dynamically typed languages (e.g., Python, JavaScript) perform type checking at runtime, which may result in type-related errors occurring during program execution.

However, it is worth noting that type safety is just one aspect of a programming language’s design. Some languages may choose to trade-off strict type safety for other features, such as increased flexibility and ease of use, depending on the language’s intended use case and target audience.

https://medium.com/@miladev95/type-safety-45b361d888d1

## trait

We all know about object-oriented programming and how we can inherit from one class to another. However, sometimes we need to implement multiple inheritance, which means allowing a class to inherit from more than one class. Unfortunately, this feature is not supported in PHP, so we use traits instead.

Apart from its main purpose, which is solving the problem of multiple inheritances, traits have many other uses, such as in SOLID principles, object-oriented programming, and more.

https://medium.com/@aliabdm/what-is-trait-in-php-4f15c77caa8

## CGI vs FastCGI vs PHP-FPM

CGI is the simplest and oldest method for executing server-side scripts but suffers from performance overhead. FastCGI improves upon CGI by introducing a persistent process pool, resulting in better performance. PHP-FPM, on the other hand, is a specific FastCGI implementation tailored for PHP execution, providing superior performance, scalability, and security for serving PHP applications. For modern PHP applications, PHP-FPM is the recommended method for handling dynamic content.

https://medium.com/@miladev95/cgi-vs-fastcgi-vs-php-fpm-afbc5a886d6d

## php strict types

WxAppRefundServiceTest.php

    $refundService = app()->make(RefundService::class);
    $result = $refundService->getAfterSaleType(0);
    $this->assertequals("仅退款", $result);


RefundService.php

    public function getAfterSaleType(string $hasGoodsReturn): string
    {
       var_dump($hasGoodsReturn);
    }

1. if there's no strict type, int 0 will be converted to string "0"
string(1) "0"

2. if enable strict type, TypeError will be thrown.

TypeError: Argument 1 passed to App\Platform\WeChat\Services\RefundService::getAfterSaleType() must be of the type string, int given, called in /data/tests/Unit/WxAppRefundServiceTest.php on line 18

Note that: declare(strict_types=1); must be written in file that calls the function, not define the function. It's in WxAppRefundServiceTest.php, not RefundService.php.


Strict typing applies to function calls made from within the file with strict typing enabled, not to the functions declared within that file. If a file without strict typing enabled makes a call to a function that was defined in a file with strict typing, the caller's preference (coercive typing) will be respected, and the value will be coerced.

Strict typing is only defined for scalar type declarations.


https://stackoverflow.com/questions/48723637/what-do-strict-types-do-in-php
https://www.php.net/manual/en/control-structures.declare.php
https://www.php.net/manual/en/language.types.declarations.php#language.types.declarations.strict

## php string casting

A value can be converted to a string using the (string) cast or the strval() function. 

A bool true value is converted to the string "1". bool false is converted to "" (the empty string). 

An int or float is converted to a string representing the number textually (including the exponent part for floats). 

null is always converted to an empty string.

For null, if using the (string) cast or the strval() function, it will be converted to an empty sting. But if it's type hinting, an TypeError will be thrown.

    getAfterSaleType(true);
    getAfterSaleType(false);
    getAfterSaleType(25);
    getAfterSaleType(25.60);

    var_dump(strval(null));
    var_dump((string)null);
    
    getAfterSaleType(null);

    function getAfterSaleType(string $hasGoodsReturn): string
    {
        var_dump($hasGoodsReturn);
        if ($hasGoodsReturn === 'false' || $hasGoodsReturn === "0" || $hasGoodsReturn === "") {
            return "仅退款";
        } else {
            return "退货退款";
        }
    
     }

string(1) "1"  
string(0) ""  
string(2) "25"  
string(4) "25.6"  
string(0) ""  
string(0) ""  

Fatal error: Uncaught TypeError: Argument 1 passed to getAfterSaleType() must be of the type string, null given, called in /box/script.php on line 11 and defined in /box/script.php:13
Stack trace:
#0 /box/script.php(11): getAfterSaleType(NULL)
#1 {main}
  thrown in /box/script.php on line 13

https://www.php.net/manual/en/language.types.string.php#language.types.string.casting
https://www.php.net/manual/en/language.types.type-juggling.php#language.types.typecasting

## Inheritance vs. Composition

### Inheritance 

Inheritance is a mechanism that enables a class to inherit properties and behaviors from another class, known as the parent or base class. The derived or child class inherits all the public and protected members of the parent class, promoting code reuse and establishing an “is-a” relationship.

Pros of Inheritance
1. Code Reusability: Inheritance allows you to reuse code from parent classes, reducing duplication and promoting maintainability.
2. Polymorphism: You can use polymorphism to interchangeably use derived classes wherever the base class is expected.

Cons of Inheritance

1. Tight Coupling: Inheritance creates a tight coupling between classes, making it difficult to change the implementation of the base class without affecting derived classes.
2. Inflexible: Changes to the base class can have unintended consequences in derived classes, leading to fragile code.

### Composition

Composition, on the other hand, is a design principle that emphasizes building complex objects by combining simpler objects. It establishes a “has-a” relationship, where a class contains an instance of another class to access its functionalities.

Pros of Composition
1. Flexibility: Composition offers more flexibility than inheritance, as you can easily change the behavior of a class by swapping out components.
2. Loose Coupling: Classes are loosely coupled, reducing dependencies and making the codebase more maintainable.

Cons of Composition
1. Boilerplate Code: Composition might introduce extra boilerplate code to delegate functionalities to composed objects.

### Favor Composition over Inheritance

Prefer using composition to build complex objects rather than relying solely on inheritance. This promotes flexibility and avoids tight coupling.

https://kvnc-inc.medium.com/inheritance-vs-composition-in-php-choosing-the-right-path-for-your-code-d01dbd96388c
https://medium.com/@moslem.deris/mastering-clean-code-in-php-principles-best-practices-and-real-world-examples-62a2ff550944

### Plain Old PHP Object (POPO)

Plain Old {Insert Language Here} Object is an simple approach that says you don't always need to use an extensive class, or inheritance chain, to store data or perform logic. It allows you to simplify the understanding of your structure by encapsulating details, not deriving details or creating dependencies on other sources.

Consider use of POPO in these cases:

1. To transfer data across the boundary. Like transferring data from Model to Controllers or from controllers to View or from one application to other application. In this case it would behave like Data Transfer Object (DTO). More details - DTO vs Value Object vs POCO
2. If we have a json data, we could bind that json data and map it to a POPO. So we exactly know what's there in json field. This will also ensure that our json data has a consistent structure always. It will also prevent abuse of JSON structure.
3. If there are too many parameters for a function, we could use "Introduce Parameter Object" refactoring to replace all those parameters with a POPO containing those members.
4. For mapping a database composite type

https://stackoverflow.com/questions/41188002/what-does-the-term-plain-old-php-object-popo-exactly-mean
