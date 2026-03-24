<?php

$vul_data = $_GET["user-input"];

// Bitwise AND assignment with two integers
$a = 6;   // 6 in binary is 110
$b = 3;   // 3 in binary is 011
$a &= $b; // Result should be 2 (binary 010)
if ($a === 2) {
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}

// Bitwise AND assignment where the left-hand side is zero
$a = 0;   // 0 in binary is 000
$b = 5;   // 5 in binary is 101
$a &= $b; // Result should be 0 (binary 000)
if ($a === 0) {
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}

// Bitwise AND assignment where the right-hand side is zero
$a = 7;   // 7 in binary is 111
$b = 0;   // 0 in binary is 000
$a &= $b; // Result should be 0 (binary 000)
if ($a === 0) {
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}

// Bitwise AND assignment with negative integers
$a = -1;  // -1 in binary is all bits set (usually represented as 111...111 in two's complement)
$b = 1;   // 1 in binary is 001
$a &= $b; // Result should be 1 (binary 001)
if ($a === 1) {
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}

// Bitwise AND assignment with hexadecimal values
$a = 0xF0; // 0xF0 in binary is 11110000
$b = 0x0F; // 0x0F in binary is 00001111
$a &= $b;  // Result should be 0 (binary 00000000)
if ($a === 0x00) {
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}
