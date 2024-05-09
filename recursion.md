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

<img width="1002" alt="Screenshot 2024-05-09 at 21 27 25" src="https://github.com/lz2510/Tech/assets/1209204/1bb0c1c3-2747-4e04-aa74-73b0b79aad4a">
<img width="1000" alt="Screenshot 2024-05-09 at 21 27 35" src="https://github.com/lz2510/Tech/assets/1209204/1b842a63-638a-4f9a-8b99-8f07d48bb85f">
<img width="998" alt="Screenshot 2024-05-09 at 21 27 48" src="https://github.com/lz2510/Tech/assets/1209204/49899f28-51d7-452a-93d0-15758cc87f51">
<img width="999" alt="Screenshot 2024-05-09 at 21 27 59" src="https://github.com/lz2510/Tech/assets/1209204/33c365c9-5b53-4023-92e7-d1496a5aefec">
<img width="999" alt="Screenshot 2024-05-09 at 21 28 16" src="https://github.com/lz2510/Tech/assets/1209204/94bfa068-df30-4d08-85d3-12d57a2da452">
<img width="1001" alt="Screenshot 2024-05-09 at 21 28 34" src="https://github.com/lz2510/Tech/assets/1209204/b81fe4c9-540c-42e1-b19a-9e12689022a2">
<img width="996" alt="Screenshot 2024-05-09 at 21 28 50" src="https://github.com/lz2510/Tech/assets/1209204/64647ab6-1e79-47a1-a33e-20cf815aa0f3">
<img width="1002" alt="Screenshot 2024-05-09 at 21 29 00" src="https://github.com/lz2510/Tech/assets/1209204/5cef7210-56c1-4d34-93c2-3a36bdcbc205">
<img width="998" alt="Screenshot 2024-05-09 at 21 29 08" src="https://github.com/lz2510/Tech/assets/1209204/70ca958a-4943-43db-b431-f9442302b654">
<img width="1002" alt="Screenshot 2024-05-09 at 21 29 17" src="https://github.com/lz2510/Tech/assets/1209204/74580f06-3f2c-4ffd-9dc6-37785956dec5">
<img width="1000" alt="Screenshot 2024-05-09 at 21 29 26" src="https://github.com/lz2510/Tech/assets/1209204/a159d47f-843c-483c-bb21-80902668d7d0">
<img width="1001" alt="Screenshot 2024-05-09 at 21 29 36" src="https://github.com/lz2510/Tech/assets/1209204/9945af11-8e71-49d2-a98b-45595526cb82">
<img width="1000" alt="Screenshot 2024-05-09 at 21 29 46" src="https://github.com/lz2510/Tech/assets/1209204/9421f8e7-f517-45ea-a22b-53f77f86f9b2">
<img width="1002" alt="Screenshot 2024-05-09 at 21 30 02" src="https://github.com/lz2510/Tech/assets/1209204/99b7e649-2d45-49d3-a394-b68015c601a7">

https://leetcode.com/explore/interview/card/leetcodes-interview-crash-course-data-structures-and-algorithms/715/introduction/4655/


## recursion application (Fibonacci numbers)

1. divided by and conque, including mergesort and quicksort.
2. dynamic programming (coin change)
3. backtracking (tic-tac-toe)
4. numerical application like RSA encryption 

## code template

![image](img/recursion-template.png)


