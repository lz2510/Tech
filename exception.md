# Exception

## Laravel for error_report() that is issued by php, like E_WARNING, E_NOTICE, convert to ErrorException.

set_error_handler($this->forwardsTo('handleError'));
handleError() in vendor/laravel/framework/src/Illuminate/Foundation/Bootstrap/HandleExceptions.php

in StackTrace like this
Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(8, 'Undefined varia...', '/data/app/Finan...', 30, Array)


for count() function
7.2.0	count() will now yield a warning on invalid countable types passed to the value parameter.

	$files = "file.csv";
	if (empty($files) || count($files) !== 1) {}

For above code, if don't use ErrorException, Warning will be issed by php.

PHP Warning:  count(): Parameter must be an array or an object that implements Countable in /code/main.php on line 12

After using ErrorException, ErrorException will be throw and can be caught and log to file or other handling.

	function exception_error_handler($severity, $message, $file, $line) {
	    if (!(error_reporting() & $severity)) {
	        // This error code is not included in error_reporting
	        return;
	    }
	    throw new ErrorException($message, 0, $severity, $file, $line);
	}
	set_error_handler("exception_error_handler");

[2023-06-14 14:48:03] local.ERROR: ErrorException: count(): Parameter must be an array or an object that implements Countable in /data/app/Econ/Controllers/HKTVProductController.php:101

https://stackoverflow.com/questions/20075987/when-to-use-errorexception-vs-exception  
https://rollbar.com/blog/php-errorexception/

## Laravel for exception that can't be caught, for example some Error type issue which is not Exception type issue. 

if try catch Exception can catch Error type in php? or it’s just handled by laravel?
- can’t catch, it’s handled by laravel
- laravel default exception handle and log error if not try catch

Because try catch only catch Exception type issue.
Error type issue is a fatal error that caused the script to abort and exit immediately. All statements after the fatal error are never executed.
Error will be logged in file and render for console or http response. 

Noted that it will catch Throwable object that was thrown. Both Error and Exception implement the Throwable interface. 

set_exception_handler($this->forwardsTo('handleException'));
handleException((Throwable $e)) in vendor/laravel/framework/src/Illuminate/Foundation/Bootstrap/HandleExceptions.php  
report() in vendor/laravel/framework/src/Illuminate/Foundation/Exceptions/Handler.php  

This handler function needs to accept one parameter, which will be the Throwable object that was thrown. Both Error and Exception implement the Throwable interface. This is the handler signature:
handler(Throwable $ex): void

Below code can't catch Error type issue, only Exception type can be caught.

	try {
		function testArgument(string $arg1, string $arg2)
		{
		}
		testArgument('test');
	} catch (\Exception $e) {
		echo $e->getMessage();
	}
 
Fatal error: Uncaught ArgumentCountError: Too few arguments to function testArgument(), 1 passed in /box/script.php on line 7 and exactly 2 expected in /box/script.php:3  
Stack trace:  
#0 /box/script.php(7): testArgument('test')  
#1 {main}  

https://www.php.net/manual/en/function.set-exception-handler.php
