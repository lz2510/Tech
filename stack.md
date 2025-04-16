# Stack

## what's stack

Stack is an ADT (abstract data type) that acts like a list of objects but there is a difference.

Stack works on the principle of LIFO (Last In First Out), it means that the last item added to the stack will be the first item to be removed.

## implementation

It has array and linked list two methods.

## Use in php

1. array functions 
2. SPL functions

For implementing a stack for DFS, both standard PHP arrays (array_push/array_pop) and SplStack are efficient and perfectly viable options. Performance differences are usually negligible in this specific use case. The choice often comes down to coding style preference.

/**Semantic Clarity: Using SplStack makes the intent of your code clearer – you are explicitly using a Stack data structure.**/

Detailed Explanation:

PHP Arrays (array_push/array_pop)

- How it works: You use array_push() to add an element to the end of the array (push onto the stack) and array_pop() to remove an element from the end of the array (pop off the stack).
- Performance:
array_push(): Appends to the end. Generally efficient (amortized O(1)).
array_pop(): Removes from the end. This is crucial. Unlike array_shift (which removes from the beginning and is O(n)), removing the last element from a PHP array does not require re-indexing the other elements. It's an efficient operation with a time complexity of O(1).
- Impact on DFS: Since both the push (array_push) and pop (array_pop) operations needed for a stack are O(1) when using a standard PHP array, this method is very efficient for DFS. It doesn't suffer from the performance bottleneck seen when using arrays as queues.
- Common Usage: This is a very common and idiomatic way to implement stacks in PHP because it's built-in and performs well.

SplStack

- How it works: SplStack is part of the Standard PHP Library (SPL), specifically designed for stack (LIFO) operations. It uses push() to add to the top and pop() to remove from the top.
- Underlying Structure: Like SplQueue, SplStack also extends SplDoublyLinkedList. It utilizes the efficient addition/removal capabilities at one end of the linked list.
- Performance: Both push() (adding to the top/end) and pop() (removing from the top/end) operations on the underlying doubly linked list have a time complexity of O(1).
- Impact on DFS: SplStack provides efficient O(1) push and pop operations, making it well-suited for DFS algorithms.
- Semantic Clarity: Using SplStack makes the intent of your code clearer – you are explicitly using a Stack data structure.

## use case

- DFS
- check balanced symbol like valid () {} []
