# Stack

## what's stack

Stack is an ADT (abstract data type) that acts like a list of objects but there is a difference.

Stack works on the principle of LIFO (Last In First Out), it means that the last item added to the stack will be the first item to be removed.

## implementation

It has array and linked list two methods.

## Use in php

1. array functions 
2. SPL functions

For LeetCode problems in PHP, SplStack is the better choice.

While using array_push and array_pop might seem simpler, SplStack offers more predictable performance and a clearer, more purpose-built API that aligns better with the requirements of algorithmic challenges.

## Performance

The most critical difference lies in how they handle memory and operations.
SplStack: It's implemented as a doubly linked list. This means that push() and pop() operations (adding to or removing from the end) are always true O(1) time complexity. The operation takes a constant amount of time, regardless of the stack's size, because it only involves changing a few pointers.
Array: A standard PHP array is actually a powerful, ordered hash map. While array_pop() is a fast O(1) operation, array_push() (or $arr[] = $value) has an amortized O(1) time complexity. This means most pushes are fast, but occasionally, when the array runs out of its pre-allocated memory capacity, PHP must allocate a new, larger chunk of memory and copy all existing elements over. This can cause an unpredictable performance spike, which could be an issue in a time-sensitive LeetCode problem.

## Readability and Intent

This is a major advantage of SplStack.
SplStack: When you see new SplStack(), you know exactly what the data structure is and how it will be used. The code becomes self-documenting. Methods like $stack->push($val) and $stack->top() are explicit about their purpose.
Array: An array is a general-purpose tool. When someone reads your code and sees $items = [], they don't know if it will be used as a stack, a queue, a list, or a map until they analyze how it's manipulated later with array_pop or other functions. SplStack removes this ambiguity.

## Recommendation for LeetCode

Always prefer SplStack when you need a stack.
Safety: It provides guaranteed O(1) performance, protecting you from unexpected timeouts on large inputs.
Clarity: It makes your code cleaner and easier to reason about, which is crucial when you're trying to solve a complex problem under pressure.

## use case

- DFS
- check balanced symbol like valid () {} []
