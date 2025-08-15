# Stack and Queue in Java


## Usage Ranking in Official Solutions

LinkedList is by far the most commonly used implementation for both queues and stacks in LeetCode's official Java solutions.

Here is the general ranking from most to least common for these data structures:

**LinkedList:** This is the dominant choice. It's used as the default for Queue and very frequently for Stack (via the Deque interface). Its versatility and historical status as the "go-to" implementation make it appear in the majority of solutions.
**Stack (Legacy Class):** This is a distant second. It appears in a noticeable minority of solutions, especially for problems that are explicitly about stack mechanics (like "Valid Parentheses") or in older problems where its use was more conventional.
**ArrayDeque:** This is a rare sight. It is the most modern and performant choice, but it appears in very few official solutions, typically only the newer ones or those written by authors specifically focused on highlighting modern Java best practices.

The Reasons

**Historical Habit:** Many solutions were written when LinkedList was the standard taught method.
**"Good Enough" Performance:** LinkedList is fast enough to pass the time limits for most problems.
**Intuitive Naming:** The names LinkedList and Stack are more immediately obvious than ArrayDeque.

What This Means for You

Your observation is a valuable piece of insight. While you should continue to use ArrayDeque as your default choice to demonstrate best practices, you can be confident that seeing LinkedList in an official solution is normal.

In an interview setting, this knowledge can be an advantage. You can write your solution using ArrayDeque and, if asked, you can explain exactly why you chose it over the more commonly seen LinkedList or legacy Stack, showcasing a deeper understanding of the Java collections framework.


## data from leetcode offical solution

Queue<TreeNode> q = new LinkedList<>();

https://leetcode.com/problems/minimum-depth-of-binary-tree/editorial/


private Queue<SimpleEntry<TreeNode, Integer>> next_items =
        new LinkedList<>();

https://leetcode.com/problems/maximum-depth-of-binary-tree/editorial/


Queue<int[]> queue = new LinkedList<>();

https://leetcode.com/problems/all-nodes-distance-k-in-binary-tree/editorial/


Queue<Integer> neighbors = new LinkedList<>();

https://leetcode.com/problems/number-of-islands/editorial/


Queue<State> queue = new LinkedList<>();

https://leetcode.com/problems/01-matrix/editorial/?envType=problem-list-v2&envId=2gs77mrd

Queue<int[]> q = new LinkedList<>();

https://leetcode.com/problems/shortest-path-with-alternating-colors/editorial/

Deque<StepState> queue = new LinkedList<>();

https://leetcode.com/problems/shortest-path-in-a-grid-with-obstacles-elimination/editorial/

Queue<int[]> queue = new LinkedList<>();

https://leetcode.com/problems/nearest-exit-from-entrance-in-maze/editorial/


Queue<Integer> q = new LinkedList<>();

https://leetcode.com/problems/number-of-provinces/editorial/


Queue<Integer> q = new LinkedList<>();

https://leetcode.com/problems/reorder-routes-to-make-all-paths-lead-to-the-city-zero/editorial/


Queue<Integer> queue = new LinkedList<>();

https://leetcode.com/problems/find-if-path-exists-in-graph/editorial/


Queue<Integer> queue = new LinkedList<>(Arrays.asList(0));

https://leetcode.com/problems/reachable-nodes-with-restrictions/editorial/


List<Integer> queue = Arrays.asList(1, 2, 3, 4, 5, 6, 7, 8, 9);

https://leetcode.com/problems/numbers-with-same-consecutive-differences/editorial/


Queue<String> queue = new LinkedList<>(Arrays.asList(""));

https://leetcode.com/problems/generate-parentheses/editorial/


Queue<int[]> queue = new ArrayDeque<>();

https://leetcode.com/problems/shortest-path-in-binary-matrix/editorial/






private Deque<TreeNode> stack = new LinkedList();

https://leetcode.com/problems/validate-binary-search-tree/editorial/


LinkedList<TreeNode> stack = new LinkedList<>();

https://leetcode.com/problems/maximum-depth-of-binary-tree/editorial/


LinkedList<TreeNode> node_stack = new LinkedList();

https://leetcode.com/problems/path-sum/editorial/


Stack<Character> ans = new Stack();

https://leetcode.com/problems/backspace-string-compare/editorial/


Stack<Character> stack = new Stack<Character>();

https://leetcode.com/problems/valid-parentheses/editorial/


Stack<Integer> stack = new Stack();

https://leetcode.com/problems/keys-and-rooms/editorial/


Stack<Integer> stack = new Stack<>();

https://leetcode.com/problems/find-if-path-exists-in-graph/editorial/


Stack<int[]> stack = new Stack();

https://leetcode.com/problems/max-area-of-island/editorial/


Stack<Integer> stack = new Stack<>();

https://leetcode.com/problems/reachable-nodes-with-restrictions/editorial/


Stack<String> stack = new Stack<String>();

https://leetcode.com/problems/simplify-path/editorial/


Stack<Character> stack = new Stack<>();

https://leetcode.com/problems/make-the-string-great/editorial



