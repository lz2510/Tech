# Quick Sort

## defination

 QuickSort is a Divide and Conquer algorithm. It picks an element as a pivot and partitions the given array around the picked pivot. There are many different versions of quickSort that pick pivot in different ways. 

- Always pick the first element as a pivot.
- Always pick the last element as a pivot (implemented below)
- Pick a random element as a pivot.
- Pick median as the pivot.

The key process in quickSort is a partition(). The target of partitions is, given an array and an element x of an array as the pivot, put x at its correct position in a sorted array and put all smaller elements (smaller than x) before x, and put all greater elements (greater than x) after x. All this should be done in linear time.

### Partition Algorithm: 

There can be many ways to do partition, following pseudo-code adopts the method given in the CLRS book. The logic is simple, we start from the leftmost element and keep track of the index of smaller (or equal to) elements as i. While traversing, if we find a smaller element, we swap the current element with arr[i]. Otherwise, we ignore the current element. 

## INTRODUCTION TO ALGORITHMS
7 Quicksort
P170

## code implementation

[code](https://github.com/lz2510/algorithm_camp/blob/main/sort/QuickSort.php)

## topic

### About the index of smaller element, there are two approaches.

One is low -1, then plus 1 first then swap. And return itself plus 1.

i = (low – 1)  // Index of smaller element and indicates the 
    // right position of pivot found so far
if (arr[j] < pivot){
            i++;    // increment index of smaller element
            swap arr[i] and arr[j]
        }
return i+1

Another is use low, then swap first then plus 1. And return itself;
$counter = $begin;
if($arr[$i] < $arr[$pivot]){
                $tmp = $arr[$counter];
                $arr[$counter] = $arr[$i];
                $arr[$i] = $tmp;
                $counter++;
            }
return $counter;


### condition of coming out loop

//end is count($arr) - 1, which means index of last element, not number of all elements.
//the end is pivot, don't need to compare the end with pivot self
//condition of coming out loop is $i <= $end - 1 or $i < $end

correct:
for ($i = $begin; $i <= $end - 1; $i++) {
or
for ($i = $begin; $i < $end; $i++) {

wrong:
for($i = $begin; $i <= $end; $i++){


## anaimation

![Sorting_quicksort_anim](https://user-images.githubusercontent.com/1209204/205549416-cc28da1d-84d4-4024-95de-b058124dd2a2.gif)

![image](https://user-images.githubusercontent.com/1209204/205418598-eb0d72d9-0846-426b-a830-5bf8c9b61596.gif)

https://www.geeksforgeeks.org/quick-sort/  
https://en.wikipedia.org/wiki/Quicksort  
https://en.wikipedia.org/wiki/Introduction_to_Algorithms  
https://shimo.im/docs/TX9bDbSC7C0CR5XO/read  
https://sd.blackball.lv/library/Introduction_to_Algorithms_Third_Edition_(2009).pdf  


