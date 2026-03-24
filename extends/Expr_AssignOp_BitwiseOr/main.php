<?php

$vul_data = $_GET["user-input"];

// Bitwise OR assignment with two integers
$a = 6;   // 6 in binary is 110
$b = 3;   // 3 in binary is 011
$a |= $b; // Result should be 7 (binary 111)
if ($a === 7) {
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}

// Bitwise OR assignment where the left-hand side is zero
$a = 0;   // 0 in binary is 000
$b = 5;   // 5 in binary is 101
$a |= $b; // Result should be 5 (binary 101)
if ($a === 5) {
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}

// Bitwise OR assignment where the right-hand side is zero
$a = 7;   // 7 in binary is 111
$b = 0;   // 0 in binary is 000
$a |= $b; // Result should be 7 (binary 111)
if ($a === 7) {
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}

// Bitwise OR assignment with negative integers
$a = -1;  // -1 in binary is all bits set (usually represented as 111...111 in two's complement)
$b = 1;   // 1 in binary is 001
$a |= $b; // Result should be -1 (all bits set remains unchanged)
if ($a === -1) {
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}

// Bitwise OR assignment with hexadecimal values
$a = 0xF0; // 0xF0 in binary is 11110000
$b = 0x0F; // 0x0F in binary is 00001111
$a |= $b;  // Result should be 0xFF (binary 11111111)
if ($a === 0xFF) {
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}
