<?php

$tainted = $_GET["p1"];
$arr = [$tainted, "safe_data"];

list($a, $b) = $arr;

// TP: $a receives tainted element
echo $a;

// FP: $b receives safe element
echo $b;
