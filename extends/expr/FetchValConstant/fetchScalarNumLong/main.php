<?php

$vul_data = $_GET["user-input"];

// Decimal number
$decimal = 42;
if ($decimal === 42) {
    echo "Case 1 (Decimal): " . $vul_data . "\n";
} else {
    echo "Case 1 (Decimal): " . $vul_data . " (false positive)\n";
}

// Hexadecimal number
$hexadecimal = 0x2A; // 0x2A is 42 in decimal
if ($hexadecimal === 42) {
    echo "Case 2 (Hexadecimal): " . $vul_data . "\n";
} else {
    echo "Case 2 (Hexadecimal): " . $vul_data . " (false positive)\n";
}

// Octal number
$octal = 052; // 052 is 42 in decimal
if ($octal === 42) {
    echo "Case 3 (Octal): " . $vul_data . "\n";
} else {
    echo "Case 3 (Octal): " . $vul_data . " (false positive)\n";
}

// Binary number
$binary = 0b101010; // 0b101010 is 42 in decimal
if ($binary === 42) {
    echo "Case 4 (Binary): " . $vul_data . "\n";
} else {
    echo "Case 4 (Binary): " . $vul_data . " (false positive)\n";
}

// Negative decimal number
$negative_decimal = -42;
if ($negative_decimal === -42) {
    echo "Case 5 (Negative Decimal): " . $vul_data . "\n";
} else {
    echo "Case 5 (Negative Decimal): " . $vul_data . " (false positive)\n";
}

// Large integer value
$large_int = 9223372036854775807; // Max value for a 64-bit signed integer
if ($large_int === 9223372036854775807) {
    echo "Case 6 (Large Integer): " . $vul_data . "\n";
} else {
    echo "Case 6 (Large Integer): " . $vul_data . " (false positive)\n";
}

// Octal number with leading zeros
$octal_leading_zeros = 00052; // 052 is 42 in decimal, leading zeros should be ignored
if ($octal_leading_zeros === 42) {
    echo "Case 7 (Octal Leading Zeros): " . $vul_data . "\n";
} else {
    echo "Case 7 (Octal Leading Zeros): " . $vul_data . " (false positive)\n";
}
