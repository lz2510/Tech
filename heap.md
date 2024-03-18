# Heap

The heap is one maximally efficient implementation of an abstract data type called a priority queue, and in fact, priority queues are often referred to as "heaps", regardless of how they may be implemented. 

In computer science, a heap is a specialized tree-based data structure which is essentially an almost complete[1] tree that satisfies the heap property: in a max heap, for any given node C, if P is a parent node of C, then the key (the value) of P is greater than or equal to the key of C. 

Binay heap is the common implementation.

For binary heap, search is O(1), insert and delete are O(logn)

|Operation|	find-max|	delete-max|	insert
|---|---|---|---
|Binary|	Θ(1)|	   Θ(log n)|	    O(log n)

<p>A Heap is a special Tree-based data structure in which the tree is a complete binary tree.

## <h2>Complete Binary Tree</h2>
<p>A complete binary tree is a binary tree
in which all the levels except the last level, i.e., leaf node should be completely filled, and all the nodes should be left-justified.</p>


```
                            10
                          /    \
                        20      30
                       /  \    
                      40   50
                      
                    COMPLETE BINARY TREE
```


## <h2>Types of Heap</h2>
<p>Generally, Heaps can be of two types:
<br>
<strong>Max-Heap:</strong> In a Max-Heap the key present at the root node must be greatest among the keys present at all of it’s children. The same property must be recursively true for all sub-trees in that Binary Tree.
<br>
<strong>Min-Heap:</strong> In a Min-Heap the key present at the root node must be minimum among the keys present at all of it’s children. The same property must be recursively true for all sub-trees in that Binary Tree.
</p>



```
                            10
                          /    \
                        20      30
                       /  \    /  \
                      40  50  60  70
                      
                          MIN HEAP
```

```
                            70
                          /    \
                        50      60
                       /  \    /  \
                      40  30  10   20
                      
                          MAX HEAP
```

## <h2>Min Heap Construction Algorithm</h2>
```
Step 1 − Create a new node at the end of heap.
Step 2 − Assign new value to the node.
Step 3 − Compare the value of this child node with its parent.
Step 4 − If value of parent is more than child, then swap them.
Step 5 − Repeat step 3 & 4 until Heap property holds.
```

```
Add 15

                            10                         10                     10
                          /    \                     /   \                  /    \
                        20      30    ------>      20     30   ------>     20     15
                       /  \                       /  \   /                /  \    /  
                      40  50                    40   50  15              40  50  30
                                          
                                          
```

## <h2>Min Heap Deletion Algorithm</h2>
```
Step 1 − Remove root node.
Step 2 − Move the last element of last level to root.
Step 3 − Compare the value of this child node with its parent.
Step 4 − If value of parent is more than child, then swap them.
Step 5 − Repeat step 3 & 4 until Heap property holds.
```

```
Delete 10

                            10                        50                     20                   20
                          /    \                     /   \                  /   \                /  \
                        20      30    ------>      20     30   ------>     50    30   ------>   40   30
                       /  \                       /                       /                    /
                      40  50                    40                       40                   50
                                          
                                          
```

## <h2>Applications of Heap Data Structure</h2>

<p>
<strong>Heapsort:</strong> Heapsort algorithm has limited uses because Quicksort is better in practice. Nevertheless, the Heap data structure itself is enormously used.

<strong>Priority Queues:</strong> Priority queues can be efficiently implemented using Binary Heap because it supports insert(), delete() and extractmax(), decreaseKey() operations in O(logn) time. Binomoial Heap and Fibonacci Heap are variations of Binary Heap. These variations perform union also in O(logn) time which is a O(n) operation in Binary Heap. Heap Implemented priority queues are used in Graph algorithms like Prim’s Algorithm and Dijkstra’s algorithm.

<strong>Order statistics:</strong> The Heap data structure can be used to efficiently find the kth smallest (or largest) element in an array.
</p>

https://en.wikipedia.org/wiki/Heap_(data_structure)#Comparison_of_theoretic_bounds_for_variants  
https://github.com/TheAlgorithms/Java/tree/e96f567bfc6e980dc5c4c48ccf185d7f7c7108ab/src/main/java/com/thealgorithms/datastructures/heaps  

## top K

### approaches

sort: N log N  
heap: N log K  
quick sort  

heap is faster than sort, NlogK < NlogN when K < N

### count frequent

#### approach 1 is to use built-in array_count_values

#### approach 2 is to use array

    $freqs = []; 
    foreach ($nums as $num) { 
        $freqs[$num] = isset($freqs[$num]) ? $freqs[$num] +1 : 1; 
    } 

### if only keep num $k elements, value must be $n - $req, or it will pop up the first max
            
    $queue->insert($num, $n - $req);
    if ($queue->count() > $k) {
        $queue->extract();
    }
            
### as only keep num $k elements, all elements in a queue is valid
        while (!$queue->isEmpty()) {
            $res[] = $queue->extract();    
        }
        
### result

for [1,1,1,2,2,3] the result is [2, 1], the expected is [1, 2]. 

As value is $n - $req. It's same as this question don't check the order of elements, but not the best. 

the best should still be store $req as value.
