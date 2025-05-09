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
The matrix for the above graph:

```
   0 1 2 3 4

0  0 1 1 1 0
1  1 0 1 0 0
2  1 1 0 0 0
3  1 0 0 0 1
4  0 0 0 1 0
```

### processing

Although graphs can be represented as a matrix. But when the input format is adjacency matrix and we want to travese the graph, we have two options. 

Option 1: During the traversal, at any given node you can iterate over graph[node], and if graph[node][i] == 1, then you know that node i is a neighbor. 

Option 2: Alternatively, you can pre-process the graph as we did with an array of edges. Build a hash map and then iterate over the entire graph. If graph[i][j] == 1, then put j in the list associated with graph[i]. This way, when performing the traversal, you will not need to iterate n times at every node to find the neighbors. This is especially useful when nodes have only a few neighbors and n is large.

The option 2 pre-processing the matrix to adjency list is better.

## How are graphs given in algorithm problems?

### 1. First input format: array of edges

In Reorder Routes to Make All Paths Lead to the City Zero problem, it's given as an array of edges. So we have to build a graph first, usually by adjency list.

Input: n = 6, connections = [[0,1],[1,3],[2,3],[4,0],[4,5]]

https://leetcode.com/problems/reorder-routes-to-make-all-paths-lead-to-the-city-zero/description/

Before starting the traversal, we can pre-process the input so that we can easily find all neighbors of any given node. Ideally, you want a data structure where you can give node as an argument and be returned a list of neighbors. The easiest way to accomplish this is using a hash map.

### 2. Second input format: adjacency list

In Keys and Rooms prolbem, the graph is given as an adjacenty list.

Input: rooms = [[1],[2],[3],[]]
Input: rooms = [[1,3],[3,0,1],[2],[0]]

https://leetcode.com/problems/keys-and-rooms/description/

Notice that with this input, we can already access all the neighbors of any given node. We don't need to do any pre-processing! This makes an adjacency list the most convenient format.

### 3. Third input format: adjacency matrix

In Number of Provinces problems, given as an adjacency matrix

Input: isConnected = [[1,1,0],[1,1,0],[0,0,1]]
Input: isConnected = [[1,0,0],[0,1,0],[0,0,1]]

https://leetcode.com/problems/number-of-provinces/description/

When given this format, you have two options. 

Option 1: During the traversal, at any given node you can iterate over graph[node], and if graph[node][i] == 1, then you know that node i is a neighbor. 

Option 2: Alternatively, you can pre-process the graph as we did with an array of edges. Build a hash map and then iterate over the entire graph. If graph[i][j] == 1, then put j in the list associated with graph[i]. This way, when performing the traversal, you will not need to iterate n times at every node to find the neighbors. This is especially useful when nodes have only a few neighbors and n is large.

Both of these approaches will have a time complexity of O(n^2).
 
### 4. Last input format: matrix

In Number of Islands problem, a graph is in the form of a matrix. it's not adjacency matrix, but still a matrix. it's similiar to travse like adjacency matrix.

Input: grid = [
  ["1","1","1","1","0"],
  ["1","1","0","1","0"],
  ["1","1","0","0","0"],
  ["0","0","0","0","0"]
]

https://leetcode.com/problems/number-of-islands/editorial/

reference:

https://leetcode.com/explore/interview/card/leetcodes-interview-crash-course-data-structures-and-algorithms/707/traversals-trees-graphs/4721/

## graph problems

1. numbers of connected nodes

Number of Provinces  
Number of Islands  
Number of Connected Components in an Undirected Graph  

In the original function, iterate the graph. Then increase the number of result under the condition if the node is visited or not. Because every visited node will be marked as visited in dfs function. For visited, there're two ways.

first. A new array contained node. It's used for adjacency list or can be built as adjacency list.
second. Mark original matrix as 0.

1.1. area of connected nodes

Max Area of Island

The difference from numbers of connected nodes is that it needs to track the size of connected nodes inside. The dfs function can return 0 or 1 to calculate.

2. find path

Reorder Routes to Make All Paths Lead to the City Zero  
Keys and Rooms  
Find if Path Exists in Graph  
Reachable Nodes With Restrictions  

The start node or maybe end node is specified. So there's no need to iteratively call dfs in the original function. Like in "Find if Path Exists in Graph", the source and destination is specified. In "Reachable Nodes With Restrictions", the start node 0 is specified, as well as adding restrictions. 

In "Keys and Rooms", the start node is also node 0. Checking if can reach all the rooms means check the reachable node num is equals the rooms num.

In "Reorder Routes to Make All Paths Lead to the City Zero", seems that the destination node is city zero, can be reversed to start node is city zero in the context. the result is to sum all the path.

## how to check boundary

Method 1: isset($grid[$newRow][$newCol]) && $grid[$newRow][$newCol] === 0
Method 2: $newRow >= 0 && $newRow < $m && $newCol >= 0 && $newCol < $n && $grid[$newRow][$newCol] === 0

interviewer may not a php expert, so the Method 2 give more readability. it's better. as isset is PHP-specific.

Both the isset method and the explicit boundary check method are valid ways to achieve the goal of safely accessing grid elements in PHP. Neither is universally "better" – the best choice depends on the specific context and your priorities (like readability, conciseness, or performance, although performance differences are often minor here).

Let's break down the pros and cons:

Method 1: isset($grid[$newRow][$newCol]) && $grid[$newRow][$newCol] === 0

Pros:
Conciseness: It's shorter and combines the existence/boundary check into a single isset call for the specific cell.
Idiomatic PHP: Using isset to check for array key existence before accessing it is a very common and standard practice in PHP. PHP developers will immediately understand its purpose.
No Need for Dimensions: You don't explicitly need separate variables ($m, $n) holding the grid dimensions just for this check (though you often have them for other reasons). isset works directly with the array structure.

Cons:
Slightly Less Explicit: While common in PHP, a developer less familiar with PHP might not immediately realize isset is being used here for boundary checking. The explicit checks make the boundary logic crystal clear.

Method 2: $newRow >= 0 && $newRow < $m && $newCol >= 0 && $newCol < $n && $grid[$newRow][$newCol] === 0

Pros:
Explicitness / Readability: It's extremely clear exactly what boundary conditions are being tested (>= 0, < $m, < $n). This can improve readability, especially for complex conditions or for developers less familiar with PHP idioms.
Portability: This logic translates almost directly to other programming languages (Java, C++, Python, etc.), whereas isset is PHP-specific.

Cons:
Verbosity: It requires writing out all four boundary comparisons, making the code longer.
Requires Dimensions: You must have the grid dimensions ($m - number of rows, $n - number of columns) available as variables.
Performance Comparison:

In most practical scenarios, especially within the context of algorithms like BFS/DFS where other operations often dominate the runtime, the performance difference between these two methods is likely negligible.
isset is generally highly optimized in PHP.
The explicit method involves simple integer comparisons which are also very fast.
It's generally not worth optimizing based on the perceived micro-performance difference between these two approaches unless you have profiled your specific code and found this check to be a significant bottleneck (which is unlikely).

Conclusion / Recommendation:

For typical PHP development and LeetCode PHP solutions: The isset method is often preferred due to its conciseness and idiomatic nature in PHP. It's perfectly safe and efficient.

If maximum clarity for developers unfamiliar with PHP idioms or easier portability to other languages is a priority: The explicit boundary check method is a fine choice. It leaves no ambiguity about the boundary conditions.

Ultimately, both achieve the same correct result safely. Choose the one that aligns better with your coding style or the specific requirements of your project. For LeetCode in PHP, you'll commonly see the isset approach used.

## code template bfs
<img width="731" alt="graph_bfs" src="https://user-images.githubusercontent.com/1209204/209646529-14c7b0c2-8699-4125-9e89-c3da48986bcb.png">

https://github.com/TheAlgorithms/Java/tree/e96f567bfc6e980dc5c4c48ccf185d7f7c7108ab/src/main/java/com/thealgorithms/datastructures/graphs  

## implementation

[graph implementation](graph_implementation.md)

## time and space complexity
[time and space complexity](graph_complexity.md)
