# sliding window

## introduction

https://leetcode.com/explore/interview/card/leetcodes-interview-crash-course-data-structures-and-algorithms/703/arraystrings/4502/

## complexity

A sliding window guarantees a maximum of 2n window iterations - the right pointer can move n times and the left pointer can move n times. This means if the logic done for each window is O(1), sliding window algorithms run in O(n).

You may be thinking: there is a while loop inside of the for loop, isn't the time complexity 
O(n^2)? The reason it is still O(n) is that the while loop can only iterate n times in total for the entire algorithm (left starts at 0, only increases, and never exceeds n). If the while loop were to run n times on one iteration of the for loop, that would mean it wouldn't run at all for all the other iterations of the for loop. This is what we refer to as amortized analysis - even though the worst case for an iteration inside the for loop is O(n), it averages out to O(1) when you consider the entire runtime of the algorithm.

## code template

    function fn(arr):
        left = 0
        for (int right = 0; right < arr.length; right++):
            Do some logic to "add" element at arr[right] to window
    
            while WINDOW_IS_INVALID:
                Do some logic to "remove" element at arr[left] from window
                left++
    
            Do some logic to update the answer

## when window becomes invalid

But what if after adding a new element, the subarray becomes invalid? We need to "remove" some elements from our window until it becomes valid again. To "remove" elements, we can increment left, which shrinks our window. 

This suggests that we should use a while loop to perform the removals. 

    while ($zeroNum < 0) {
        if ($nums[$i] == 0) {
            $zeroNum++;
        }
        $i++;
    }

Another way is to use outside for loop. when the window is invalid, increase left, then go the next for loop which also increases right. finally the window will become valid again. But it's not efficient. 

    if ($zeroNum < 0) {
        if ($nums[$i] == 0) {
            $zeroNum++;
        }
        $i++;
    }

it's intuitive that increase in a while loop unitl it becomes valid again then go the next for loop which increases right. for loop is only used to expand the window by increasing right. while loop is responsible for making the window become valid again.    

## where to initialize left

solution 1: out of for loop (which is prefered as for loop is only used to expand the window by increasing right.)

    left = 0
    for (int right = 0; right < arr.length; right++):

solution 2: in for loop

    for (int left = 0, int right = 0; right < arr.length; right++):

