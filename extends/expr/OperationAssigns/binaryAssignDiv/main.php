<?php

$vul_data = $_GET["user-input"];

// Division assignment with two positive integers
$a = 10;
$b = 2;
$a /= $b; // Result should be 5
if ($a === 5) {
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}

// Division assignment with a positive and a negative integer
$a = 10;
$b = -2;
$a /= $b; // Result should be -5
if ($a === -5) {
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}

// Division assignment where left-hand side is zero
$a = 0;
$b = 10;
$a /= $b; // Result should be 0
if ($a === 0) {
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}

// Division assignment with floating-point numbers
$a = 5.5;
$b = 2.2;
$a /= $b; // Result should be 2.5
if ($a === 2.5) {
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}

// Division assignment with string and integer
$a = "10";
$b = 2;
$a /= $b; // Result should be 5 (string converted to integer before division)
if ($a === 5) {
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}

// Division assignment with string and float
$a = "7.5";
$b = 2.5;
$a /= $b; // Result should be 3.0 (string converted to float before division)
if ($a === 3.0) {
    echo "Case 6: " . $vul_data . "\n";
} else {
    echo "Case 6: " . $vul_data . " (false positive)\n";
}
