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
1. If need  to add ternimal to check if visited at the beginning of dfs?

No need to add ternimal as below like version 1

    if ($visited[$node] == true) {
        return;
    }

As already check the node is not visited before recursively call dfs. Although putting terminor at the beginning is more like a recursion.

    if ($visited[$val] == false) {
        $this->dfs($graph, $val, $visited, $result);
    }

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

## how to use set to store and judge visited

1. store node value 

below  time limit exceeded when n is 20000 in one test case. one reason is node itself is lenghies than bool or 1, 0. another reason is there's no removing duplication. the best way is to use a set to store which remove duplication in language level.

```
$visited[] = $from;
if (!in_array($val, $visited)) {}
```

2. store true or false, 1 or 0

```
$visited[$from] = true;
 if (!$visited[$val]) {}
```

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
2. for array result, should only by a reference variable
3. both above can use property in class, but it's not recommended as it's not clear for dfs function definition.
		
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
