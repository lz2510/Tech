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

## base case of binary trees

In binary tree traversals, most often the base case is to check if we have an empty tree. A common mistake is to check the child pointers of the current node, and only make the recursive call for a non-null child.

Recall the basic preorder traversal function.

        static void preorder(BinNode rt) {
          if (rt == null) return; // Empty subtree - do nothing
          visit(rt);              // Process root node
          preorder(rt.left());    // Process all nodes in left
          preorder(rt.right());   // Process all nodes in right
        }

Here is an alternate design for the preorder traversal, in which the left and right pointers of the current node are checked so that the recursive call is made only on non-empty children.

        // This is a bad idea
        static void preorder2(BinNode rt) {
          visit(rt);
          if (rt.left() != null) preorder2(rt.left());
          if (rt.right() != null) preorder2(rt.right());
        }

At first it might appear that preorder2 is more efficient than preorder, because it makes only half as many recursive calls (since it won’t try to call on a null pointer). On the other hand, preorder2 must access the left and right child pointers twice as often. The net result is that there is no performance improvement.

Perhaps the writer of preorder2 wants to protect against the case where the root is null. But preorder2 has an error. While preorder2 insures that no recursive calls will be made on empty subtrees, it will fail if the orignal call from outside passes in a null pointer. This would occur if the original tree is empty. Since an empty tree is a legitimate input to the initial call on the function, there is no safe way to avoid this case. So it is necessary that the first thing you do on a binary tree traversal is to check that the root is not null. If we try to fix preorder2 by adding this test, then making the tests on the children is completely redundant because the pointer will be checked again in the recursive call.

The design of preorder2 is inferior to that of preorder for a deeper reason as well. Looking at the children to see if they are null means that we are worrying too much about something that can be dealt with just as well by the children. This makes the function more complex, which can become a real problem for more complex tree structures. Even in the relatively simple preorder2 function, we had to write two tests for null rather than the one needed by preorder. This makes it more complicated than the original version. The key issue is that it is much easier to write a recursive function on a tree when we only think about the needs of the current node. Whenever we can, we want to let the children take care of themselves. In this case, we care that the current node is not null, and we care about how to invoke the recursion on the children, but we do not have to care about how or when that is done.

Another way to say base case.

Eventually, a null node will be reached, in which case the recursion will break. This means we need a base case for null nodes. It's pretty obvious that visiting all the nodes in a null tree is the same as doing nothing, so here's the base case for all 3 recursions:

https://opendsa-server.cs.vt.edu/ODSA/Books/CS3/html/WritingTraversals.html#the-recursive-call  
https://deriveit.org/coding/tree-dfs-113  

## The Recursive Call

The secret to success when writing a recursive function is to not worry about how the recursive call works. Just accept that it will work correctly. One aspect of this principle is not to worry about checking your children when you don’t need to. You should only look at the values of your children if you need to know those values in order to compute some property of the current node. Child values should not be used to decide whether to call them recursviely. Make the call, and let their own base case handle it.

Example 7.6.1

Consider the problem of incrementing the value for each node in a binary tree. The following solution has an error, since it does redundant manipulation to left and the right children of each node.

        static void ineff_BTinc(BinNode root) {
          if (root != null) {
              root.setValue((int)(root.value()) + 1);
            if (root.left() != null) {
              root.left().setValue((int)(root.left().value()) + 1);
              ineff_BTinc(root.left().left());
            }
            if (root.right() != null) {
              root.right().setValue((int)(root.right().value()) + 1);
              ineff_BTinc(root.right().right());
            }
          }
        }

The efficient solution should not explicitly set the children values that way. Changing the value of a node does not depend on the child values. So the function should simply increment the root value, and make recursive calls on the children.

In rare problems, you might need to explicitly check if the children are null or access the children values for each node. For example, you might need to check if all nodes in a tree satisfy the property that each node stores the sum of its left and right children. In this situation you must look at the values of the children to decide something about the current node. You do not look at the children to decide whether to make a recursive call.

https://opendsa-server.cs.vt.edu/ODSA/Books/CS3/html/WritingTraversals.html#the-recursive-call

## base case vs leaf node in tree

base case if to check if the current itself is empty or not. return statement depends on context, can be null, false or zero.

        if ($node === null) {
                return;
        } 
        or
        if ($node === null) {
                return false;
        } 
        or
        if ($node === null) {
                return 0;
        }

Checking if a node is leaf is to check both left and right children are empty.

    if ($treeNode->left === null && $treeNode->right === null){
    }

In the Path Sum problem on leetcode, base case and checking leaf nodes both used in the solution. But they are doing different things.

        if ($treeNode === null) {
            return false;
        }
        $sum += $treeNode->val;
        if ($treeNode->left === null && $treeNode->right === null){
            return $sum == $targetSum;
        }
        
https://stackoverflow.com/questions/34249476/in-binary-tree-checking-if-given-node-is-leaf-node-or-not#
