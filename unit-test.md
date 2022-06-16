# unit test

## how to make sure code is good engough and don't introduce new bug

- use code quality tool
- follow best pritice
- when fix a bug. write a test that reproduces the bug. then fix the bug.
- use automaticed test tool to generate test coverage, if lower than coverage rate, then reject.
when develop new feature, write unit and functional test.

https://softwareengineering.stackexchange.com/questions/357343/how-can-i-avoid-causing-bugs-in-the-software-when-i-fix-unrelated-bugs  

## best pritice

1. Tests should have no I/O operations

Main reasoning: I/O is slow and unreliable.

2. Tests should be concise and meaningful

Main reasoning: tests are a form of documentation. Keep them clean, short and readable.

3. A test should not depend on another

Main reasoning: a test should be able to run and succeed in any order.

4. Always inject dependencies

Main reasoning: mocking global state is terrible, not being able to mock dependencies at all makes it impossible to test a feature.

https://thephp.website/en/issue/clean-tests-with-php-and-phpunit/  
https://juanmacias.medium.com/cleancode-is-not-what-you-think-46c2d56e5d73  

## intergration test

Luckily for us Laravel 5 provides two useful methods to solve this problem:
* Database Transactions
Each time you run a test, Laravel will cleverly wrap the database calls in a transaction, so when the test finishes the transaction rolls back, leaving the database in its previous state.
* Switch to a test database
You can set up an alternative database to use when Laravel switches to a test environment. However you still have to make sure that this database remains in the same state between each test iteration, otherwise it could affect the results. Remember: tests must be performed in isolation.
However there’s a handy solution that elegantly solves this problem, and at the same time it speeds up the execution of the tests: setup a SQLite database in memory, so when the tests are over, it will simply be destroyed.
Warning: be sure to avoid the use of MySQL native functions in your code, because in most of the cases they not work in SQLite.

https://mauricius.dev/sqlite-in-memory-database-for-unit-tests-in-laravel/  
https://ashallendesign.co.uk/blog/how-to-make-your-laravel-app-more-testable  
https://medium.com/star-gazers/laravel-testing-tips-tricks-fc69b1f02d5a  

## test database

1. in-memory sqlite 
2. file-based sqlite 
3. mysql for test (if code has sql native function)

## how to set sqlite in memory

https://laracasts.com/discuss/channels/testing/sqlite-in-memory-for-phpunit-testing  
https://riptutorial.com/laravel/example/24356/testing-setup--using-in-memory-database  
https://www.horuskol.net/blog/2018-11-10/dont-use-in-memory-sqlite-for-testing-laravel/  
