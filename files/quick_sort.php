<?php
class QuickSort {
    public function quickSortFunc(array &$arr, int $begin, int $end): void
    {
        if ($begin >= $end) return;
        $pivot = $this->partition($arr, $begin, $end);
        $this->quickSortFunc($arr, 0, $pivot - 1);
        $this->quickSortFunc($arr, $pivot + 1, $end);
    }

    private function partition(array &$arr, int $begin, int $end): int
    {
        $pivot = $end;
        $counter = $begin;
        for ($i = $begin; $i <= $end - 1; $i++) {
            if ($arr[$i] < $arr[$pivot]) {
                $tmp = $arr[$i];
                $arr[$i] = $arr[$counter];
                $arr[$counter] = $tmp;
                $counter++;
            }
        }
        $tmp = $arr[$pivot];
        $arr[$pivot] = $arr[$counter];
        $arr[$counter] = $tmp;

        return $counter;
    }
}

$quickSort = new QuickSort();
$arr = [10, 80, 30, 90, 40, 50, 70];
$quickSort->quickSortFunc($arr, 0, count($arr) - 1);
var_dump($arr);

