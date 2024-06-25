# tree implemention

## code template

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

## how to check if has children?

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
