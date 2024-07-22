# sliding window

## introduction

https://leetcode.com/explore/interview/card/leetcodes-interview-crash-course-data-structures-and-algorithms/703/arraystrings/4502/

## code template

    function fn(arr):
        left = 0
        for (int right = 0; right < arr.length; right++):
            Do some logic to "add" element at arr[right] to window
    
            while WINDOW_IS_INVALID:
                Do some logic to "remove" element at arr[left] from window
                left++
    
            Do some logic to update the answer
