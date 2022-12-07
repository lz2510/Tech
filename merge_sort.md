# Merge Sort

## defination

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

