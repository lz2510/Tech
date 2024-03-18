# Dynamic programming

## definiation

![image](img/dp-defination.png)

## two key attributes

There are two key attributes that a problem must have in order for dynamic programming to be applicable: optimal substructure and overlapping sub-problems. If a problem can be solved by combining optimal solutions to non-overlapping sub-problems, the strategy is called "divide and conquer" instead.[1] This is why merge sort and quick sort are not classified as dynamic programming problems.

**1. Optimal substructure**: Remember that larger palindromes are made of smaller palindromes. Congratulation, we have discovered a substructure to our problem! Knowing that a string is made up of a palindrome helps us determine if the string itself is a palindrome.

Here's an example: for the string "axbobxa", the first and the last characters match, so it's a potential palindrome. If we knew already that its substring "xbobx" is also a palindrome, there wouldn't be a need for any further checks.

But is this substructure optimal?

Yes! Since the optimal result for a string relies only on the optimal result for just one subproblem, and has to do just one check for the boundary characters (in constant time), this is an optimal substructure. We cannot get this result by checking fewer than one subproblem (it wouldn't be a substructure anymore) or doing the boundary characters check faster (it's already constant time!).

**2. Overlapping sub-problems**: While checking all substrings of a large string for palindromicity, we might need to check some smaller substrings for the same, repeatedly. If we store the result of processing those smaller substrings, we can reuse those while processing larger substrings.

Here's an example: for the string "axbobxa", the substring "bob" needs to checked for the substring "xbobx" and the string "axbobxa". In fact, to check all three of these strings, the single character string "o" needs to be checked.

https://leetcode.com/problems/palindromic-substrings/editorial/  

## two approaches

This can be achieved in either of two ways:

**Top-down approach**: This is the direct fall-out of the recursive formulation of any problem. If the solution to any problem can be formulated recursively using the solution to its sub-problems, and if its sub-problems are overlapping, then one can easily memoize or store the solutions to the sub-problems in a table. Whenever we attempt to solve a new sub-problem, we first check the table to see if it is already solved. If a solution has been recorded, we can use it directly, otherwise we solve the sub-problem and add its solution to the table.



**Bottom-up approach**: Once we formulate the solution to a problem recursively as in terms of its sub-problems, we can try reformulating the problem in a bottom-up fashion: try solving the sub-problems first and use their solutions to build-on and arrive at solutions to bigger sub-problems. This is also usually done in a tabular form by iteratively generating solutions to bigger and bigger sub-problems by using the solutions to small sub-problems. For example, if we already know the values of F41 and F40, we can directly calculate the value of F42.

Another version:

Recall that there are two different techniques we can use to implement a dynamic programming solution; memoization and tabulation.

**Memoization** is where we add caching to a function (that has no side effects). In dynamic programming, it is typically used on recursive functions for a top-down solution that starts with the initial problem and then recursively calls itself to solve smaller problems.
  
**Tabulation** uses a table to keep track of subproblem results and works in a bottom-up manner: solving the smallest subproblems before the large ones, in an iterative manner. Often, people use the words "tabulation" and "dynamic programming" interchangeably.

For most people, it's easiest to start by coming up with a recursive brute-force solution and then adding memoization to it. After that, they then figure out how to convert it into an (often more desired) bottom-up tabulated algorithm.

https://en.wikipedia.org/wiki/Dynamic_programming#Computer_programming  
https://leetcode.com/problems/longest-common-subsequence/editorial/  

## framework

Here's the simple framework for our dynamic programming solution:

1. Define the dynamic programming state. This is the result that gets reused in further computations.

Let's define our state dp(i, j), which tells us whether the substring composed of the i^{th} to the j^{th} characters of the input string, is a palindrome or not.

Thus, the answer to our problem lies in counting all substrings whose state is true.

2. Identify the base cases. There are essentially two base-cases:

- Single letter substrings are palindromes by definition.
- Double letter substrings composed of the same character are palindromes. 

3. Identify the optimal substructure. A string is considered a palindrome if:

- Its first and last characters are equal, and
- The rest of the string (excluding the boundary characters) is also a palindrome.
 
4. Identify overlapping sub-problems and compute them only once. The optimal substructure mentioned above ensures that the state for a string depends only on the state for a single substring. If we compute (and save) the states for all smaller strings first, larger strings can be processed by reusing previously saved states. The base cases that we have identified already define states for single and double letter strings. We can use those to compute states for three character (and subsequently larger) strings.

5. The answer is found by counting all states that evaluate true. Since each state tells whether a unique substring is a palindrome or not, counting true states provides us the number of palindromic substrings.

https://leetcode.com/problems/palindromic-substrings/editorial/  

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

## How to initialize first row and column? 

1. It can be easy to assign 0 or 1 like unique path and for do some calculation like unique path 2. 

1.1 For unique path, there is only one path to reach the cells in the first row: right->right->...->right. The same is valid for the first column, though the path here is down->down-> ...->down.

<img width="285" alt="Screenshot 2023-02-11 at 12 08 00" src="https://user-images.githubusercontent.com/1209204/218238427-427e031b-0699-4798-ac80-e09e2ae5e7c9.png">

        for ($i = 0; $i < $m; $i++) {
            $dp[$i][0] = 1;
        }
        for ($i = 0; $i < $n; $i++) {
            $dp[0][$i] = 1;
        }

1.2 For unique path2, there are obstacles. If any cell has an obstacle, we won't let that cell contribute to any path.As the reboot is put in the first cel, so $dp[0][0] = 1;

<img width="629" alt="Screenshot 2023-02-11 at 12 07 38" src="https://user-images.githubusercontent.com/1209204/218238437-c06dd1db-0a78-4add-be43-b2a29fe3fd7d.png">

        $dp[0][0] = 1;
        //$dp[$i-1][0] == 1 or $dp[0][$j-1] == 1 use $dp to check if last row or column has stone
        for ($i = 1; $i < $m; $i++) {
            $dp[$i][0] = $obstacleGrid[$i][0] == 0 && $dp[$i-1][0] == 1 ? 1 : 0;
        }

        for ($j = 1; $j < $n; $j++) {
            $dp[0][$j] = ($obstacleGrid[0][$j] == 0 && $dp[0][$j-1] == 1) ? 1 : 0;
        }


https://leetcode.com/problems/unique-paths/solutions/504514/unique-paths/?orderBy=most_votes  
https://leetcode.com/problems/unique-paths-ii/solutions/184772/unique-paths-ii/?orderBy=most_votes  

2. Another is to add an extra row and column on $dp because the initial first element needs to use the same logic as other elements, so $dp adds one more element and initializes all to 0. $text1[1] and $text2[1] is based on $dp[0], in iterate, $dp[i] relates $text[i-1]. The example is long common sequence.

![image_1564691262](https://user-images.githubusercontent.com/1209204/218236964-e76e201c-d6b6-4fa4-9495-fba9f2f2056d.png)


    //$dp length is $m+1,$n+1, $text1 and $text 2 length is $m, $n
    //so $dp is from 0 to $m+1, $n+1, the last element $dp[$m][$n]
    //because the length is different, $dp[$i][$j] relates $text1[$i-1] and $text2[$j-1]
    $dp = [];
    //initialize also need $i < $m + 1, not $i < $n
    for ($i = 0; $i < $m + 1; $i++) {
        $dp[$m][0] = 0;
    }
    for ($i = 0; $i < $n + 1; $i++) {
        $dp[0][$n] = 0;
    }
    for ($i = 1; $i < $m + 1; $i++) {
        for ($j = 1; $j < $n + 1; $j++) {
            if ($text1[$i-1] != $text2[$j-1]) {
                $dp[$i][$j] = max($dp[$i-1][$j], $dp[$i][$j-1]);
            } else {
                $dp[$i][$j] = $dp[$i-1][$j-1] + 1;
            }
        }
    }
    return $dp[$m][$n];
    
https://leetcode.com/problems/longest-common-subsequence  
https://leetcode.com/problems/longest-common-subsequence/submissions/890580919/  
https://leetcode.com/problems/longest-common-subsequence/solutions/348884/c-with-picture-o-nm/?orderBy=most_votes  



        
