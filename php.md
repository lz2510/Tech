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

## readonly properties and readonly classes

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

### Enum

- similar to class but has return type

#### Enum vs Number and Constants

- First of all, there is readability. compared use numbers directly not constants.

- Notice that this ambiguity is not finally solved when you move the values to a (class) constant.

Sure, you would keep a little order by using constants, but at a very low level you still deal with primitive values(it means you are using int, strings primitive values, but enum is php level type) and there is technically no obstacle to use a hardcoded value instead of the constant.

#### Enum benefits

Personally, I classify enums under “type safety” and a good tool to increase strictness of source code. There are no more value checks, type castings, null checks and so on — you simply define an enum parameter in your method and the programming language is doing all the work.

https://doganoo.medium.com/unlocking-the-power-of-php-enums-best-practices-for-effective-use-2c3fbbf529e8  

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
