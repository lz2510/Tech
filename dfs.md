# DFS

## A recursive implementation of DFS

### Pseudocode
    procedure DFS(G, v) is
        label v as discovered
        for all directed edges from v to w that are in G.adjacentEdges(v) do
            if vertex w is not labeled as discovered then
                recursively call DFS(G, w)
  
### Python

<img width="852" alt="dfs" src="https://user-images.githubusercontent.com/1209204/209937706-c2b20f6b-5607-495a-84c2-d1a3a50c7a7e.png">

## A non-recursive implementation of DFS with the possibility of duplicate vertices on the stack

### Pseudocode

    procedure DFS_iterative(G, v) is
        let S be a stack
        S.push(v)
        while S is not empty do
            v = S.pop()
            if v is not labeled as discovered then
                label v as discovered
                for all edges from v to w in G.adjacentEdges(v) do 
                    S.push(w)

### php 

    function iteractiveDFS($root){
      $stack = [[$root, 1]];
      $result = 1;
      while(!empty($stack)){
          $last = end($stack);
          $node = $last[0];
          $depth = $last[1];
          array_pop($stack);
  
          if($node){
              $result = max($result, $depth);
              array_push($stack, [$node->left, $depth + 1]);
              array_push($stack, [$node->right, $depth + 1]);
          }
      }
  
      return $result;
  }
                    
The non-recursive implementation is similar to breadth-first search but differs from it in two ways:
1. it uses a stack instead of a queue, and
2. it delays checking whether a vertex has been discovered until the vertex is popped from the stack rather than making this check before adding the vertex.

https://en.wikipedia.org/wiki/Depth-first_search#Pseudocode  
https://medium.com/@CleytonBonamigo/mastering-the-depth-understanding-and-calculating-the-maximum-depth-of-binary-trees-in-php-633a7ad5a053  

## leetcode

https://leetcode.com/problems/maximum-depth-of-binary-tree/  
