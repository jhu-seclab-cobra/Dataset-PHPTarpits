<?php

$vul_data = $_GET["user-input"];

// Multiplication assignment with two positive integers
$a = 5;
$b = 3;
$a *= $b; // Result should be 15
if ($a === 15) {
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}

// Multiplication assignment with a positive and a negative integer
$a = 5;
$b = -3;
$a *= $b; // Result should be -15
if ($a === -15) {
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}

// Multiplication assignment where left-hand side is zero
$a = 0;
$b = 10;
$a *= $b; // Result should be 0
if ($a === 0) {
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}

// Multiplication assignment where right-hand side is zero
$a = 10;
$b = 0;
$a *= $b; // Result should be 0
if ($a === 0) {
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}

// Multiplication assignment with floating-point numbers
$a = 2.5;
$b = 4.0;
$a *= $b; // Result should be 10.0
if ($a === 10.0) {
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}

// Multiplication assignment with string and integer
$a = "5";
$b = 3;
$a *= $b; // Result should be 15 (string converted to integer before multiplication)
if ($a === 15) {
    echo "Case 6: " . $vul_data . "\n";
} else {
    echo "Case 6: " . $vul_data . " (false positive)\n";
}

// Multiplication assignment with string and float
$a = "2.5";
$b = 2.0;
$a *= $b; // Result should be 5.0 (string converted to float before multiplication)
if ($a === 5.0) {
    echo "Case 7: " . $vul_data . "\n";
} else {
    echo "Case 7: " . $vul_data . " (false positive)\n";
}
