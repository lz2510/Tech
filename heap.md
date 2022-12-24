# Heap

The heap is one maximally efficient implementation of an abstract data type called a priority queue, and in fact, priority queues are often referred to as "heaps", regardless of how they may be implemented. 

In computer science, a heap is a specialized tree-based data structure which is essentially an almost complete[1] tree that satisfies the heap property: in a max heap, for any given node C, if P is a parent node of C, then the key (the value) of P is greater than or equal to the key of C. 

Binay heap is the common implementation.

For binary heap, search is O(1), insert and delete are O(logn)

|Operation|	find-max|	delete-max|	insert
|---|---|---|---
|Binary|	Θ(1)|	   Θ(log n)|	    O(log n)

https://en.wikipedia.org/wiki/Heap_(data_structure)#Comparison_of_theoretic_bounds_for_variants
