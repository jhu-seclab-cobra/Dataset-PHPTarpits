<?php

$vul_data = $_GET["user-input"];

// Addition assignment with two positive integers
$a = 5;
$b = 3;
$a += $b; // Result should be 8
if ($a === 8) {
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}

// Addition assignment with a positive and a negative integer
$a = 5;
$b = -3;
$a += $b; // Result should be 2
if ($a === 2) {
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}

// Addition assignment where left-hand side is zero
$a = 0;
$b = 10;
$a += $b; // Result should be 10
if ($a === 10) {
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}

// Addition assignment where right-hand side is zero
$a = 10;
$b = 0;
$a += $b; // Result should be 10
if ($a === 10) {
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}

// Addition assignment with floating-point numbers
$a = 1.5;
$b = 2.3;
$a += $b; // Result should be 3.8
if ($a === 3.8) {
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}

// Addition assignment with string and integer
$a = "5";
$b = 3;
$a += $b; // Result should be 8 (string converted to integer and added)
if ($a === 8) {
    echo "Case 6: " . $vul_data . "\n";
} else {
    echo "Case 6: " . $vul_data . " (false positive)\n";
}

// Addition assignment with string and float
$a = "2.5";
$b = 1.5;
$a += $b; // Result should be 4.0 (string converted to float and added)
if ($a === 4.0) {
    echo "Case 7: " . $vul_data . "\n";
} else {
    echo "Case 7: " . $vul_data . " (false positive)\n";
}
