# BFS

![image](https://github.com/lz2510/TechInterview/assets/1209204/84f0f7df-3e5f-4eab-8bf3-b8547e357354)

Order in which the nodes are expanded

![Animated_BFS](https://github.com/lz2510/TechInterview/assets/1209204/9d7a6904-03c3-4f95-9c09-c693479e776a)

Animated example of a breadth-first search. Black: explored, grey: queued to be explored later on

When exploring, add children nodes to the queue immediately. but explore other brother nodes first which enqueue first. As queue is FIFO.

## Pseudocode

     1 procedure BFS(G, root) is
     2      let Q be a queue
     3      label root as explored
     4      Q.enqueue(root)
     5      while Q is not empty do
     6          v := Q.dequeue()
     7          if v is the goal then
     8              return v
     9          for all edges from v to w in G.adjacentEdges(v) do
    10              if w is not labeled as explored then
    11                  label w as explored
    12                  w.parent := v
    13                  Q.enqueue(w)

## php

    function BFS($root){
        $levels = 0;
        $queue = new SplQueue();
        $queue->enqueue($root);
    
        while(!$queue->isEmpty()){
            $count = $queue->count();
            for ($i = 0; $i < $count; $i++){
                $node = $queue->dequeue();
                if($node->left){
                    $queue->enqueue($node->left);
                }
                if($node->right){
                    $queue->enqueue($node->right);
                }
            }
    
            $levels++;
        }
    
        return $levels;
    }

## Python

<img width="650" alt="bfs" src="https://user-images.githubusercontent.com/1209204/209937599-3a49bc2a-3c29-4ca0-b8cc-0ac7117c57c2.png">

This non-recursive implementation is similar to the non-recursive implementation of depth-first search, but differs from it in two ways:
1. it uses a queue (First In First Out) instead of a stack and
2. it checks whether a vertex has been explored before enqueueing the vertex rather than delaying this check until the vertex is dequeued from the queue.

https://en.wikipedia.org/wiki/Breadth-first_search  
https://medium.com/@CleytonBonamigo/mastering-the-depth-understanding-and-calculating-the-maximum-depth-of-binary-trees-in-php-633a7ad5a053  

## leetcode

https://leetcode.com/problems/maximum-depth-of-binary-tree/  
