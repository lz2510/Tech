# data structure

Abstract data types are implemented by data structures.

## Abstract Data Type(ADT) and Data Structure to implemente ADT 
- String
  - Array (data structrue)
- Array (Data Type or Abstract Data Type)
  - Array (data structure)
- List
  - Linked List
- Stack
  - Linked List
- Queue
  - Linked List
- Map/Associative array
  - Hash table implementation
  - Tree implementation (Self-balancing binary search trees like, such as an AVL tree or a red–black tree)
- Set
  - Hash table
- Tree

## String

String is a abstract data type, not a data structure.
Strings are typically implemented as arrays of bytes, characters, or code units.

https://en.wikipedia.org/wiki/String_(computer_science)  

### String access and modification by character in PHP

Characters within strings may be accessed and modified by specifying the zero-based offset of the desired character after the string using square array brackets, as in $str[42]. 

https://www.php.net/manual/en/language.types.string.php

## Associative array (map)

The two major approaches to implementing dictionaries are a hash table or a search tree.

https://en.wikipedia.org/wiki/Associative_array#Implementation  

## List (abstract data type)

Lists are typically implemented either as linked lists (either singly or doubly linked) or as arrays.

https://en.wikipedia.org/wiki/List_(abstract_data_type)#Implementations  

### List in Redis

From a very general point of view a List is just a sequence of ordered elements: 10,20,1,2,3 is a list. But the properties of a List implemented using an Array are very different from the properties of a List implemented using a Linked List.

Redis lists are implemented via Linked Lists. This means that even if you have millions of elements inside a list, the operation of adding a new element in the head or in the tail of the list is performed in constant time. The speed of adding a new element with the LPUSH command to the head of a list with ten elements is the same as adding an element to the head of list with 10 million elements.

What's the downside? Accessing an element by index is very fast in lists implemented with an Array (constant time indexed access) and not so fast in lists implemented by linked lists (where the operation requires an amount of work proportional to the index of the accessed element).

Redis Lists are implemented with linked lists because for a database system it is crucial to be able to add elements to a very long list in a very fast way. Another strong advantage, as you'll see in a moment, is that Redis Lists can be taken at constant length in constant time.

https://redis.io/docs/data-types/lists/

## Set

https://en.wikipedia.org/wiki/Set_(abstract_data_type)#Implementations  
