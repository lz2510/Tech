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

