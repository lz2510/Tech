# unit test

## best pritise

1. Tests should have no I/O operations

Main reasoning: I/O is slow and unreliable.

2. Tests should be concise and meaningful

Main reasoning: tests are a form of documentation. Keep them clean, short and readable.

3. A test should not depend on another

Main reasoning: a test should be able to run and succeed in any order.

4. Always inject dependencies

Main reasoning: mocking global state is terrible, not being able to mock dependencies at all makes it impossible to test a feature.

https://thephp.website/en/issue/clean-tests-with-php-and-phpunit/
