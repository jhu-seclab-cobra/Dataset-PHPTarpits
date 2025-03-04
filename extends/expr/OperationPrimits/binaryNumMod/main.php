<?php

$vul_data = $_GET["user-input"];

// Modulus of two positive integers
$left = 42;
$right = 5;
$result = $left % $right;
if ($result === 2) {
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}

// Modulus of a positive and a negative integer
$left = 42;
$right = -5;
$result = $left % $right;
if ($result === 2) {
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}

// Modulus of two negative integers
$left = -42;
$right = -5;
$result = $left % $right;
if ($result === -2) {
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}

// Modulus of zero and a positive integer
$left = 0;
$right = 42;
$result = $left % $right;
if ($result === 0) {
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}

// Modulus of a floating-point number by an integer
$left = 5.25;
$right = 2;
$result = $left % $right;
if ($result == 1) {
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}

// Modulus resulting in zero
$left = 10;
$right = 5;
$result = $left % $right;
if ($result === 0) {
    echo "Case 6: " . $vul_data . "\n";
} else {
    echo "Case 6: " . $vul_data . " (false positive)\n";
}

// Modulus with very large numbers
$left = PHP_INT_MAX;
$right = 123456;
$result = $left % $right;
if ($result === PHP_INT_MAX % 123456) {
    echo "Case 7: " . $vul_data . "\n";
} else {
    echo "Case 7: " . $vul_data . " (false positive)\n";
}

// Modulus with negative result
$left = -7;
$right = 3;
$result = $left % $right;
if ($result === -1) {
    echo "Case 8: " . $vul_data . "\n";
} else {
    echo "Case 8: " . $vul_data . " (false positive)\n";
}
