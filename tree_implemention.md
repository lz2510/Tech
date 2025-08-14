# tree implemention

## code template

noted that both sources check node itself instead of node's value as base code. about base case, deep describption is below section [base case](#base-case).

below is from leetcode, only preorder 
```
public int dfs(TreeNode root) {
    if (root == null) {
        return 0;
    }

    int ans = 0;
    // do logic
    dfs(root.left);
    dfs(root.right);
    return ans;
}
```
https://leetcode.com/explore/interview/card/cheatsheets/720/resources/4723/

below is from wiki, pre-order and post-order
```
procedure preorder(node)
    if node = null
        return
    visit(node)
    preorder(node.left)
    preorder(node.right)
```
```
procedure postorder(node)
    if node = null
        return
    postorder(node.left)
    postorder(node.right)
    visit(node)
```
	
https://en.wikipedia.org/wiki/Tree_traversal#Depth-first_search_implementation

## when to use pre-order traversal

**Path-Finding from the Root**
When you need to find a path from the root to a specific node, pre-order is a natural fit. As you traverse down the tree, you add the current node to your path list. This is the "process the node" step. Then, you recursively search the left and right children. If you don't find the target in either subtree, you backtrack by removing the current node from your path list.


## When to Use Post-Order Traversal

You should use this pattern whenever you need to know the answer for the children before you can figure out the answer for the parent.

**Calculating Depth/Height:** You can't know the height of a node until you know the heights of its left and right subtrees. The "Maximum Depth" problem is a perfect example (return 1 + max($leftDepth, $rightDepth);).

**Deleting a Tree:** To safely delete a tree, you must delete its children before you can delete the parent node itself.

**Evaluating an Expression Tree:** For a node like +, you must first evaluate its left child (e.g., 3) and its right child (e.g., 4) before you can perform the addition (3 + 4).

## base case

how to check if has children?

it's recommend solution 1. because the base case in a recursion should be put at the beginning. and it's the same as the code template above.

solution 1: call anyway without check if has children, check as a base case at the beginning and check node self treeNode. note that the node must can be null ?TreeNode in the argument definition by adding question ? mark.

```
function dfs(?TreeNode $treeNode, int $sum, int $targetSum): bool

if ($treeNode === null) {
	return false;
}
$leftRes = $this->dfs($treeNode->left, $sum, $targetSum);
$rightRes = $this->dfs($treeNode->right, $sum, $targetSum);
```
				
solution 2: similar to solution 1. the difference is check node's vale instead of node itself `if ($treeNode->val === null)` if node itself is null, node's value must be null. But checking node itself makes more sense.

```
    function dfs(?TreeNode $treeNode, int $sum, int $targetSum): bool

if ($treeNode->val === null) {
		return false;
}
$leftRes = $this->dfs($treeNode->left, $sum, $targetSum);
$rightRes = $this->dfs($treeNode->right, $sum, $targetSum);
```

solution 3: check when calling dfs. The base case only check node's value	treeNode->val. the treeNode don't need to be null.

```
    function dfs(TreeNode $treeNode, int $sum, int $targetSum): bool

if ($treeNode->val === null) {
		return false;
}
if ($treeNode->left) {
		return $this->dfs($treeNode->left, $sum, $targetSum);
}
if ($treeNode->right) {
		return $this->dfs($treeNode->right, $sum, $targetSum);
}
```
