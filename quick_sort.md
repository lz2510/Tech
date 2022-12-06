# Quick Sort

About the index of smaller element, there are two approaches.

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


condition of coming out loop
//end is count($arr) - 1, which means index of last element, not number of all elements.
//the end is pivot, don't need to compare the end with pivot self
//condition of coming out loop is $i <= $end - 1 or $i < $end

correct:
for ($i = $begin; $i <= $end - 1; $i++) {
or
for ($i = $begin; $i < $end; $i++) {

wrong:
for($i = $begin; $i <= $end; $i++){




![Sorting_quicksort_anim](https://user-images.githubusercontent.com/1209204/205549416-cc28da1d-84d4-4024-95de-b058124dd2a2.gif)

![image](https://user-images.githubusercontent.com/1209204/205418598-eb0d72d9-0846-426b-a830-5bf8c9b61596.gif)

https://www.geeksforgeeks.org/quick-sort/  
https://en.wikipedia.org/wiki/Quicksort  
https://en.wikipedia.org/wiki/Introduction_to_Algorithms  
https://shimo.im/docs/TX9bDbSC7C0CR5XO/read  
https://sd.blackball.lv/library/Introduction_to_Algorithms_Third_Edition_(2009).pdf  


