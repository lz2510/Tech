# graph complexity

## How are graphs given in algorithm problems?

### 1. First input format: array of edges

it's given as an array of edges. So we have to build a graph first, usually by adjency list.

A. General Graph Case (input is an edge list, n nodes, E edges):

https://leetcode.com/problems/find-if-path-exists-in-graph/editorial/
https://leetcode.com/problems/number-of-connected-components-in-an-undirected-graph/description/

B. Tree Structure Case (input is an edge list for a tree, n nodes, so E = n-1):

https://leetcode.com/problems/reorder-routes-to-make-all-paths-lead-to-the-city-zero/description/  
https://leetcode.com/problems/reachable-nodes-with-restrictions/description/ 

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

## time and space complexity

Okay, let's provide a comprehensive comparison of the **time and auxiliary space complexities for both BFS and DFS** across the four scenarios you've outlined, including the special consideration for a tree structure when the input is an edge list.

Remember:
* **V** (or `n` in your notation for standard graphs) = number of vertices/nodes.
* **E** = number of edges.
* For an `m x n` grid, the number of nodes is `N = m * n`, and the number of edges is proportional to `N` (i.e., O(m*n)).
* **Auxiliary Space** refers to the space used by the algorithm itself, beyond the input graph representation (primarily for the queue/stack and visited tracker).

---

**1. Graph Represented by Adjacency Matrix (`n` nodes)**

* **BFS:**
    * **Time Complexity: O(n^2)**
        * *Reasoning:* Each of the `n` nodes is enqueued/dequeued once. For each node, finding its neighbors requires scanning an entire row of `n` elements in the matrix (O(n) work per node). Total: O(n * n) = O(n^2).
    * **Auxiliary Space Complexity: O(n)**
        * *Reasoning:* Queue can hold up to O(n) nodes. Visited array is O(n).
* **DFS:**
    * **Time Complexity: O(n^2)**
        * *Reasoning:* Similar to BFS, each of the `n` nodes is visited. Finding neighbors for each node requires scanning an O(n) matrix row. Total: O(n * n) = O(n^2).
    * **Auxiliary Space Complexity: O(n)**
        * *Reasoning:* Recursion stack (or explicit stack) can go up to O(n) deep in the worst case (e.g., a path graph). Visited array is O(n).

---

**2. Graph as an `m x n` Grid (Grid Graph)**
    Let `N = m * n` be the total number of cells/nodes.

* **BFS:**
    * **Time Complexity: O(m * n)**
        * *Reasoning:* Each of the `N` cells is enqueued/dequeued once. For each cell, checking its (at most 4) neighbors is an O(1) operation. Total: O(N) = O(m * n).
    * **Auxiliary Space Complexity: O(m * n)**
        * *Reasoning:* Queue can hold up to O(N) cells. Visited array (typically 2D `m x n`) is O(N). Total: O(m * n).
* **DFS:**
    * **Time Complexity: O(m * n)**
        * *Reasoning:* Each of the `N` cells is visited once. Checking neighbors is O(1) per cell. Total: O(N) = O(m * n).
    * **Auxiliary Space Complexity: O(m * n)**
        * *Reasoning:* Recursion stack can go up to O(N) deep in the worst case (e.g., a path snaking through the grid). Visited array is O(N). Total: O(m * n).

---

**3. Graph Represented by Adjacency List (`n` nodes, `E` edges)**

* **BFS:**
    * **Time Complexity: O(n + E)**
        * *Reasoning:* Each of the `n` nodes is enqueued/dequeued once (O(n)). Each edge is examined a constant number of times when neighbors are explored (total O(E)).
    * **Auxiliary Space Complexity: O(n)**
        * *Reasoning:* Queue up to O(n) nodes. Visited array O(n).
* **DFS:**
    * **Time Complexity: O(n + E)**
        * *Reasoning:* Each of the `n` nodes is visited once. Each edge is traversed a constant number of times.
    * **Auxiliary Space Complexity: O(n)**
        * *Reasoning:* Stack up to O(n) deep. Visited array O(n).

---

**4. Graph Input as an Edge List (`n` nodes, `E` edges initially)**

This scenario requires a pre-processing step to build a more usable graph structure, typically an adjacency list. The complexities below reflect the *entire solution process* (building the adjacency list + running the traversal).

* **Pre-processing: Building Adjacency List**
    * Time to build: O(n + E)
    * Space for Adjacency List itself: O(n + E)

* **A. General Graph Case (input is an edge list, `n` nodes, `E` edges):**
    * **BFS:**
        * **Overall Time Complexity: O(n + E)** (O(n+E) to build list + O(n+E) for BFS traversal).
        * **Overall Space Complexity (for solution): O(n + E)** (O(n+E) for the built adjacency list + O(n) auxiliary for BFS queue/visited).
    * **DFS:**
        * **Overall Time Complexity: O(n + E)** (O(n+E) to build list + O(n+E) for DFS traversal).
        * **Overall Space Complexity (for solution): O(n + E)** (O(n+E) for the built adjacency list + O(n) auxiliary for DFS stack/visited).

* **B. Tree Structure Case (input is an edge list for a tree, `n` nodes, so `E = n-1`):**
    * **Pre-processing: Building Adjacency List for a Tree**
        * Time to build: O(n + (n-1)) = **O(n)**.
        * Space for Adjacency List itself: O(n + (n-1)) = **O(n)**.
    * **BFS:**
        * **Overall Time Complexity: O(n)** (O(n) to build list + O(n + (n-1)) for BFS traversal on a tree).
        * **Overall Space Complexity (for solution): O(n)** (O(n) for the built adjacency list + O(n) auxiliary for BFS queue/visited).
    * **DFS:**
        * **Overall Time Complexity: O(n)** (O(n) to build list + O(n + (n-1)) for DFS traversal on a tree).
        * **Overall Space Complexity (for solution): O(n)** (O(n) for the built adjacency list + O(n) auxiliary for DFS stack/visited).

---

**Summary Table:**

| Graph Scenario                                  | BFS Time      | BFS Aux. Space | DFS Time      | DFS Aux. Space |
| :---------------------------------------------- | :------------ | :------------- | :------------ | :------------- |
| **1. Adjacency Matrix (`n` nodes)** | O(n^2)        | O(n)           | O(n^2)        | O(n)           |
| **2. Grid Graph (`m x n` nodes)** | O(m * n)      | O(m * n)       | O(m * n)      | O(m * n)       |
| **3. Adjacency List (`n` nodes, `E` edges)** | O(n + E)      | O(n)           | O(n + E)      | O(n)           |
| **4. Edge List Input (General Graph, `n` nodes, `E` edges)** (Time/Space for full solution: build adj. list + traverse) | O(n + E) | O(n + E)       | O(n + E) | O(n + E)       |
| **5. Edge List Input (Tree, `n` nodes)** (Time/Space for full solution: build adj. list + traverse) | O(n)          | O(n)           | O(n)          | O(n)           |

This table distinguishes between the auxiliary space for the traversal algorithm itself and, for the "Edge List Input" scenarios, the overall space complexity of a solution that includes building the adjacency list.
