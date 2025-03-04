<?php

$vul_data = $_GET["user-input"];

// Division of two positive integers
$left = 42;
$right = 7;
$result = $left / $right;
if ($result === 6) {
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}

// Division of a positive and a negative integer
$left = 42;
$right = -7;
$result = $left / $right;
if ($result === -6) {
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}

// Division of two negative integers
$left = -42;
$right = -7;
$result = $left / $right;
if ($result === 6) {
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}

// Division of a zero by a positive integer
$left = 0;
$right = 42;
$result = $left / $right;
if ($result === 0) {
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}

// Division of two floating-point numbers
$left = 5.25;
$right = 2.5;
$result = $left / $right;
if (abs($result - 2.1) < 0.0001) { // Allowing for floating-point precision error
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}

// Division of a floating-point number by an integer
$left = 5.25;
$right = 2;
$result = $left / $right;
if (abs($result - 2.625) < 0.0001) {
    echo "Case 6: " . $vul_data . "\n";
} else {
    echo "Case 6: " . $vul_data . " (false positive)\n";
}

// Division of an integer by a floating-point number
$left = 42;
$right = 0.5;
$result = $left / $right;
if ($result === 84.0) {
    echo "Case 7: " . $vul_data . "\n";
} else {
    echo "Case 7: " . $vul_data . " (false positive)\n";
}

// Division resulting in a fraction
$left = 1;
$right = 3;
$result = $left / $right;
if (abs($result - 0.3333) < 0.0001) {
    echo "Case 8: " . $vul_data . "\n";
} else {
    echo "Case 8: " . $vul_data . " (false positive)\n";
}

// Division of very large numbers
$left = PHP_INT_MAX;
$right = 2;
$result = $left / $right;
if ($result === PHP_INT_MAX / 2) {
    echo "Case 9: " . $vul_data . "\n";
} else {
    echo "Case 9: " . $vul_data . " (false positive)\n";
}
