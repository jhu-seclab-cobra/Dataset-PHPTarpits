<?php

$vul_data = $_GET["user-input"];

// Inequality comparison of two identical integers
$left = 42;
$right = 42;
$result = $left != $right;
if ($result === false) {
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}

// Inequality comparison of two different integers
$left = 42;
$right = 43;
$result = $left != $right;
if ($result === true) {
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}

// Inequality comparison of an integer and a string with the same numeric value
$left = 42;
$right = "42";
$result = $left != $right;
if ($result === false) {
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}

// Inequality comparison of two different strings
$left = "hello";
$right = "world";
$result = $left != $right;
if ($result === true) {
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}

// Inequality comparison of two identical strings
$left = "hello";
$right = "hello";
$result = $left != $right;
if ($result === false) {
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}

// Inequality comparison of a string and an integer (non-numeric string)
$left = "42";
$right = 42;
$result = $left != $right;
if ($result === false) {
    echo "Case 6: " . $vul_data . "\n";
} else {
    echo "Case 6: " . $vul_data . " (false positive)\n";
}

// Inequality comparison of boolean true and integer 1
$left = true;
$right = 1;
$result = $left != $right;
if ($result === false) {
    echo "Case 7: " . $vul_data . "\n";
} else {
    echo "Case 7: " . $vul_data . " (false positive)\n";
}

// Inequality comparison of null with an empty string
$left = null;
$right = "";
$result = $left != $right;
if ($result === false) {
    echo "Case 8: " . $vul_data . "\n";
} else {
    echo "Case 8: " . $vul_data . " (false positive)\n";
}

// Inequality comparison of two null values
$left = null;
$right = null;
$result = $left != $right;
if ($result === false) {
    echo "Case 9: " . $vul_data . "\n";
} else {
    echo "Case 9: " . $vul_data . " (false positive)\n";
}

// Inequality comparison of two arrays with identical elements
$left = [1, 2, 3];
$right = [1, 2, 3];
$result = $left != $right;
if ($result === false) {
    echo "Case 10: " . $vul_data . "\n";
} else {
    echo "Case 10: " . $vul_data . " (false positive)\n";
}

// Inequality comparison of two arrays with different elements
$left = [1, 2, 3];
$right = [1, 2, 4];
$result = $left != $right;
if ($result === true) {
    echo "Case 11: " . $vul_data . "\n";
} else {
    echo "Case 11: " . $vul_data . " (false positive)\n";
}
