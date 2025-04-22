# Graph implementation

## DFS 

### Pseudocode 

    DFS(G, v) is
        label v as discovered
        for all directed edges from v to w that are in G.adjacentEdges(v) do
            if vertex w is not labeled as discovered then
                recursively call DFS(G, w)

https://en.wikipedia.org/wiki/Depth-first_search#Pseudocode

### code template

#### final version

    function dfs(array $graph, int $node, array &$visited, int &$result): void
    {        
        $visited[$node] = true;
        foreach ($graph[$node] as $neighbor) {
            if ($visited[$neighbor] == false) {
                $this->dfs($graph, $neighbor, $visited, $result);
            }           
        }
    }

explanation:
1. If need  to add terminator to check if visited at the beginning of dfs?

No need to add terminator as below like below version 1. Remeber in version 1 the teacher explained that putting terminor at the beginning is more like a recursion. Although he also puts the check before recursively call dfs. It means there're 2 checks, a little duplications.

    if ($visited[$node] == true) {
        return;
    }

As already check the node is not visited before recursively call dfs. 

    if ($visited[$val] == false) {
        $this->dfs($graph, $val, $visited, $result);
    }

In conclusion, only check before recursively calling dfs is more like the Pseudocode from wikipedia.

2. $variable naming

use $node to name the current node

    function dfs(array $graph, int $node, array &$visited, int &$result)

use $neighbor to name one of all neighbors of the current node

    foreach ($graph[$node] as $neighbor)

#### version 1

<img width="690" alt="graph_dfs" src="https://user-images.githubusercontent.com/1209204/209646474-65b3f913-a009-40b5-a68d-58428af80e40.png">

#### version 2
    Set<Integer> seen = new HashSet<>();
    
    public int fn(int[][] graph) {
        seen.add(START_NODE);
        return dfs(START_NODE, graph);
    }
    
    public int dfs(int node, int[][] graph) {
        int ans = 0;
        // do some logic
        for (int neighbor: graph[node]) {
            if (!seen.contains(neighbor)) {
                seen.add(neighbor);
                ans += dfs(neighbor, graph);
            }
        }
    
        return ans;
    }

https://leetcode.com/explore/interview/card/cheatsheets/720/resources/4723/

## why need a visited

graphs may contain cycles (a node may be visited twice). To avoid processing a node more than once, use a boolean visited array.

A standard DFS implementation puts each vertex of the graph into one of two categories:

Visited
Not Visited

The purpose of the algorithm is to mark each vertex as visited while avoiding cycles.

https://www.geeksforgeeks.org/depth-first-search-or-dfs-for-a-graph/  
https://www.programiz.com/dsa/graph-dfs  

## how to choose the start node to call dfs in original function

1. if there's a source node from parameter, choose the source node. like Find if Path Exists in Graph
2. if there's no a souce node from parameter, iterate `$n` from 0 to n-1. like Number of Connected Components in an Undirected Graph
3. don't iterate graph directly from parameter or built from edges

https://leetcode.com/problems/find-if-path-exists-in-graph/  
https://leetcode.com/problems/number-of-connected-components-in-an-undirected-graph/description/  

## use which variable when building graph

1. `$graph` is more general.
2. `$adjList` is more specific for implemention.

## how to store and judge visited

### guideline

Yes, that's a very reasonable and practical guideline! Here's a slightly more detailed breakdown:

**Generally, it's a good starting point to consider using a boolean array for tracking visited states in graph algorithms, especially when:**

* **State Indices are Integers:** The nodes or states in your graph are naturally represented by non-negative integers (common in many graph problems, often numbered from 0 to n-1).
* **The Range of Indices is Known and Manageable:** You have an idea of the upper bound of your state indices, and creating a boolean array of that size won't consume an excessive amount of memory. This is often the case when the number of vertices in the graph is within a reasonable limit.
* **Ease of Implementation and Speed:** Accessing elements in a boolean array using an integer index is very fast (O(1)), and it's often straightforward to implement.

**Switch to an Associative Array (or a Hash Set equivalent in your language) when:**

* **State Indices are Large and Sparse:** If your graph has vertices with very large indices, but the actual number of vertices or the number of visited vertices is much smaller, a boolean array sized to accommodate the maximum possible index would waste a lot of memory. In this case, an associative array (which only stores the visited states) is much more memory-efficient.
* **States are Not Integers:** If your states or vertices are represented by data types other than non-negative integers (e.g., strings, objects, or negative integers), you cannot directly use them as indices in a standard boolean array. An associative array, which can handle various key types, is necessary here.

**Influence of Graph Representation (Matrix vs. Adjacency List):**

* **Adjacency Matrix:** When using an adjacency matrix where vertices are naturally indexed from 0 to n-1, a boolean array of size n aligns perfectly for tracking visited status.
* **Adjacency List:** Similarly, even if you use an adjacency list, the vertices are usually still identified by indices (0 to n-1), making a boolean array an efficient choice for tracking visited status.

**In summary, your proposed strategy is sound:**

1.  **Start with a boolean array** if your states are non-negative integers within a known and manageable range. This often offers simplicity and good performance.
2.  **Switch to an associative array** if the range of integer indices is very large and sparse (to save memory) or if your states are not conveniently representable as non-negative integers.

This approach allows you to leverage the efficiency of a direct array access when possible and the flexibility of a hash-based structure when needed. Just remember to consider the trade-offs between potential slight performance gains with a boolean array (for dense, integer-indexed graphs) and the memory efficiency of an associative array (for sparse or non-integer indexed graphs).

### adjacency list

For represented using adjacency lists or adjacency matrices where vertices are typically identified by a single index (0 to V-1)

#### boolean array

below initialize array with a fixed size. a traditional way to use array. recommended.
```
$visited = array_fill(0, $numNodes, false);
if (!$visited[$from]) {
	$visited[$from] = true;
}
```

below don't initialize array so need check if isset. not a traditional array as array is a fixed size. only work in php without specifying size. as array in php can also be a associate array. worked but not recommended.
```
$visited = [];
if (!isset($visited[$from])) {
	$visited[$from] = true;
}
```

#### hash set

```
$visited = [];
if (!array_key_exists($from, $visited)) {
	$visited[$from] = true;
}
```

**do not store node value directly**

below  time limit exceeded when n is 20000 in one test case. one reason is node itself is lenghies than bool or 1, 0. another reason is there's no removing duplication. the best way is to use a set to store which remove duplication in language level.

```
$visited[] = $from;
if (!in_array($val, $visited)) {}
```



### matrix

Yes, in the specific context of a 2D matrix (with rows and columns), a **2D boolean array is generally better than a 1D associative array for storing visited states, especially because the key for the associative array can be less intuitive and more cumbersome to define.**

You've hit on a key point! Here's a breakdown of why:

**2D Boolean Array:**

* **Natural Key:** The row and column indices `(row, col)` directly correspond to the indices of the 2D boolean array `visited[row][col]`. This is a very natural and direct mapping to the structure of the matrix.
* **Ease of Implementation:** Marking a cell as visited is as simple as `visited[row][col] = true`. Checking if a cell is visited is equally straightforward: `if (visited[row][col])`.
* **Readability:** The code is very clear and directly reflects the 2D nature of the problem.
* **Performance:** Accessing elements in a 2D array is typically very fast (O(1)).

**1D Associative Array:**

* **Key Definition Challenge:** As you pointed out, you need to come up with a way to represent the 2D coordinates `(row, col)` as a single key for the associative array. Common methods include:
    * **String Concatenation:** Creating a string like `"row,col"` (e.g., `"2,3"`). This involves string operations which can have some overhead.
    * **Single Integer Encoding:** If you know the number of columns (let's say `num_cols`), you can encode the coordinates as a single integer: `key = row * num_cols + col`. This works but requires you to know `num_cols` and can be less intuitive to read in the code.
    * **Using an Object/Tuple as Key (less common in PHP):** While other languages might support tuples directly as hash keys, PHP's array keys are primarily strings and integers. You could use an object as a key, but this adds complexity.

* **Ease of Implementation:** While possible, converting the 2D coordinates to a 1D key adds an extra step in your code for every access.
* **Readability:** Code that uses a converted 1D key to represent 2D coordinates can be less immediately clear compared to the direct `[row][col]` access.
* **Performance:** While hash map lookups in an associative array are generally O(1) on average, the extra step of key creation (especially string concatenation) might introduce a slight overhead compared to direct 2D array access.

**In Conclusion for Matrices:**

For problems involving a 2D matrix, a **2D boolean array is almost always the better choice for tracking visited states due to the inherent 2D structure of the problem.** It offers a more natural, readable, and often slightly more performant way to manage the visited status of each cell compared to the extra steps required to use a 1D associative array.

The main benefit of an associative array is when your "states" or "nodes" don't fit neatly into a contiguous integer range or have a more complex structure, which is less common in typical matrix traversal problems.

```
$visitedMatrix = array_fill(0, $numNodes, []);
for ($i = 0; $i < $numNodes; $i++) {
    $visitedMatrix[$i] = array_fill(0, $numNodes, false);
}
if (!$visited[$i][$j]) {
	$visited[$i][$j] = true;
}
```
      
if use hash set, need generate a new key which is not good.

```
$visited[$i . '-' . $j] = true
if (!array_key_exists($i . '-' . $j, $visited)) {             
  $visited[$i . '-' . $j] = true;
}
```                   

3. in java, there're three ways.

3.1 use set

	Set<Integer> visited = new HashSet<>();
	if (visited.add(i)) {
	dfsVisit(i, map, visited);
	}
 
3.2 use array of int
 https://leetcode.com/problems/number-of-connected-components-in-an-undirected-graph/solutions/77578/java-concise-dfs/

	 int[] visited = new int[n];
	 visited[startNode] = 1;
	 if (visited[i] == 0) {
	 	dfs(adjList, visited, i);
	 }

  https://leetcode.com/problems/number-of-connected-components-in-an-undirected-graph/editorial/

3.3 use array of bool

	  boolean[] seen = new boolean[n];
	  seen[currNode] = true;
	  if (!seen[currNode]) {
		dfs(graph, seen, nextNode, destination)
	  }

   https://leetcode.com/problems/find-if-path-exists-in-graph/editorial/

## why need build a graph

For the graph templates, assume the nodes are numbered from 0 to n - 1 and the graph is given as an adjacency list. Depending on the problem, you may need to convert the input into an equivalent adjacency list before using the templates.

## build a graph for bi-direction graph or undirected graph

as it's bi-direction, so $graph[$from][] = $to; and $graph[$to][] = $from; both are needed. the same if it's undirected graph

	foreach ($edges as $val) {
            list($from, $to) = $val;
            $graph[$from][] = $to;
            $graph[$to][] = $from;
		}
		
## how to store the result, directly by return or use a reference variable

1. for bool result, can directly return result. or count number result, can also directly return.
   return true or false
https://leetcode.com/problems/find-if-path-exists-in-graph/editorial/

return 1 or 0
   https://leetcode.com/problems/number-of-connected-components-in-an-undirected-graph/solutions/516491/java-union-find-dfs-bfs-solutions-complexity-explain-clean-code/
3. for array result, should only by a reference variable
4. both above can use property in class, but it's not recommended as it's not clear for dfs function definition.

In conclusion, the best is to use a reference variable for bool, count number or array. Because the dfs function will be close to the code template.
		
## should I create a new function to build a graph as adjency list

it's no necessary to create a new function as it doesn't need big lines.

```
private function buildAdjList($edges) { $result = [];
			foreach($edges as $edge){
					if(!isset($edge[0],$result)){
							$result[$edge[0]] = [];
					}

				if(!isset($edge[1],$result)){
						$result[$edge[1]] = [];
				}

				$result[$edge[0]][] = $edge[1];
				$result[$edge[1]][] = $edge[0]; 
		}
		return $result;
}
```

https://leetcode.com/problems/find-if-path-exists-in-graph/solutions/3128404/php-dfs-solution/

## where to calulate result like compare max area, or numbes of islands

it's outside of dfs. as it's different to determine whether a chain of node end. 

how to detemine a chain of node end? use if (`$`grid[$row][$col] == 1){} as inside dfs marked the node and it's neighbors as visited. so in outside of dfs, check the cell value is 1 means a new chain of node start.

so in Max Area of Island is as below. 

```
foreach ($grid as $row => $rowVals) {
		foreach ($rowVals as $col => $colVals) {
				if ($grid[$row][$col] == 1) {
$max = max($max, $this->dfs($grid, $row, $col));
				}               
		}
}
```

although if (`$`grid[$row][$col] == 1){} can be removed as the terminal condtions contain check that if `$`grid[$row][$col] is zero, will return. but it's more understandable to put if (`$`grid[$row][$col] == 1){} out there.

like  Number of Islands 
check if (`$`grid[$i][$j] == 1) to plus one as it means a new chain of nodes start.
```
for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($grid[$i][$j] == 1) {
                    $result++;
                    $this->dfs($i, $j, $grid);
                }               
            }
        }				
```	

and Number of Provinces.
	
	```
if (!in_array($i, $visited)) {
                $nums++;
                $result = $this->dfs($isConnected, $i, $nums, $visited);
            }	
```				

https://leetcode.com/problems/max-area-of-island/description/
https://leetcode.com/problems/number-of-islands/description/?envType=problem-list-v2&envId=mns2un7j
https://leetcode.com/problems/number-of-provinces/description/?envType=problem-list-v2&envId=mns2un7j

