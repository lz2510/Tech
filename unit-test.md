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

## Should I use real or sample data for unit tests?

I recently came across something a similar problem which was transforming large xml feeds from an upstream system into a proprietary format.

1. for intergration test, write a set of integration black box tests for the full feeds testing things like record counts and other high level success metrics.

2. for unit test, break down inputs into smaller and smaller chunks until I was able to test all the permutations of the data. 

You do not need to interact with 250 fields to create one useful test. You need to break down the problem into smaller parts. If you somehow managed to write a test that used 250 fields I certainly wouldn't trust it because I'd have no hope of understanding it.

https://stackoverflow.com/questions/4317747/should-i-use-real-or-sample-data-for-unit-tests  
https://softwareengineering.stackexchange.com/questions/382287/what-is-recommended-way-to-create-test-data-for-unit-test-cases

## 用例设计问题

黑盒测试：将被测代码当作黑盒，基于程序对外提供的功能(包括它的输入、输出、以及输入输出作用关系)设计测试用例。典型方法包括边界值分析、等价类划分、决策树、状态机转换等。

白盒测试：将被测代码当作白盒，基于程序内部的实现结构(包括条件、分支、循环等语句)设计测试用例。典型方法有语句覆盖、分支覆盖、条件覆盖、代码路径覆盖等。

有人也许会说，这个方法是否过于繁琐、成本太高？事实上，如下图所示，根据二八原则，对于绝大部分逻辑简单的方法，只需要简单设计用例就可以了。只有少数长尾的、逻辑复杂的(特征：代码中分支多、判断条件多、执行路径多)的方法才需要严谨地设计用例。事实上，它们也值得这样测试，因为逻辑复杂往往意味着更高的出错可能性和质量风险。

https://mp.weixin.qq.com/s/8JC_vaFOgiJPIH7yfbP25A

## 边界测试问题

软件测试，说一千道一万，它的根本目的是发现软件BUG。投资大师芒格有句名言，“要去鱼多的地方捕鱼”。同理，对于测试来说，我们要去BUG多的地方找BUG。

那么，什么地方BUG多呢？经验告诉我们，边界场景BUG多。这里的边界场景是相对于主干流程(即程序的happy path)而言的，它包含了程序的各种分支(branch)、角落(corner)、边缘(edge)、异常(exceptional)、无效(invalid)场景。那么，如何在边界场景找BUG呢？这就要用到边界测试(boundary testing)方法。﻿

如何寻找边界呢？有两种方法。一种是黑盒法，从需求中寻找边界。另一种是白盒法，从代码中寻找边界。

https://mp.weixin.qq.com/s/8JC_vaFOgiJPIH7yfbP25A

## 什么样的依赖需要Mock，什么样的依赖不需要Mock呢

当A依赖B时，以下情形，不建议Mock B：

B是A的本地依赖：例如系统内置类(ArrayList等)、Utility类(StringUtils等)
B是A的简单依赖：B的逻辑非常简单
B是A的实体依赖：例如数据类，只有简单的getter、setter方法，没有复杂处理逻辑
B是A的独占依赖：B只被A依赖，不被其他类依赖
当A依赖B时，以下情形，建议Mock B：

B是A的外部依赖：例如外部HTTP服务，需要复杂的设置或返回结果不可控
B是A的复杂依赖：B的逻辑复杂，返回结果有很多情形
B是A的慢依赖：B的某些行为很慢，例如存在等待、超时
B是A的共享依赖：B不止被A依赖，还被C、D、E依赖

https://mp.weixin.qq.com/s/8JC_vaFOgiJPIH7yfbP25A

## 单元测试和集成测试分工问题

在实践中，我们要有全局意识，统筹考虑单元测试和集成测试，在必要的时候，随时准备从单元测试切换到集成测试、或者从集成测试切换到单元测试。﻿

![image](https://github.com/lz2510/TechInterview/assets/1209204/b27f6e79-166a-43a6-affd-1bc8b3e0377e)

## Do you use constants from the implementation in your test cases?

          constant float PI = 3.14;
          float getPi() 
          { 
             return PI;
          }
Would you test it like this:

          testPiIs3point14()
          {
             // Test using literal in test case
             AssertEquals( getPi(), 3.14 );
          }
          
Or like this:

          testPiIs3Point14()
          {
             // Test using constant from implementation in test case
             AssertEquals( getPi(), PI );
          }
In other words, do you use constants from your system under test in your test cases? Or is this considered an implementation detail?

The best alternative IMHO is to implement a unit test to check the constant's value to be what you expect, and then use the constant freely in your other tests.

Something along the lines of implementing these two tests:

          testPiIs3point14()
          {
             AssertEquals( PI, 3.14 );
          }

          testGetPiReturnsPi()
          {
             AssertEquals( getPi(), PI );
          }
PS: While checking the value may not be so important for all constants, it could be very important for some.

I think this is the question about coupling between the tests and the production code. When I first started TDD I thought that having the constant in the tests makes the tests more thorough. However, now I think it just causes tighter coupling between the tests and the implementation. Does it make it more safe if you copy and paste the constant to the test? Not really. It just makes it more painful to change the constant, especially if its copy-pasted to multiple tests. These tests don't test if it is the right constant, they just test that this constant is returned from the method, so now I would definitely go for test number two.

https://stackoverflow.com/questions/3360074/do-you-use-constants-from-the-implementation-in-your-test-cases

## Testing class with private/protected constant

          private const RANDOM = 18;

However, that stops the test from working, as now we are trying to access private constant.

So now we have two options:

1. Declare the constant as public.
2. Use reflection in test. Meaning the test becomes:

          $this->assertEquals(
          (new ReflectionClass(FooBar::class))->getConstant('RANDOM'),
          $mock->doSomething()
          );

The first approach feels very wrong, as we are making constant public only for the sake of test, not because class/hierarchy/business model needs it to be public.

The second one doesn't feel right either, as this use case would not be found by any IDE, so any search/replace/refactor would simply fail here.

So my question(s) is, should the second scenario be used without caring that refactoring will break tests? Or maybe even the use of constants in general should be discouraged in asserts?

Using the constant in test is actually a bad practice IMHO.

You should test the constant's literal value. ($this->assertSame(18, $mock->doSomething())

Why?

Because one of the important values testing brings you is that you notice unintended consequences of changes to the code. As the constant is private it's value is never used outside of the class. But many different things may depend on it's value internally.

Now imagine a junior developer, who is not familiar with the codebase is tasked with changing one of the places where the constant is used and change it from 18 to 16. He will go and change the constant's value from 18 to 16 and do a rough check of where the constant is used (not noticing your doSomething() method). Now, in your method you absolutely need the random to be 18, not 16! But if you used the constant, he'd never know, because as he changed it from 18 to 16 the assert would also change from 18 to 16. And the test would pass.

Rule of thumb for me:

          Never use expected value of assert that is pulled from the code of the app. Always use literal value where possible.

https://stackoverflow.com/questions/53089098/testing-class-with-private-protected-constant
