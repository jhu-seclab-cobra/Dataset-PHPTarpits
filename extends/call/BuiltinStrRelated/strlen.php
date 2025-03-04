<?php

function test_case_2()
{
    echo "binary divide works for integer values evenly divisible\n";
}
function test_case_5()
{
    echo "binary divide works for integer values not evenly divisible\n";
}
function test_case_7()
{
    echo "binary divide works for floats evenly divisible\n";
}
function test_case_66()
{
    echo "binary divide works for floats not evenly divisible\n";
}
function test_case_75()
{
    echo "binary divide works for integer and float\n";
}

$a = "sdfsa";
$action = 'test_case_'.(strlen($a));
$action();
