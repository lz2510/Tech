# Laravel

## New features in laravel 9 and 10

1. type hint complement or Native type declaration
 
Before this upgrade, the skeleton code for Laravel used DocBlocks to describe the code and the expected replies and parameters. However, DocBlocks are replaced with native-type declarations in Laravel 10.

Laravel 10.x thoroughly updates the application skeleton and all stubs utilized by the framework to introduce argument and return types to all method signatures. In addition, extraneous "doc block" type-hint information has been deleted.

2. enum router bind
3. Native column modification is supported.

Before this latest Laravel version, you had to rely on a separate package called DBAL (doctrine/dbal) in order to edit columns using the change() function. However, Laravel 10 fully removes this need.
In SQL Server, MySQL, and PostgreSQL, you can edit a column without using the DBAL package.

https://laravel.com/docs/10.x/releases#types  
https://laravel.com/docs/9.x/releases#implicit-route-bindings-with-enums  
https://medium.com/@rkumaraj5694/why-laravel-10-dc680a7776cc

## Using Laravel Controllers, Events, Listeners, Services and Validation Together!

https://rezakhademi.medium.com/using-laravel-controllers-events-listeners-services-and-validation-together-e1f1631de08c

## Why are model observers in Laravel a bad practice?

https://medium.com/@dkhorev/why-are-model-observers-in-laravel-a-bad-practice-8feb8526c95e  

## Contextual Binding

Here we are telling the service container that whenever an implementation of the NotificationInterfaceis requested by our ApplicationNotificationController, it should provide an instance of the DatabaseNotificationclass.

And whenever an implementation of the NotificationInterfaceis requested by our SmsNotificationController, it should provide an instance of the SmsNotificationclass.

This type of binding is called Contextual Binding.

https://medium.com/@opadaalziede/supercharge-your-laravel-application-with-service-providers-fb0b19d6b5f5
https://laravel.com/docs/10.x/container#contextual-binding
