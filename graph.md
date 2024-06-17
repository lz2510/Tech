# Graph

Graph is a useful data structure for representing most of the real world problems involving a set of users/candidates/nodes and their relations. A Graph consists of two parameters :

```
V = a set of vertices
E = a set of edges
```

Each edge in `E` connects any two vertices from `V`. Based on the type of edge, graphs can be of two types:

1. **Directed**: The edges are directed in nature which means that when there is an edge from node `A` to `B`, it does not imply that there is an edge from `B` to `A`.
An example of directed edge graph the **follow** feature of social media. If you follow a celebrity, it doesn't imply that s/he follows you.

2. **Undirected**: The edges don't have any direction. So if `A` and `B` are connected, we can assume that there is edge from both `A` to `B` and `B` to `A`.
Example: Social media graph, where if two persons are friend, it implies that both are friend with each other.


## Representation

1.  **Adjacency Lists**: Each node is represented as an entry and all the edges are represented as a list emerging from the corresponding node. So if vertex `1` has eadges to 2,3, and 6, the list corresponding to 1 will have 2,3 and 6 as entries. Consider the following graph.

```
0: 1-->2-->3
1: 0-->2
2: 0-->1
3: 0-->4
4: 3
```
It means there are edges from 0 to 1, 2 and 3; from 1 to 0 and 2 and so on.

2. **Adjacency Matrix**: The graph is represented as a matrix of size `|V| x |V|` and an entry 1 in cell `(i,j)` implies that there is an edge from i to j. 0 represents no edge.
The mtrix for the above graph:

```
   0 1 2 3 4

0  0 1 1 1 0
1  1 0 1 0 0
2  1 1 0 0 0
3  1 0 0 0 1
4  0 0 0 1 0
```
## graph given in problems

1. a graph given as an adjacency list.

In Keys and Rooms prolbem, the graph is given as an adjacenty list.

Input: rooms = [[1],[2],[3],[]]
Input: rooms = [[1,3],[3,0,1],[2],[0]]

https://leetcode.com/problems/keys-and-rooms/description/

2. a graph given as an adjacency matrix.

In Number of Provinces problems, given as an adjacency matrix

Input: isConnected = [[1,1,0],[1,1,0],[0,0,1]]
Input: isConnected = [[1,0,0],[0,1,0],[0,0,1]]

https://leetcode.com/problems/number-of-provinces/description/
 
2-1 a graph in the form of a matrix.

In Number of Islands problem, a graph is in the form of a matrix. it's not adjacency matrix, but still a matrix. it's similiar to travse like adjacency matrix.

Input: grid = [
  ["1","1","1","1","0"],
  ["1","1","0","1","0"],
  ["1","1","0","0","0"],
  ["0","0","0","0","0"]
]

https://leetcode.com/problems/number-of-islands/editorial/
 
3. a graph given as an array of edges.

In Reorder Routes to Make All Paths Lead to the City Zero problem, it's given as an array of edges. So we have to build a graph first, usually by adjency list.

Input: n = 6, connections = [[0,1],[1,3],[2,3],[4,0],[4,5]]

https://leetcode.com/problems/reorder-routes-to-make-all-paths-lead-to-the-city-zero/description/


## code template dfs
<img width="690" alt="graph_dfs" src="https://user-images.githubusercontent.com/1209204/209646474-65b3f913-a009-40b5-a68d-58428af80e40.png">

## code template bfs
<img width="731" alt="graph_bfs" src="https://user-images.githubusercontent.com/1209204/209646529-14c7b0c2-8699-4125-9e89-c3da48986bcb.png">

https://github.com/TheAlgorithms/Java/tree/e96f567bfc6e980dc5c4c48ccf185d7f7c7108ab/src/main/java/com/thealgorithms/datastructures/graphs  

## implementation

[graph implementation](graph_implementation.md)
