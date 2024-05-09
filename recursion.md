# Recursion

## understanding

An important thing to understand about recursion is the order in which the code runs - the order in which the computer executes instructions. With an iterative program, it's easy - start at the top, and go line by line. With recursion, it can get confusing because calls can cascade on top of each other. Let's print numbers again, but this time only up to 3. Let's also add another print statement and number the lines:

    function fn(i):
    1.  if i > 3:
    2.    return
    
    3.  print(i)
    4.  fn(i + 1)
    5.  print(f"End of call where i = {i}")
    6.  return
    
    fn(1)

If you ran this code, you would see the following in the output:

    // 1
    // 2
    // 3
    // End of call where i = 3
    // End of call where i = 2
    // End of call where i = 1

As you can see, the line where we print text is executed in reverse order. The original call fn(1) first prints 1, then calls to fn(2), which prints 2, then calls to fn(3), which prints 3, then calls to fn(4). Now, this is the important part: how recursion "moves" back "up". fn(4) triggers the base case, which returns. We are now back in the function call where i = 3 and line 4 has finished, so we move to the line 5 which prints "End of call where i = 3". Once that line runs, we move to the next line, which is a return. Now, we are back in the function call where i = 2 and line 4 line has finished, so again we move to the next line and print "End of the call where i = 2". This repeats until the original function call to fn(1) returns.

> Every function call "exists" until it returns. When we move to a different function call, the old one waits until the new one returns. The order in which the calls happens is remembered, and the lines within the functions are executed in order.

> Note that each function call also has its own local scope. So in the example above, when we call f(3), there are 3 "versions" of i simultaneously. The first call has i = 1, the second call has i = 2, and the third call has i = 3. Let's say that we were to do i += 1 in the f(3) call. Then i becomes 4, but only in the f(3) call. The other 2 "versions" of i are unaffected because they are in different scopes.

https://leetcode.com/explore/interview/card/leetcodes-interview-crash-course-data-structures-and-algorithms/715/introduction/4655/


## recursion application (Fibonacci numbers)

1. divided by and conque, including mergesort and quicksort.
2. dynamic programming (coin change)
3. backtracking (tic-tac-toe)
4. numerical application like RSA encryption 

## code template

![image](img/recursion-template.png)


