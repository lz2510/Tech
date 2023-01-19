# Two pointers


## time complexity

O(n)

The precondition is array is sorted. If it's not, sort first. Usually sort time complexity is O(nlogn), so overall complexity would be O(nlogn).

## two types

- One slow-runner and the other fast-runner.
- One pointer starts from the beginning while the other pointer starts from the end.

## One slow-runner and the other fast-runner

Use a slow pointer to "lock" the "wanted" element, and use a fast pointer to move forward along the list and look for new unique elements in the list.  
Or, in other words, the current slow pointer is used to locate the latest unique number for the results, and fast is used for iterating and discovery.

Have fast advanced in every iteration, but slow is only advanced when two pointers are onto two different elements.

That means, the elements after nums[slow] and before nums[fast] are numbers we've seen before and don't need anymore (one copy of these numbers is already saved before the current slow (inclusive)).

## One pointer starts from the beginning while the other pointer starts from the end.

In this approach, two pointers are used to process two array elements at the same time. Usual implementation is to set one pointer in the beginning and one at the end and then to move them until they both meet.

### code sample

    function removeDuplicates(&$nums) {
        $j = 0;
        for ($i = 1; $i < count($nums); $i++) {
            if ($nums[$i] != $nums[$j]) {
                $j++;
                $nums[$j] = $nums[$i];
            }
        }
        return $j + 1;
    }
    
## One pointer starts from the beginning while the other pointer starts from the end.

### code sample

#### end condition is while ($i < $j), ++ and -- are in the loop, initilizition is before the loop

    function twoSum($numbers, $target) {
        $i = 0;
        $j = count($numbers) - 1;
        while ($i < $j) {
            $sum = $numbers[$i] + $numbers[$j];
            if ($sum == $target) {
                return [$i + 1, $j + 1];
            } elseif ($sum < $target) {
                $i++;
            } else {
                $j--;
            }
        }
    }
    
#### end condition is in for statement, ++ and -- as well, initializtion as well.
    
    function reverseString(&$s) {
        //end condition is $i < $j, not $i < count($s) -1, $j >=0
        //for ($i = 0, $j = count($s) - 1; $i < count($s) -1, $j >=0; $i++, $j--) {
        for ($i = 0, $j = count($s) - 1; $i < $j; $i++, $j--) {
            $tmp = $s[$j];
            $s[$j] = $s[$i];
            $s[$i] = $tmp;
        }
    }

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
https://leetcode.com/problems/reverse-string/solutions/404367/reverse-string/?orderBy=most_votes  
