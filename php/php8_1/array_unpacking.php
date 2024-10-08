<?php

$array1 = ["name" => "Alice", "age" => 25];
$array2 = ["city" => "New York", "country" => "USA", 'contact' => ['mobile' => '01700000', 'phone' => '4324324']];
$mergedArray = [...$array1, ...$array2];

print_r($mergedArray);
