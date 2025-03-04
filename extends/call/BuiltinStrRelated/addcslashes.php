<?php

function test_case_2()
{
    echo "wrong result\n";
}
function test_case_5()
{
    echo "correct result\n";
}

$a = "Hello, world";
$b = addcslashes($a, "a..zA..Z");
$c = "\H\\e\l\l\o, \w\o\\r\l\d";
$d = 2;
if ($b == $c) {
    $d = 5;
}
$action = 'test_case_'.($d);
$action();
