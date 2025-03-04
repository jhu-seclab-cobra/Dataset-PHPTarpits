<?php

$vul_data = $_GET["user-input"];

// Subtraction of two positive integers
$left = 42;
$right = 7;
$result = $left - $right;
if ($result === 35) {
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}

// Subtraction of a positive and a negative integer
$left = 42;
$right = -7;
$result = $left - $right;
if ($result === 49) {
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}

// Subtraction of two negative integers
$left = -42;
$right = -7;
$result = $left - $right;
if ($result === -35) {
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}

// Subtraction with zero as the left operand
$left = 0;
$right = 42;
$result = $left - $right;
if ($result === -42) {
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}

// Subtraction with zero as the right operand
$left = 42;
$right = 0;
$result = $left - $right;
if ($result === 42) {
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}

// Subtraction of two floating-point numbers
$left = 5.25;
$right = 2.5;
$result = $left - $right;
if (abs($result - 2.75) < 0.0001) { // Allowing for floating-point precision error
    echo "Case 6: " . $vul_data . "\n";
} else {
    echo "Case 6: " . $vul_data . " (false positive)\n";
}

// Subtraction of a floating-point number by an integer
$left = 5.25;
$right = 2;
$result = $left - $right;
if (abs($result - 3.25) < 0.0001) {
    echo "Case 7: " . $vul_data . "\n";
} else {
    echo "Case 7: " . $vul_data . " (false positive)\n";
}

// Subtraction of an integer by a floating-point number
$left = 42;
$right = 0.5;
$result = $left - $right;
if (abs($result - 41.5) < 0.0001) {
    echo "Case 8: " . $vul_data . "\n";
} else {
    echo "Case 8: " . $vul_data . " (false positive)\n";
}

// Subtraction resulting in zero
$left = 3;
$right = 3;
$result = $left - $right;
if ($result === 0) {
    echo "Case 9: " . $vul_data . "\n";
} else {
    echo "Case 9: " . $vul_data . " (false positive)\n";
}

// Subtraction of very large numbers
$left = PHP_INT_MAX;
$right = 1;
$result = $left - $right;
if ($result === PHP_INT_MAX - 1) {
    echo "Case 10: " . $vul_data . "\n";
} else {
    echo "Case 10: " . $vul_data . " (false positive)\n";
}
