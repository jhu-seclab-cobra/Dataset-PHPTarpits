<?php

$vul_data = $_GET["user-input"];

// Left shift a positive integer
$value = 5; // 00000101
$shift = 1;
$result = $value << $shift;
if ($result === 10) { // 00001010
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}

// Left shift a positive integer by multiple positions
$value = 5; // 00000101
$shift = 3;
$result = $value << $shift;
if ($result === 40) { // 00101000
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}

// Left shift zero
$value = 0; // 00000000
$shift = 5;
$result = $value << $shift;
if ($result === 0) { // 00000000
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}

// Left shift a negative integer
$value = -5; // 11111011
$shift = 1;
$result = $value << $shift;
if ($result === -10) { // 11110110
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}

// Left shift a large integer
$value = PHP_INT_MAX >> 1; // Half of max integer
$shift = 1;
$result = $value << $shift;
if ($result === PHP_INT_MAX - 1) {
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}

// Left shift with a shift value of zero
$value = 5; // 00000101
$shift = 0;
$result = $value << $shift;
if ($result === 5) { // 00000101
    echo "Case 6: " . $vul_data . "\n";
} else {
    echo "Case 6: " . $vul_data . " (false positive)\n";
}

// Left shift a float, treated as integer
$value = 5.75; // Treated as 5 (00000101)
$shift = 1;
$result = $value << $shift;
if ($result === 10) { // 00001010
    echo "Case 7: " . $vul_data . "\n";
} else {
    echo "Case 7: " . $vul_data . " (false positive)\n";
}

// Left shift a string numeric value, treated as integer
$value = "5"; // Treated as 5 (00000101)
$shift = 1;
$result = $value << $shift;
if ($result === 10) { // 00001010
    echo "Case 8: " . $vul_data . "\n";
} else {
    echo "Case 8: " . $vul_data . " (false positive)\n";
}
