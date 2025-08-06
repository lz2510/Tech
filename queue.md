# Queue

It is an abstract data type. It is an ordered list of objects that follows the FIFO (First-In-First-Out) principle.

## implementation

It has array and linked list two methods.

## Use in php

1. array functions 
2. SPL functions

For LeetCode queue problems, you should always use SplQueue. Using an array with array_push and array_shift is a performance trap that will cause your solution to fail on larger test cases.

Here’s a direct comparison:

## Array Method: array_push (Enqueue) + array_shift (Dequeue)

This approach is fundamentally flawed for performance-sensitive tasks like LeetCode challenges.

array_push($queue, $value);: This adds an element to the end of the array. This part is fast, with an amortized time complexity of O(1). (This means most pushes are fast, but occasionally, when the array runs out of its pre-allocated memory capacity, PHP must allocate a new, larger chunk of memory and copy all existing elements over. This can cause an unpredictable performance spike, which could be an issue in a time-sensitive LeetCode problem.)

array_shift($queue);: This removes an element from the beginning of the array. This is the problem. To remove the first element, PHP must re-index every other element in the array (element 1 becomes 0, 2 becomes 1, and so on). This is an O(n) operation, meaning its execution time is directly proportional to the number of elements in the queue.

The Verdict: This method is too slow. For a queue with 100,000 items, a single array_shift operation can take 100,000 steps, leading to a "Time Limit Exceeded" (TLE) error.

Think of it like a long line of people. When the first person leaves, everyone behind them has to take one big step forward. It's inefficient.

## SplQueue: The Correct Choice

SplQueue is a purpose-built data structure from PHP's Standard Library (SPL) designed for this exact scenario.
Underlying Structure: It uses a doubly linked list.
$queue->enqueue($value);: Adds an element to the end. This is a true O(1) operation.
$queue->dequeue();: Removes an element from the beginning. This is also a true O(1) operation.
Because it's a linked list, adding or removing elements from either end only requires updating a few pointers, regardless of how many items are in the queue.

The Verdict: SplQueue provides fast, consistent, and predictable performance, making it the only reliable choice for queue-based problems in LeetCode.  It works like a real-world queue where people at the back don't have to move when the person at the front is served.

## Uses

- **Breadth-first search** uses a queue to keep track of the nodes to visit next.
- **Web servers** use queues to manage requests—page requests get fulfilled in the order they're received.
- **Processes** wait in the CPU scheduler's queue for their turn to run.

https://www.interviewcake.com/concept/java/queue  


