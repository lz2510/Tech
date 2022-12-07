# Merge Sort

## defination

The Merge Sort algorithm is a sorting algorithm that is based on the Divide and Conquer paradigm. In this algorithm, the array is initially divided into two equal halves and then they are combined in a sorted manner.

Merge Sort Working Process:

Think of it as a recursive algorithm continuously splits the array in half until it cannot be further divided. This means that if the array becomes empty or has only one element left, the dividing will stop, i.e. it is the base case to stop the recursion. If the array has multiple elements, split the array into halves and recursively invoke the merge sort on each of the halves. Finally, when both halves are sorted, the merge operation is applied. Merge operation is the process of taking two smaller sorted arrays and combining them to eventually make a larger one.

## animation

![image](https://user-images.githubusercontent.com/1209204/206084920-5e893768-b277-4005-b79c-f405bb9a61d0.gif)

## code implementation

[code](https://github.com/lz2510/algorithm_camp/blob/main/sort/MergeSort.php)

## topic

### issue 1:

    $mid = floor(($right - $left) / 2);
for example: $left is 0, $right is 6, then $mid is 3. It's correct.

But in next loop, when $left is 4 and $right is 6, then $mid is 1, actually it should be 5.

right:

    $mid = floor(($right + $left) / 2);
or

    $mid = $left + floor(($right - $left) / 2);

### issue 2:

Fatal error: Allowed memory size of 536870912 bytes exhausted (tried to allocate 536870920 bytes)
it means dead recrisive.
As $tmp[$k++] = $arr[$i]; $i doesn't increase. so $i is always less than $mid.

    while ($i <= $mid) {
    $tmp[$k++] = $arr[$i];
    }
    while ($j <= $right) {
    $tmp[$k++] = $arr[$j];
    }

right:

    while ($i <= $mid) {
    $tmp[$k++] = $arr[$i++];
    }
    while ($j <= $right) {
    $tmp[$k++] = $arr[$j++];
    }
    
https://www.geeksforgeeks.org/merge-sort/  
https://en.wikipedia.org/wiki/Merge_sort  
