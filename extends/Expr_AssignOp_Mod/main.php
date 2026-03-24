<?php

$vul_data = $_GET["user-input"];

// Modulus assignment with two positive integers
$a = 10;
$b = 3;
$a %= $b; // Result should be 1 (10 % 3 is 1)
if ($a === 1) {
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}

// Modulus assignment with a positive and a negative integer
$a = 10;
$b = -3;
$a %= $b; // Result should be 1 (10 % -3 is 1)
if ($a === 1) {
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}

// Modulus assignment where left-hand side is zero
$a = 0;
$b = 10;
$a %= $b; // Result should be 0 (0 % 10 is 0)
if ($a === 0) {
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}

// Modulus assignment with floating-point numbers
$a = 5.5;
$b = 2.2;
$a %= $b; // Result should be 1.1 (5.5 % 2.2 is 1)
if ($a === 1) {
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}

// Modulus assignment with string and integer
$a = "10";
$b = 3;
$a %= $b; // Result should be 1 (string converted to integer before modulus)
if ($a === 1) {
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}

// Modulus assignment with string and float
$a = "7.5";
$b = 2.5;
$a %= $b; // Result should be 0 (string converted to float before modulus, 7.5 % 2.5 is 1)
if ($a === 1) {
    echo "Case 6: " . $vul_data . "\n";
} else {
    echo "Case 6: " . $vul_data . " (false positive)\n";
}
