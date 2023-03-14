# unit test 

## FIRST priniples

### Fast

- A developer should not hesitate to run the tests as they are slow.
- All of these including setup, the actual test and tear down should execute really fast (milliseconds) as you may have thousands of tests in your entire project.

### Indenpendent/Isolated

- For any given unit test, for its environment variables or for its setup. It should be independent of everything else should so that it results is not influenced by any other factor.
- Should follow the 3 A’s of testing: Arrange, Act, Assert
- In some literature, it’s also called as Given, when, then.

#### 3A's

- Arrange: The data used in a test should not depend on the environment in which the test is running. All the data needed for a test should be arranged as part of the test.
- Act: Invoke the actual method under test.
- Assert: A test method should test for a single logical outcome, implying that typically there should be only a single logical assert. A logical assert could have multiple physical asserts as long as all the asserts test the state of a single object. In a few cases, an action can update multiple objects.

#### one assert per test

What about the notion of having “one assert per test”?

I don’t follow that guideline too closely. I consider it for two things: 

A series of assertions may indicate the object is missing functionality which should be added (and tested). The classical case is equals(): It’s better to define an equals() method than (possibly create and) repeat a bunch of assertions about held data.
A series of similar assertions might benefit from a helper (assertion) method.

### Repeatable

- tests should be repeatable and deterministic, their values shouldn’t change based on being run on different environments.
- Each test should set up its own data and should not depend on any external factors to run its test

### Self-validating

- you shouldn’t need to check manually, whether the test passed or not.

### Thorough

- should cover all the happy paths
- try covering all the edge cases, where the author would feel the function would fail.
- test for illegal arguments and variables.

#### Thorough or Timely

People who believe in TDD, Robert. C. Martin included, explain this letter as Timely and state that tests should be written in the correct time—for TDD it means while writing a production code. This should force you to write a cleaner and more testable code. Additionally, they claim that writing tests after your production code can lead to a more dirty and less testable code. It may bring some benefits for the unit tests but may not be so good for other test types. 

That is one of the reasons why I, personally, prefer to explain this letter as Thorough. It means that when we test a method, we should cover not only the execution of happy paths but also possible errors and negative paths. It helps make our tests more meaningful, more complete, and gives us a better understanding of more complex parts of our code. Naturally, there is no big deal in following these two explanations together and combining their advantages.

https://github.com/tekguard/Principles-of-Unit-Testing  
https://medium.com/@tasdikrahman/f-i-r-s-t-principles-of-testing-1a497acda8d6  
https://dzone.com/articles/first-principles-solid-rules-for-tests  
https://xp123.com/articles/3a-arrange-act-assert/  
https://martinfowler.com/bliki/GivenWhenThen.html  

## how can i trust my test suits

### test coverage   

https://testing.googleblog.com/2020/08/code-coverage-best-practices.html?m=1

### Cyclomatic complexity and C.R.A.P. index

https://www.artima.com/weblogs/viewpost.jsp?thread=210575

### Not all the units of code are equally important

https://www.stickyminds.com/article/getting-empirical-about-refactoring

###  churn-php

https://github.com/bmitch/churn-php

### Let’s talk about test quality, infection php

How to use Mutation Testing?

- Daily basis usage for developer
- Daily basis usage for project

https://infection.github.io  
https://medium.com/@maks_rafalko/infection-mutation-testing-framework-c9ccf02eefd1

https://blog.mollie.com/how-can-i-trust-my-test-suite-f884390e79f3

## best pritice

1. Tests should have no I/O operations

Main reasoning: I/O is slow and unreliable.

2. Tests should be concise and meaningful

Main reasoning: tests are a form of documentation. Keep them clean, short and readable.

3. A test should not depend on another

Main reasoning: a test should be able to run and succeed in any order.

4. Always inject dependencies

Avoid global state, static class and singleton instance.

Main reasoning: mocking global state is terrible, not being able to mock dependencies at all makes it impossible to test a feature.

Here is a lesson for life: Forget about stateful static classes and singleton instances. If your class depends on something, make it injectable.

https://thephp.website/en/issue/clean-tests-with-php-and-phpunit/  
https://juanmacias.medium.com/cleancode-is-not-what-you-think-46c2d56e5d73  

## test coverage

Test coverage is a useful tool for finding untested parts of a codebase. Test coverage is of little use as a numeric statement of how good your tests are.

Coverage percentage is upper 80% or 90%, which is good enough. It's not necessary to achieve 100%. Because high coverage numbers are too easy to reach with low quality testing.

![image](https://user-images.githubusercontent.com/1209204/181197010-33e6b71d-533e-43cf-82ae-0056e4bed498.png)

https://martinfowler.com/bliki/TestCoverage.html  

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

## automatically test

gitlab CI

https://w3guy.com/php-testing-gitlab-ci/

## global state

### contains 2 types

- global variable
- static variable of class

### why global state is poor testability

- you cannot control its creation
- one test’s change to a global variable might break another test

### solution

1. use setUp and tearDown
2. use @backupGlobals

https://stackoverflow.com/questions/29166680/how-would-you-test-php-code-which-uses-global-variable  
https://phpunit.readthedocs.io/en/9.5/fixtures.html#global-state  
https://softwareengineering.stackexchange.com/questions/148108/why-is-global-state-so-evil

## global varaible

In PHP, global variables work like this:

- A global variable $foo = 'bar'; is stored as $GLOBALS['foo'] = 'bar';.
- The $GLOBALS variable is a so-called super-global variable.
- Super-global variables are built-in variables that are always available in all scopes.
- In the scope of a function or method, you may access the global variable $foo by either directly accessing $GLOBALS['foo'] or by using global $foo; to create a local variable with a reference to the global variable.

https://phpunit.readthedocs.io/en/9.5/fixtures.html#global-state

## global function

Should be avoided, as they affect code extensibility, testability and modularity.

https://dev.to/martinkordas/php-global-functions-how-they-affect-code-extensibility-testability-and-modularity-54h7

## for global constants, can use cons in phpunit.xml

https://stackoverflow.com/questions/3906968/global-constants-in-phpunit

## setProperty for private method

mock by reflection.

## Should we unit test logging?

1. no need for functionality, it’s library job.
2. if want to test whether write the right log level. 
- solution 1 is using dependence injection. 
- solution 2 is use Log facade mock in laravel.
     Log::shouldReceive('info')
        ->with('Failed to Save Venue'. $venue);

https://stackoverflow.com/questions/11998713/should-we-unit-test-logging  
https://laracasts.com/discuss/channels/testing/testing-that-the-log-record-has-been-written  
https://stackoverflow.com/questions/51246332/php-unit-testing-laravel-log-messages-with-unit-testing  

## Should I write log in development?
Of course, it’s necessary for debugging.

## Should I let logging write to file when testing?
You can let it write. Or you can mock a logging object to not to write.

## 测试边界
理想的测试边界应该是这样的，系统中所有核心复杂的逻辑全部包含在了边界内部，然后边界外都是不包含逻辑的，非常简单的代码，比如就是一行接口调用。这样任何对于系统的改动都可以在单元测试中就得到快速且充分的验证，集成测试时只需要简单测试下即可，如果出现问题，一定是对外部接口的理解有误，而不是系统内部改错了。

但是会实践中会发现，在繁忙的业务开发中想要先写测试用例是很困难的，可能会有以下原因：
* 代码结构尚未完全确定，出入口尚未明确，即使提前写了单元测试，后面大概率也要修改 
* 产品一句话需求，外加对系统不够熟悉，用例很难在开发之前写好

因此本文的工作流将顺序做了一些调整，先写代码，然后再不断地重构代码适配单元测试，扩大系统的测试边界。
不过从更广义的 TDD 思想上来说，这篇文章的总体思路和 TDD 是差不多的，或者标题也可以改叫做 “TDD 实践”。

![IMG_9283](https://user-images.githubusercontent.com/1209204/182123301-ecaba424-236f-4bca-8b9d-4ccf56c736a3.png)

https://mp.weixin.qq.com/s/ahLjLKmxk5bPZ_Zt52Zc-g  

## how to create instance

1. new classname(). it's not recommanded, as if add construct argument, the test will broke.
2. dependency inject, like app()->make(). it will automatically instanice argument.
3. if need mock. createMock will ignore constuct. 
4. if you need to use construct argument in mock. then use getMockBulder()->setConsturctorArgs()

## Alibaba unit test

https://mp.weixin.qq.com/s/wzGxqNv58Zig9_Izi3VhDg  

## 无效单元测试

### 验证数据对象问题

- 不验证数据对象
- 验证数据对象非空
- 验证数据对象部分属性
- 验证数据对象全部属性，无法验证新属性

### 验证抛出异常问题

- 不验证抛出异常类型
- 不验证抛出异常属性
- 只验证抛出异常部分属性
- 不验证抛出异常原因
- 不验证相关方法调用

### 验证依赖方法问题

- 不验证依赖方法调用
- 不验证依赖方法调用次数
- 不验证依赖方法调用参数
- 不验证所有依赖方法调用
- 验证所有依赖方法调用，没有验证别的方法调用

https://mp.weixin.qq.com/s/R4ZKWcB4TMFAiQlnIRqNeQ  

## Simplify test

### 简化模拟数据对象

- 利用JSON反序列化简化数据对象赋值语句
- 利用虚拟数据对象简化返回值模拟语句
- 利用虚拟数据对象简化参数值模拟语句

### 简化模拟依赖方法

- 利用默认返回值简化模拟依赖方法
- 利用任意匹配参数简化模拟依赖方法
- 利用do/thenAnswer简化模拟依赖方法
- 利用Mock参数简化模拟链式调用方法

### 简化验证数据对象

- 利用JSON序列化简化数据对象验证语句
- 利用数据对象相等简化返回值验证语句
- 利用数据对象相等简化参数值验证语句

### 简化验证依赖方法

- 利用ArgumentCaptor简化验证依赖方法

### 简化单元测试用例

- 简化单元测试用例
- 利用JUnit的参数化测试简化单元测试用例

https://mp.weixin.qq.com/s/HROhxieLa_g394QiYZUpuw  

