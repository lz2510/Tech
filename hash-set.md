# Hash Set

## set

A set is like a hash map except it only stores keys, without values.

### implementiion in php

1. associated array(hash map)

Associated Array (Keys as Elements). 

        $visited = []
        if (!isset($visited[$currentNode])) {
            $visited[$currentNode] = true;
        }

can i use if ($visited[$currentNode]===true) to check? which approach is it? associated array or boolean array?

This approach is most directly related to the boolean array approach.

Here's why:

- /**Boolean Array:**/ In the boolean array method, $visited is an array where each index (corresponding to a node ID) holds a boolean value (true or false). Setting $visited[$currentNode] = true; explicitly marks the node as visited with a boolean true value. Therefore, checking if ($visited[$currentNode] === true) directly verifies if that boolean value is indeed true.

-- /**Associative Array:**/ While you did set $visited[$currentNode] = true; in the associative array approach as well, the primary way to check if a node has been visited using an associative array as a set is by checking for the existence of the key using isset($visited[$currentNode]) or array_key_exists($currentNode, $visited).  The value associated with the key (true in this case) is more of a marker for the key's presence.
Using if ($visited[$currentNode] === true) with the associative array approach would still technically work in your specific example because you are consistently setting the value to true. However, it's not the most idiomatic or robust way to check for the presence of a key in an associative array. If, for some reason, the value was accidentally set to something else truthy (e.g., 1), the strict comparison (===) would fail, even though the node was technically "visited" (i.e., its ID is in the $visited array).

For clarity and to follow common conventions, I'd recommend sticking to:
Boolean Array: if ($visited[$currentNode]) (or if (!$visited[$currentNode]) for unvisited).
Associative Array: if (isset($visited[$currentNode])) (or if (!isset($visited[$currentNode])).

2. boolean array

Boolean Array (Index as Element)

        $visited = array_fill(0, $numNodes, false); // Initialize a boolean array of size numNodes with all false
        if (!$visited[$currentNode]) {
            $visited[$currentNode] = true;
        }

Limitations of using a boolean array for a general hash set:
-- /**Only works for non-negative integers:**/ As the elements are used as array indics. You cannot directly store strings, floats, or negative integers using this method.
-- /**Memory usage:**/ Need to initilze all the array values to false first. If the range of possible integer values is very large, you will need a very large boolean array, which can consume a lot of memory, even if you are only storing a few elements. For example, if you wanted to store the integer 1000000, you would need an array with at least 1,000,001 elements.
-- /**Not suitable for sparse data:**/ If you have a set with a few very large integers and many gaps in between, the boolean array will still allocate memory for all the numbers in between, leading to inefficient memory usage.

why should i initialize boolen array and set all to false which allocate memory first? why can't i set value only when needed?

In the context of implementing a set using a boolean array, initializing to false is generally the recommended practice for these reasons:
-- /**Clarity:**/ It explicitly shows that all possible integer values within the range are initially considered not in the set.
-- /**Correctness:**/ It avoids relying on PHP's default behavior for undefined array keys, which can sometimes be surprising.
-- /**Maintainability:**/ It makes the code easier to read and understand for others (and your future self).

3. numerial array

You're suggesting using a simple numerical array $visited[] = $currentNode; to add elements and in_array($currentNode, $visited) to check for their existence. While this approach can technically work to track visited nodes, it's generally not the most efficient way to implement a set, especially for performance-sensitive tasks like graph traversal on LeetCode.

Here's why:

Time Complexity for Checking Existence: The in_array() function in PHP performs a linear search through the array. This means that in the worst-case scenario, to check if an element is already in the $visited array, PHP might have to iterate through all the elements currently in the array. This results in a time complexity of O(n) for each check, where 'n' is the number of elements in the $visited array.

In summary:

- For most general-purpose set implementations in PHP, especially on LeetCode where you might encounter various data types and need efficient lookups, using an associated array with isset() is the recommended approach due to its flexibility and average O(1) time complexity for key operations.
- A boolean array can be efficient in specific scenarios where you are only dealing with non-negative integers within a reasonable range and memory usage is carefully considered.
- Using a simple numerical array with in_array() is the least efficient for checking the existence of elements, making it generally unsuitable for performance-critical tasks like graph traversal in competitive programming.

In PHP, arrays are used to implement sets, just like hash tables.

    $lightBulbs = [
      'incandescent' => true,
      'compact fluorescent' => true,
      'LED' => true
    ];

    isset($lightBulbs['LED']);  // true
    isset($lightBulbs['halogen']);  // false
