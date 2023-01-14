# Two pointers


## time complexity

O(n)

## two types

- One slow-runner and the other fast-runner.
- One pointer starts from the beginning while the other pointer starts from the end.

## One slow-runner and the other fast-runner

Use a slow pointer to "lock" the "wanted" element, and use a fast pointer to move forward along the list and look for new unique elements in the list.  
Or, in other words, the current slow pointer is used to locate the latest unique number for the results, and fast is used for iterating and discovery.

Have fast advanced in every iteration, but slow is only advanced when two pointers are onto two different elements.

That means, the elements after nums[slow] and before nums[fast] are numbers we've seen before and don't need anymore (one copy of these numbers is already saved before the current slow (inclusive)).

## Classic problems:

1. [Remove Duplicates from Sorted Array](https://leetcode.com/problems/remove-duplicates-from-sorted-array/)
2. Two Sum II - Input array is sorted
3. Reverse Words in a String II
4. Rotate Array
5. Valid Palindrome
6. Container With Most Water
7. Product of Array Except Self

https://leetcode.com/articles/two-pointer-technique/  
https://medium.com/@kevinlai76/algorithm-two-pointer-technique-a27103ed7ea1  
https://www.geeksforgeeks.org/two-pointers-technique/  
https://leetcode.com/problems/remove-duplicates-from-sorted-array/solutions/2107606/py-all-4-methods-intuitions-walk-through-wrong-answer-explanations-for-beginners-python/?orderBy=most_votes  
