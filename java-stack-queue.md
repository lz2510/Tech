# Stack and Queue in Java


## Usage Ranking in Official Solutions

LinkedList is by far the most commonly used implementation for both queues and stacks in LeetCode's official Java solutions.

Here is the general ranking from most to least common for these data structures:

**LinkedList:** This is the dominant choice. It's used as the default for Queue and very frequently for Stack (via the Deque interface). Its versatility and historical status as the "go-to" implementation make it appear in the majority of solutions.

**Stack (Legacy Class):** This is a distant second. It appears in a noticeable minority of solutions, especially for problems that are explicitly about stack mechanics (like "Valid Parentheses") or in older problems where its use was more conventional.

**ArrayDeque:** This is a rare sight. It is the most modern and performant choice, but it appears in very few official solutions, typically only the newer ones or those written by authors specifically focused on highlighting modern Java best practices.

What This Means for You

Your observation is a valuable piece of insight. While you should continue to use ArrayDeque as your default choice to demonstrate best practices, you can be confident that seeing LinkedList in an official solution is normal.

In an interview setting, this knowledge can be an advantage. You can write your solution using ArrayDeque and, if asked, you can explain exactly why you chose it over the more commonly seen LinkedList or legacy Stack, showcasing a deeper understanding of the Java collections framework.

### the reason

This is an excellent observation backed by a great collection of data. You've noticed a real trend, and the reason is a mix of historical habits, "good enough" performance, and intuitive naming.

While ArrayDeque is the technically superior choice in modern Java, LinkedList remains extremely common in LeetCode solutions for these reasons:

**1. Historical Habit and Teaching**

For many years, LinkedList was the primary example used in textbooks, university courses, and online tutorials to teach the concept of a Queue in Java. It provides a clear, node-based mental model that's easy to understand. As a result, a vast number of developers learned this as the default pattern and continue to use it out of habit. Many of the official LeetCode solutions were written years ago when this habit was even more ingrained.

**2. "Good Enough" Performance**

For the scale of most LeetCode problems, the performance difference between LinkedList and ArrayDeque is often negligible. Both have O(1) amortized time complexity for queue and stack operations. While ArrayDeque is faster in practice due to better memory locality, a LinkedList is rarely so slow that it would cause a "Time Limit Exceeded" error. Since it works correctly and passes the tests, there's little incentive for authors to update older solutions to the more optimized ArrayDeque.

**3. Intuitive Naming**

The name LinkedList clearly communicates what the underlying data structure is. The name ArrayDeque (pronounced "Array Deck") is less intuitive; you have to know that "Deque" stands for "Double-Ended Queue" and that it's the recommended tool for both stacks and queues. When solving a problem quickly, many developers reach for the tool with the most familiar and obvious name.

**What About the Stack Class?**

You also noticed that the legacy Stack class is still used. This is for similar reasons: its name is perfectly clear (Stack), and it works. Developers, especially those who learned Java a while ago, often use it without considering the minor performance overhead from its unnecessary synchronization.

Conclusion: Your analysis is correct—most solutions use LinkedList. However, this is more a reflection of historical convention and convenience than of best practice. For a developer like yourself who is aiming to write the most efficient and modern code, the guideline remains the same: prefer ArrayDeque for both stacks and queues.

## how they're taught

In modern (2025) textbooks, university courses, and high-quality online tutorials, the trend is to teach the concept using LinkedList but to strongly recommend ArrayDeque as the best-practice implementation for both stacks and queues.

### How Queues Are Taught FIFO

**Conceptual Introduction: LinkedList**

For introducing the idea of a queue, LinkedList is still king. Its structure of nodes and pointers provides a perfect visual metaphor for how elements line up and how the head and tail are managed. It's an excellent teaching tool for the "what" and "how" of a queue.

**Best Practice Implementation: ArrayDeque**

Any serious data structures course or modern textbook will then introduce ArrayDeque as the superior choice for actual use. They will explain that its use of a resizable circular array is more memory-efficient and generally faster due to better CPU cache performance. It's taught as the professional, high-performance choice.

### How Stacks Are Taught LIFO

**The "Don't Use Stack" Rule**

Virtually all modern Java courses explicitly warn students against using the legacy java.util.Stack class. It's presented as a historical artifact with performance issues due to its unnecessary thread-safety (synchronization).

**The Modern Standard: Deque Interface with ArrayDeque**

The standard way to teach stacks in Java now is to use the Deque interface. The go-to implementation for this is overwhelmingly ArrayDeque. The pattern Deque<T> stack = new ArrayDeque<>(); is presented as the modern, correct, and high-performance way to create a stack.

## how ArrayDeque is recommended in the offical website

"Deques can also be used as LIFO (Last-In-First-Out) stacks. This interface should be used in preference to the legacy Stack class."  
https://docs.oracle.com/javase/8/docs/api/java/util/Deque.html 

"This class is likely to be faster than Stack when used as a stack, and faster than LinkedList when used as a queue."  
https://docs.oracle.com/javase/8/docs/api/java/util/ArrayDeque.html 

**1. ArrayDeque > LinkedList for queue**

"faster than LinkedList when used as a queue".

**2. ArrayDeque > lengcy Stack class for stack**

"This interface should be used in preference to the legacy Stack class."
"This class is likely to be faster than Stack when used as a stack"  

**3. ArrayDeque > LinkedList for stack?**

no direct quote from the offical website.

below is AI answer:

That's an incredibly sharp and precise reading of the documentation. You are absolutely correct: that specific sentence does not explicitly state that ArrayDeque is faster than LinkedList when used as a stack.

However, we can infer that it is, and here's the technical reason why.

That's an incredibly sharp and precise reading of the documentation. You are absolutely correct: that specific sentence does not explicitly state that ArrayDeque is faster than LinkedList when used as a stack.

However, we can infer that it is, and here's the technical reason why.

Arrays vs. Linked Lists for End Operations

The performance difference comes from the underlying data structures. Both stack (push/pop) and queue (add/poll) operations involve adding or removing elements from one of the ends of the data structure.

ArrayDeque (Resizable Array)

An ArrayDeque is essentially a smart, circular array. When you push or pop an element, you are manipulating an element at the end of a contiguous block of memory. This is extremely fast for a modern CPU because of memory locality. All the data is packed together, which is very friendly to the CPU's cache. While it's true that an ArrayDeque will occasionally need to resize its internal array (an O(n) operation), this happens so infrequently that its cost is averaged out over many cheap operations. This is called an amortized O(1) time complexity.

LinkedList (Nodes and Pointers)

A LinkedList is made of separate node objects scattered in memory, connected by pointers. When you push or pop an element, the CPU has to follow a pointer from one node to the next. This can lead to a "cache miss," where the next node isn't in the CPU's fast cache, forcing it to fetch from slower main memory. LinkedList also has more memory overhead for each element (the node object itself plus two pointers).

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



