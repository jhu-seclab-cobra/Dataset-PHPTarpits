<?php

$vul_data = $_GET["user-input"];

// Right shift assignment with a positive integer
$a = 12;  // 12 in binary is 1100
$b = 2;   // Shift right by 2 bits
$a >>= $b; // Result should be 3 (binary 11)
if ($a === 3) {
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}

// Right shift assignment where left-hand side is zero
$a = 0;   // 0 in binary is 0000
$b = 3;   // Shift right by 3 bits
$a >>= $b; // Result should be 0 (binary 0000)
if ($a === 0) {
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}

// Right shift assignment where right-hand side is zero
$a = 5;   // 5 in binary is 101
$b = 0;   // No shift
$a >>= $b; // Result should be 5 (binary 101)
if ($a === 5) {
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}

// Right shift assignment with a large shift
$a = 1024;  // 1024 in binary is 10000000000
$b = 10;    // Shift right by 10 bits
$a >>= $b; // Result should be 1 (binary 1)
if ($a === 1) {
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}

// Right shift assignment with a negative number
$a = -4;  // -4 in binary (two's complement) is 11111111111111111111111111111100
$b = 1;   // Shift right by 1 bit
$a >>= $b; // Result should be -2 (binary 11111111111111111111111111111110)
if ($a === -2) {
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}

// Right shift assignment with hexadecimal values
$a = 0xF0; // 0xF0 in binary is 11110000
$b = 4;    // Shift right by 4 bits
$a >>= $b; // Result should be 0x0F (binary 00001111)
if ($a === 0x0F) {
    echo "Case 6: " . $vul_data . "\n";
} else {
    echo "Case 6: " . $vul_data . " (false positive)\n";
}
