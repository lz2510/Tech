# Queue

It is an abstract data type. It is an ordered list of objects that follows the FIFO (First-In-First-Out) principle.

## implementation

It has array and linked list two methods.

## Use in php

1. array functions 
2. SPL functions

For implementing a queue (FIFO - First-In, First-Out) structure like needed in BFS, SplQueue is significantly better in terms of performance.

Detailed Explanation:

PHP Arrays (array_push/array_shift)

- How it works: You use array_push() to add an element to the end of the array (enqueue) and array_shift() to remove an element from the beginning of the array (dequeue).
- Performance Issue: While array_push() is generally efficient (amortized O(1)), array_shift() is the problem. When you remove the first element of a standard PHP array, all subsequent elements need to be shifted down one index (index 1 becomes 0, index 2 becomes 1, and so on). This re-indexing operation takes time proportional to the number of elements remaining in the array. Therefore, array_shift() has a time complexity of O(n), where n is the current size of the array.
- Impact on BFS: In BFS, you often enqueue many nodes and then dequeue them one by one. If the queue becomes large (which is common in BFS), repeatedly calling array_shift() (O(n) operation) can make your algorithm very slow, potentially leading to "Time Limit Exceeded" errors on platforms like LeetCode.

SplQueue

- How it works: SplQueue is part of the Standard PHP Library (SPL) and provides a class specifically designed for queue operations. It uses enqueue() to add to the end and dequeue() to remove from the front.
- Underlying Structure: Importantly, SplQueue extends SplDoublyLinkedList. A doubly linked list is a data structure where adding or removing elements from either the beginning or the end is very efficient.
- Performance Advantage: Because it uses a doubly linked list internally, both enqueue() (adding to the end) and dequeue() (removing from the front) operations have a time complexity of O(1). Removing the first element only requires updating a couple of pointers, not re-indexing the entire structure.
- Impact on BFS: Using SplQueue means both adding nodes to the queue and removing them for processing are constant-time operations, regardless of how large the queue gets. This leads to much better performance for BFS compared to the array approach.
   
## Uses

- **Breadth-first search** uses a queue to keep track of the nodes to visit next.
- **Web servers** use queues to manage requests—page requests get fulfilled in the order they're received.
- **Processes** wait in the CPU scheduler's queue for their turn to run.

https://www.interviewcake.com/concept/java/queue  


