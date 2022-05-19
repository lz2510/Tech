# PHP

## php8 new features

### Union Types

- Instead of PHPDoc annotations for a combination of types, you can use native union type declarations that are validated at runtime.
- https://wiki.php.net/rfc/union_types_v2

### Named Arguments

- Specify only required parameters, skipping optional ones.
- Arguments are order-independent and self-documented.
- https://wiki.php.net/rfc/named_params

### Match Expression

The new match is similar to switch and has the following features:  
- Match is an expression, meaning its result can be stored in a variable or returned.
- Match branches only support single-line expressions and do not need a break; statement.
- Match does strict comparisons.
- https://wiki.php.net/rfc/match_expression_v2

### Reference

https://www.php.net/releases/8_0_0.php 
https://www.php.net/releases/8_0_0.php 

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


