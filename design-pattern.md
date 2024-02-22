# Design Pattern

## classification

Design patterns had originally been categorized into 3 sub-classifications based on what kind of problem they solve. 

Creational patterns provide the capability to create objects based on a required criterion and in a controlled way. 

Structural patterns are about organizing different classes and objects to form larger structures and provide new functionality. 

Finally, behavioral patterns are about identifying common communication patterns between objects and realizing these patterns.

https://en.wikipedia.org/wiki/Software_design_pattern#Classification_and_list  

## commaon patterns

| classification      | name |
| ----                | ---- |
| Creational patterns | Singleton |
| Creational patterns | Abstract Factory |
| Creational patterns | Factory Method |
| Structural patterns | Facade |
| Behavioral patterns | Template method |
| Behavioral patterns | Observe or Publish/Subscribe |
| Behavioral patterns | Strategy |
| Behavioral patterns | Chain of responsibility |

## Observe pattern

### 2 kinds of implementations

- Coupling implementation. Typically, the observer pattern is implemented so the "subject" being "observed" is part of the object for which state changes are being observed (and communicated to the observers). This type of implementation is considered "tightly coupled", forcing both the observers and the subject to be aware of each other and have access to their internal parts, creating possible issues of scalability, speed, message recovery and maintenance (also called event or notification loss), the lack of flexibility in conditional dispersion, and possible hindrance to desired security measures. 

- Typical pub-sub implementation. In some (non-polling) implementations of the publish-subscribe pattern (aka the pub-sub pattern), this is solved by creating a dedicated "message queue" server (and sometimes an extra "message handler" object) as an extra stage between the observer and the object being observed, thus decoupling the components. In these cases, the message queue server is accessed by the observers with the observer pattern, "subscribing to certain messages" knowing only about the expected message (or not, in some cases), while knowing nothing about the message sender itself; the sender also may know nothing about the observers. 

### example

Event Listener in laravle is an implemention example.

## Facade pattern

### Facade pattern definition:
Facade helps you to hide any complex implementation of a class to get an instance of it

Wikipedia:
a facade is an object that serves as a front-facing interface masking more complex underlying or structural code

https://dev.to/ahmedash95/design-patterns-in-php-facade-with-laravel-j24  
https://brainlet.medium.com/what-is-laravel-facade-9ce26397942d  
https://en.wikipedia.org/wiki/Facade_pattern  

### facade in larvel is facade pattern or not?

Facade in laravel is not a real facade pattern, just a feature similar to facade pattern.

Apparently some people don’t consider facade in laravel to be a real facade pattern, but I feel like it does coordinate complex interactions behind the scenes so that we can easily use the tools that Laravel provides for us.

The Laravel framework has a feature similar to this pattern, also termed Facades.

http://snags88.github.io/facade-pattern-in-laravel  
https://shishirthedev.medium.com/facade-in-laravel-application-d2a3053f5a71  

## Strategy Pattern vs State Pattern

Patterns are not only about UML, but their definition and idea that stand behind them. While Strategy define different algorithms, State implements a finite state machine.

https://medium.com/@iamprovidence/strategy-vs-state-pattern-6168cc102c91  

## factory method pattern

In class-based programming, the factory method pattern is a creational pattern that uses factory methods to deal with the problem of creating objects without having to specify the exact class of the object that will be created. This is done by creating objects by calling a factory method—either specified in an interface and implemented by child classes, or implemented in a base class and optionally overridden by derived classes—rather than by calling a constructor. 

### interface

Another example in PHP follows, this time using interface implementations as opposed to subclassing (however, the same can be achieved through subclassing). It is important to note that the factory method can also be defined as public and called directly by the client code (in contrast with the Java example above).

    /* Concrete implementations of the factory and car */
    class SedanFactory implements CarFactory
    {
        public function makeCar(): Car
        {
            return new Sedan();
        }
    }
    
    class Sedan implements Car
    {
        public function getType(): string
        {
            return 'Sedan';
        }
    }

https://en.wikipedia.org/wiki/Factory_method_pattern#PHP

### base class and subclass override

1. no subclass

          /// <summary>
          /// Implementation of Factory - Used to create objects.
          /// </summary>
          public class PersonFactory
          {
              public IPerson GetPerson(PersonType type)
              {
                  switch (type)
                  {
                      case PersonType.Rural:
                          return new Villager();
                      case PersonType.Urban:
                          return new CityPerson();
                      default:
                          throw new NotSupportedException();
                  }
              }
          }

2. abstract function in baseclass
   
          /* Almost same as Factory, just an additional exposure to do something with the created method */
          public abstract class ProductAbstractFactory
          {
              protected abstract IProduct MakeProduct();
          
              public IProduct GetObject() // Implementation of Factory Method.
              {
                  return this.MakeProduct();
              }
          }
          
          public class PhoneConcreteFactory : ProductAbstractFactory
          {
              protected override IProduct MakeProduct()
              {
                  IProduct product = new Phone();
                  // Do something with the object after you get the object.
                  product.SetPrice(20.30);
                  return product;
              }
          }

3. no abstract function in baseclass

            class A {
                public void doSomething() {
                Foo f = makeFoo();
                f.whatever();   
            }
    
            protected Foo makeFoo() {
                return new RegularFoo();
            }


          class B extends A {
              protected Foo makeFoo() {
                  //subclass is overriding the factory method 
                  //to return something different
                  return new SpecialFoo();
              }
          }
   
https://en.wikipedia.org/wiki/Factory_method_pattern#C#  
https://stackoverflow.com/questions/5739611/what-are-the-differences-between-abstract-factory-and-factory-design-patterns  

## Template Method Pattern

### These helpers methods like getToSendProductList has three options.

1. abstract methods. like the example.
2. default implemention. For example getToSendProductList can have default implement and not abstract method. If subclasses use the same logic, don't need to override. If the logic is different, override it.
3. hook method. If getToSendProductList is not abstract method, but has empty boday. It's a hook.

### final and protected
template method itself like sendProduct should not be overriden, so declare as final.
abstract functions in superclass should be declared as protected, which means only subclasses can implement them. The implementation in subclasses can be protected or public, as subclasses function visibility can the same or bigger than superclasses.


        abstract class ProductService
        {
            final public function sendProduct(int $limit)
            {
                $productList = $this->getToSendProductList($limit);
                
                $sendProductList = $this->generateData($productList);
            }
        
            abstract protected function getToSendProductList(int $limit): array;
        
            abstract protected function generateData(array $productList): array;
        }

        class ProductNewService extends ProductService
        {
            protected function getToSendProductList(int $limit): array
            {
             	$productList = ['test];   
                return $productList;
            }
        
            protected function generateData(array $productList): array
            {
                $result = ['test'];
                return $result;
            }
        }


### abstract can be place before or after public or protected.

        abstract protected function getToSendProductList(int $limit): array;
or 

        protected abstract function getToSendProductList(int $limit): array;



### final can be place before or after public or protected.

        final public function sendProduct(int $limit)
or

        public final function sendProduct(int $limit)

https://en.wikipedia.org/wiki/Template_method_pattern
