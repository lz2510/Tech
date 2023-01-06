# complexity

## The average time complexity of different data structures

| Data structure | Radom Access/Get at index/Indexing/Peek/Indexed Access | Search| Insertion | Deletion |
| -- | -- | -- | -- | -- |
| Array |	O(1) | O(N) | O(N) |	O(N) |
| Linked list | O(N) |O(N) |O(1)	|O(1 )|
| Stack	| N/A | O(N)	|O(1)	|O(1) |
| Queue	| N/A | O(N)	|O(1)	|O(1) |
| Hash Table | N/A | O(1) | O(1) | O(1) |
| Binary Search Tree | N/A | O(log N) | O(log N) | O(log N) |

## Access/Get at index/Indexing vs Search

Only array Access/Get at index/Indexing and Search are different, others are the same.

## linked list radom access

Linked list random access sounds strange. As it's not like array use index to access. It's similar to search operation. There is random access in wikipedia.

Linked lists allow constant time removal and insertion in the middle but take linear time for indexed access. linked lists allow only sequential access to elements.

## array vs linked list

Array is O(1) in access operation, insert and delete are O(n). Linked list access is O(n), insert and delet are O(1). Both search are O(n).

For random access, use array. For insert and delete frequently, use linked list.

![4f63e92598ec2551069a0eef69db7168](https://user-images.githubusercontent.com/1209204/210755595-5f23dc71-b8a9-4a96-8225-e1d911fbad1a.jpeg)

https://www.geeksforgeeks.org/time-complexities-of-different-data-structures/  
https://en.wikipedia.org/wiki/Best,_worst_and_average_case#Data_structures  
https://en.wikipedia.org/wiki/Search_data_structure#Asymptotic_worst-case_analysis  
https://en.wikipedia.org/wiki/Random_access  
https://en.wikipedia.org/wiki/Array_(data_structure)#Comparison_with_other_data_structures  
https://en.wikipedia.org/wiki/Linked_list  
