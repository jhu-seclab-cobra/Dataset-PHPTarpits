<?php

$vul_data = $_GET["user-input"];

// Multiplication of two positive integers
$left = 6;
$right = 7;
$result = $left * $right;
if ($result === 42) {
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}

// Multiplication of a positive and a negative integer
$left = 6;
$right = -7;
$result = $left * $right;
if ($result === -42) {
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}

// Multiplication of two negative integers
$left = -6;
$right = -7;
$result = $left * $right;
if ($result === 42) {
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}

// Multiplication with zero as the left operand
$left = 0;
$right = 42;
$result = $left * $right;
if ($result === 0) {
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}

// Multiplication with zero as the right operand
$left = 42;
$right = 0;
$result = $left * $right;
if ($result === 0) {
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}

// Multiplication of two floating-point numbers
$left = 2.5;
$right = 4.2;
$result = $left * $right;
if (abs($result - 10.5) < 0.0001) { // Allowing for floating-point precision error
    echo "Case 6: " . $vul_data . "\n";
} else {
    echo "Case 6: " . $vul_data . " (false positive)\n";
}

// Multiplication of a floating-point number by an integer
$left = 5.25;
$right = 2;
$result = $left * $right;
if (abs($result - 10.5) < 0.0001) {
    echo "Case 7: " . $vul_data . "\n";
} else {
    echo "Case 7: " . $vul_data . " (false positive)\n";
}

// Multiplication of an integer by a floating-point number
$left = 42;
$right = 0.5;
$result = $left * $right;
if ($result === 21.0) {
    echo "Case 8: " . $vul_data . "\n";
} else {
    echo "Case 8: " . $vul_data . " (false positive)\n";
}

// Multiplication resulting in one
$left = 1;
$right = 1;
$result = $left * $right;
if ($result === 1) {
    echo "Case 9: " . $vul_data . "\n";
} else {
    echo "Case 9: " . $vul_data . " (false positive)\n";
}

// Multiplication of very large numbers
$left = PHP_INT_MAX;
$right = 2;
$result = $left * $right;
if ($result === PHP_INT_MAX * 2) {
    echo "Case 10: " . $vul_data . "\n";
} else {
    echo "Case 10: " . $vul_data . " (false positive)\n";
}
