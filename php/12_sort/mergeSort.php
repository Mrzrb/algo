<?php

    $arr = [1, 5, 8, 6, 7, 9];
    $length = count($arr);

    $p = 0;
    $r = $length - 1;

    $result = $this->mergeSort($arr, $p, $r);

    var_dump($result);


//递归调用,分解数组
function mergeSort(array $arr, $p, $r)
{
    if ($p >= $r) {
        return [$arr[$r]];
    }
    $q = (int)(($p + $r) / 2);

    $left = $this->mergeSort($arr, $p, $q);
    $right = $this->mergeSort($arr, $q + 1, $r);
    return $this->merge($left, $right);
}

//合并
function merge(array $left, array $right)
{
    $tmp = [];

    $i = 0;

    $j = 0;

    $leftLength = count($left);

    $rightLength = count($right);

    do {
        if ($left[$i] <= $right[$j]) {
            $tmp[] = $left[$i++];
        } else {
            $tmp[] = $right[$j++];
        }

    } while ($i < $leftLength && $j < $rightLength);

    $start = $i;
    $end = $leftLength;

    if ($j < $rightLength) {
        $start = $j;
        $end = $rightLength;
    }

    for (; $start < $end; $start++) {
        $tmp[] = $right[$start];
    }

    return $tmp;

}