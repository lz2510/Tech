# PHP

## php8 new features

### Union Types

- Instead of PHPDoc annotations for a combination of types, you can use native union type declarations that are validated at runtime.
- https://wiki.php.net/rfc/union_types_v2

### Named Arguments

- Specify only required parameters, skipping optional ones.
- Arguments are order-independent and self-documented.
- https://wiki.php.net/rfc/named_params

### mixed type

mixed is equivalent to the union type object|resource|array|string|int|float|bool|null. Available as of PHP 8.0.0.

https://www.php.net/manual/en/language.types.declarations.php#language.types.declarations.mixed

## readonly properties

This RFC introduces a readonly property modifier, which prevents modification of the property after initialization.

Value objects are often immutable: Properties are initialized once in the constructor, and should not be modified afterwards. PHP currently has no way to enforce this constraint. The closest alternative is to declare the property private, and only expose a public getter:

This doesn't actually make the property readonly, but it does tighten the scope where modification could occur to a single class declaration. Unfortunately, this requires the use of getter boilerplate, which results in worse ergonomics for the consumer.

Support for first-class readonly properties allows you to directly expose public readonly properties, without fear that class invariants could be broken through external modification:

https://wiki.php.net/rfc/readonly_properties_v2  

### constructor properties

Currently, the definition of simple value objects requires a lot of boilerplate, because all properties need to be repeated at least four times.

Especially for value objects, which commonly do not contain anything more than property declarations and a constructor, this results in a lot of boilerplate, and makes changes more complicated and error prone.

This RFC proposes to introduce a short hand syntax, which allows combining the definition of properties and the constructor:

https://wiki.php.net/rfc/constructor_promotion  
https://medium.com/@benr77/how-to-eliminate-boilerplate-code-with-php-8-1-766637d48353  

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

