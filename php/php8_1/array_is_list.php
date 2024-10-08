<?php

$list = [1, 2, 3];
$assocArray = ['a' => 1, 'b' => 2];

var_dump(array_is_list($list)); // Output: bool(true)
var_dump(array_is_list($assocArray)); // Output: bool(false)
