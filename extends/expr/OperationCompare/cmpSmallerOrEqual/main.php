<?php

$vul_data = $_GET["user-input"];

// Less-than-or-equal comparison of two integers where left is smaller
$left = 41;
$right = 42;
$result = $left <= $right;
if ($result === true) {
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}

// Less-than-or-equal comparison of two integers where left is greater
$left = 43;
$right = 42;
$result = $left <= $right;
if ($result === false) {
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}

// Less-than-or-equal comparison of two integers where both are equal
$left = 42;
$right = 42;
$result = $left <= $right;
if ($result === true) {
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}

// Less-than-or-equal comparison of a string and an integer
$left = "100";
$right = 42;
$result = $left <= $right;
if ($result === false) {
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}

// Less-than-or-equal comparison of two strings (lexicographical comparison)
$left = "apple";
$right = "banana";
$result = $left <= $right;
if ($result === true) {
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}

// Less-than-or-equal comparison of a floating-point number and an integer
$left = 41.9;
$right = 42;
$result = $left <= $right;
if ($result === true) {
    echo "Case 6: " . $vul_data . "\n";
} else {
    echo "Case 6: " . $vul_data . " (false positive)\n";
}

// Less-than-or-equal comparison of two floating-point numbers
$left = 42.5;
$right = 42.5;
$result = $left <= $right;
if ($result === true) {
    echo "Case 7: " . $vul_data . "\n";
} else {
    echo "Case 7: " . $vul_data . " (false positive)\n";
}

// Less-than-or-equal comparison where left is a boolean and right is an integer
$left = false; // false is converted to 0
$right = 1;
$result = $left <= $right;
if ($result === true) {
    echo "Case 8: " . $vul_data . "\n";
} else {
    echo "Case 8: " . $vul_data . " (false positive)\n";
}

// Less-than-or-equal comparison where both values are null
$left = null;
$right = null;
$result = $left <= $right;
if ($result === true) {
    echo "Case 9: " . $vul_data . "\n";
} else {
    echo "Case 9: " . $vul_data . " (false positive)\n";
}

// Less-than-or-equal comparison of two arrays with different elements
$left = [1, 2, 3];
$right = [2, 3, 4];
$result = $left <= $right;
if ($result === true) {
    echo "Case 10: " . $vul_data . "\n";
} else {
    echo "Case 10: " . $vul_data . " (false positive)\n";
}
