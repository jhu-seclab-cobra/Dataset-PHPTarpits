<?php

$vul_data = $_GET["user-input"];

// Power assignment with two positive integers
$a = 2;
$b = 3;
$a **= $b; // Result should be 8 (2^3)
if ($a === 8) {
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}

// Power assignment with a positive and a negative integer
$a = 2;
$b = -2;
$a **= $b; // Result should be 0.25 (2^-2)
if ($a === 0.25) {
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}

// Power assignment where left-hand side is zero
$a = 0;
$b = 5;
$a **= $b; // Result should be 0 (0^5)
if ($a === 0) {
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}

// Power assignment where right-hand side is zero
$a = 5;
$b = 0;
$a **= $b; // Result should be 1 (5^0)
if ($a === 1) {
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}

// Power assignment with floating-point numbers
$a = 2.5;
$b = 2;
$a **= $b; // Result should be 6.25 (2.5^2)
if ($a === 6.25) {
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}

// Power assignment with string and integer
$a = "3";
$b = 2;
$a **= $b; // Result should be 9 (string converted to integer before exponentiation)
if ($a === 9) {
    echo "Case 6: " . $vul_data . "\n";
} else {
    echo "Case 6: " . $vul_data . " (false positive)\n";
}

// Power assignment with string and float
$a = "2.5";
$b = 2;
$a **= $b; // Result should be 6.25 (string converted to float before exponentiation)
if ($a === 6.25) {
    echo "Case 7: " . $vul_data . "\n";
} else {
    echo "Case 7: " . $vul_data . " (false positive)\n";
}
