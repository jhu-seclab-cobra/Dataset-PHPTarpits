<?php

$vul_data = $_GET["user-input"];

// Exponentiation of two positive integers
$left = 2;
$right = 3;
$result = $left ** $right;
if ($result === 8) {
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}

// Exponentiation of a positive integer and zero
$left = 5;
$right = 0;
$result = $left ** $right;
if ($result === 1) {
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}

// Exponentiation of zero and a positive integer
$left = 0;
$right = 5;
$result = $left ** $right;
if ($result === 0) {
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}

// Exponentiation of two negative integers
$left = -2;
$right = -3;
$result = $left ** $right;
if (abs($result + 0.125) < 0.0001) { // -2^-3 = -0.125
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}

// Exponentiation of a negative base and even exponent
$left = -2;
$right = 2;
$result = $left ** $right;
if ($result === 4) {
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}

// Exponentiation with a floating-point base and integer exponent
$left = 2.5;
$right = 3;
$result = $left ** $right;
if (abs($result - 15.625) < 0.0001) {
    echo "Case 6: " . $vul_data . "\n";
} else {
    echo "Case 6: " . $vul_data . " (false positive)\n";
}

// Exponentiation with an integer base and floating-point exponent
$left = 9;
$right = 0.5; // Square root
$result = $left ** $right;
if (abs($result - 3) < 0.0001) {
    echo "Case 7: " . $vul_data . "\n";
} else {
    echo "Case 7: " . $vul_data . " (false positive)\n";
}

// Exponentiation resulting in one
$left = 5;
$right = -1; // 5^-1 = 0.2
$result = $left ** $right;
if (abs($result - 0.2) < 0.0001) {
    echo "Case 8: " . $vul_data . "\n";
} else {
    echo "Case 8: " . $vul_data . " (false positive)\n";
}

// Exponentiation of very large numbers
$left = 2;
$right = 31;
$result = $left ** $right;
if ($result === 2147483648) { // 2^31
    echo "Case 9: " . $vul_data . "\n";
} else {
    echo "Case 9: " . $vul_data . " (false positive)\n";
}

// Exponentiation with zero base and zero exponent
$left = 0;
$right = 0;
$result = $left ** $right;
if ($result === 1) {
    echo "Case 10: " . $vul_data . "\n";
} else {
    echo "Case 10: " . $vul_data . " (false positive)\n";
}
