# Two pointers

## introduction

https://leetcode.com/explore/interview/card/leetcodes-interview-crash-course-data-structures-and-algorithms/703/arraystrings/4501/

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

### code template

```
def floyd(f, x0) -> (int, int):
    """Floyd's cycle detection algorithm."""
    tortoise = f(x0) # f(x0) is the element/node next to x0.
    hare = f(f(x0))
    while tortoise != hare:
        tortoise = f(tortoise)
        hare = f(f(hare))
```
https://en.wikipedia.org/wiki/Cycle_detection#Floyd's_tortoise_and_hare

### while loop condition for goal check or exit check

Floyd's cycle-finding algorithm can be used to solive Linked List Cycle.

https://leetcode.com/problems/linked-list-cycle/

```
// Solution #1
if ($head === null) return false;
$slow = $head;
$fast = $head;
while ($fast->next !== null && $fast->next->next !== null) {
    // Move first...
    $slow = $slow->next;
    $fast = $fast->next->next;
    // ...then check for match.
    if ($slow === $fast) return true;
}
return false;
```

```
// Solution #2
if ($head === null) return false;
$slow = $head;
$fast = $head->next; // Fast pointer gets a head start
while ($slow !== $fast) {
    // Check first...
    if ($fast === null || $fast->next === null) return false;
    // ...then move.
    $slow = $slow->next;
    $fast = $fast->next->next;
}
return true;
```


You've hit on a fundamental and insightful point in algorithm design. You are correct: a loop's condition is typically a "continue-while-valid" or "exit" check.

The two solutions represent two different, but equally standard, philosophies for structuring a loop's logic.

The Two Philosophies of Loop Design

**Philosophy A: "Guard the Loop" (Solution #1's style)**

In this pattern, the while condition's only job is to be a gatekeeper. It guarantees that the code inside the loop is always safe to execute.

- **Loop Condition's Job:** "Is it safe to take another step?" (while ($fast->next !== null && $fast->next->next !== null)).

- **Loop Body's Job:** Assume safety, do the work (move pointers), and then check if the goal has been met (if ($slow === $fast)).

- **Analogy:** A security guard at a concert. The guard at the gate (the while condition) ensures everyone entering is valid. Once inside, an usher (the if statement) finds you when it's your turn.

This pattern is very defensive and separates the safety logic from the goal-finding logic.

**Philosophy B: "Loop Towards the Goal" (Solution #2's style)**

This is the pattern you asked about, which is common in canonical examples. Here, the while condition's job is to state the primary objective of the loop.

- **Loop Condition's Job:** "Have we reached our goal yet?" (while ($slow !== $fast)). It reads like plain English: "While the pointers haven't met, keep trying."

- **Loop Body's Job:** The first thing the body must do is handle any "exit" conditions that would make reaching the goal impossible (if ($fast === null || $fast->next === null)). If it's safe, it then does the work (moves the pointers) to get closer to the goal.

- **Analogy:** A self-driving car. Its main directive is while (car is not at destination). The code inside that loop handles the immediate "exit" conditions: if (obstacle ahead) then stop, if (red light) then wait. The primary purpose is defined by the while loop itself.

This "check for goal, check for exit, then do work" structure is considered elegant because the while statement itself describes the purpose of the loop, making the algorithm's intent immediately clear from its signature. The body then handles the necessary mechanics and safety checks. This is why it's often favored in academic settings and official solutions—it clearly separates the high-level goal from the low-level implementation details.


For users on the LeetCode platform, the second pattern ("Loop to the Goal") is generally recommended.

**Why the "Loop to the Goal" Pattern is Recommended**

While both solutions are correct and professional, the second pattern has a slight edge in the specific context of LeetCode and technical interviews.

**1. Alignment with "Textbook" Solutions**

As you discovered, this is the implementation style you'll find in canonical sources like Wikipedia and in many official LeetCode solutions. Using this pattern shows that you are familiar with the standard, classic representation of the algorithm. An interviewer is more likely to recognize this specific structure instantly.

**2. Clarity of Algorithmic Intent**

The condition while ($slow !== $fast) makes the purpose of the loop immediately obvious: "Keep going until the pointers meet." It describes the high-level goal of the algorithm, not just the low-level safety conditions needed to run it. On a platform where you are communicating your understanding of an algorithm, stating the goal so clearly is very effective.

While both patterns are excellent, the "Loop to the Goal" structure is slightly more aligned with the academic and performance-oriented culture of competitive programming platforms like LeetCode.

## One pointer starts from the beginning while the other pointer starts from the end.

In this approach, two pointers are used to process two array elements at the same time. Usual implementation is to set one pointer in the beginning and one at the end and then to move them until they both meet.

### code template

    function fn(arr):
        left = 0
        right = arr.length - 1
    
        while left < right:
            Do some logic here depending on the problem
            Do some more logic here to decide on one of the following:
                1. left++
                2. right--
                3. Both left++ and right--

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

### code template

    function fn(arr1, arr2):
        i = j = 0
        while i < arr1.length AND j < arr2.length:
            Do some logic here depending on the problem
            Do some more logic here to decide on one of the following:
                1. i++
                2. j++
                3. Both i++ and j++
    
        // Step 4: make sure both iterables are exhausted
        // Note that only one of these loops would run
        while i < arr1.length:
            Do some logic here depending on the problem
            i++
    
        while j < arr2.length:
            Do some logic here depending on the problem
            j++

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
