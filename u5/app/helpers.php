<?php

function createIBAN()
{

    $res = '';
    $pre = '01';
    $nums = '0123456789';
    foreach (range(1, 16) as $_) {
        $res .= $nums[(rand(0, 9))];
    }
    $accNum = 'LT ' . $pre . $res;
    return $accNum;

}