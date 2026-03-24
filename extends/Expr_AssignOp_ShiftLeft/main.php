<?php

$vul_data = $_GET["user-input"];

// Left shift assignment with a positive integer
$a = 3;   // 3 in binary is 11
$b = 2;   // Shift left by 2 bits
$a <<= $b; // Result should be 12 (binary 1100)
if ($a === 12) {
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}

// Left shift assignment where left-hand side is zero
$a = 0;   // 0 in binary is 0000
$b = 3;   // Shift left by 3 bits
$a <<= $b; // Result should be 0 (binary 0000)
if ($a === 0) {
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}

// Left shift assignment where right-hand side is zero
$a = 5;   // 5 in binary is 101
$b = 0;   // No shift
$a <<= $b; // Result should be 5 (binary 101)
if ($a === 5) {
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}

// Left shift assignment with a large shift
$a = 1;   // 1 in binary is 1
$b = 10;  // Shift left by 10 bits
$a <<= $b; // Result should be 1024 (binary 10000000000)
if ($a === 1024) {
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}

// Left shift assignment with a negative number
$a = -2;  // -2 in binary (two's complement) is 11111111111111111111111111111110
$b = 1;   // Shift left by 1 bit
$a <<= $b; // Result should be -4 (binary 11111111111111111111111111111100)
if ($a === -4) {
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}

// Left shift assignment with hexadecimal values
$a = 0xF; // 0xF in binary is 1111
$b = 4;   // Shift left by 4 bits
$a <<= $b; // Result should be 0xF0 (binary 11110000)
if ($a === 0xF0) {
    echo "Case 6: " . $vul_data . "\n";
} else {
    echo "Case 6: " . $vul_data . " (false positive)\n";
}
