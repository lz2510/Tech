# Dynamic programming

## definiation

![image](img/dp-defination.png)

## two key attributes

There are two key attributes that a problem must have in order for dynamic programming to be applicable: optimal substructure and overlapping sub-problems. If a problem can be solved by combining optimal solutions to non-overlapping sub-problems, the strategy is called "divide and conquer" instead.[1] This is why merge sort and quick sort are not classified as dynamic programming problems.

## two approaches

This can be achieved in either of two ways:

**Top-down approach**: This is the direct fall-out of the recursive formulation of any problem. If the solution to any problem can be formulated recursively using the solution to its sub-problems, and if its sub-problems are overlapping, then one can easily memoize or store the solutions to the sub-problems in a table. Whenever we attempt to solve a new sub-problem, we first check the table to see if it is already solved. If a solution has been recorded, we can use it directly, otherwise we solve the sub-problem and add its solution to the table.

**Bottom-up approach**: Once we formulate the solution to a problem recursively as in terms of its sub-problems, we can try reformulating the problem in a bottom-up fashion: try solving the sub-problems first and use their solutions to build-on and arrive at solutions to bigger sub-problems. This is also usually done in a tabular form by iteratively generating solutions to bigger and bigger sub-problems by using the solutions to small sub-problems. For example, if we already know the values of F41 and F40, we can directly calculate the value of F42.

https://en.wikipedia.org/wiki/Dynamic_programming#Computer_programming  

## dp vs recrusion and divide and conque

![image](img/dp-vs-recursion-divide-conque.png)

## Fibonacci Numbers

### recursion 

<img width="498" alt="fib_recur" src="https://user-images.githubusercontent.com/1209204/215318553-c353007b-809f-4a16-bfa4-cf9db1187d04.png">

### recursion + memory(unoptimized and optimized)

<img width="521" alt="fib_mem" src="https://user-images.githubusercontent.com/1209204/215318562-63f0e611-f7a4-45f7-ae0c-52a4d58fdf7c.png">
<img width="542" alt="fib_mem_optimized" src="https://user-images.githubusercontent.com/1209204/215318577-2587b1d3-172f-48bc-b4d0-90195ed46b92.png">

### dp(bottom up)

<img width="477" alt="fib_dp" src="https://user-images.githubusercontent.com/1209204/215318592-21b81a47-8c5a-41a7-acbe-165b2e34475b.png">

https://github.com/TheAlgorithms/Java/blob/master/src/main/java/com/thealgorithms/dynamicprogramming/Fibonacci.java  
