<?php

$vul_data = $_GET["user-input"];

// Bitwise OR between two positive integers
$left = 42; // 00101010
$right = 15; // 00001111
$result = $left | $right;
if ($result === 47) { // 00101111
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}

// Bitwise OR between positive and negative integers
$left = 42; // 00101010
$right = -15; // 11110001
$result = $left | $right;
if ($result === -5) { // 11111011
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}

// Bitwise OR between two negative integers
$left = -42; // 11010110
$right = -15; // 11110001
$result = $left | $right;
if ($result === -9) { // 11110111
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}

// Bitwise OR between integer and zero
$left = 42; // 00101010
$right = 0; // 00000000
$result = $left | $right;
if ($result === 42) { // 00101010
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}

// Bitwise OR between zero and zero
$left = 0; // 00000000
$right = 0; // 00000000
$result = $left | $right;
if ($result === 0) { // 00000000
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}

// Bitwise OR between a positive float and an integer
$left = 42.5; // Treated as 42 (00101010)
$right = 15; // 00001111
$result = $left | $right;
if ($result === 47) { // 00101111
    echo "Case 6: " . $vul_data . "\n";
} else {
    echo "Case 6: " . $vul_data . " (false positive)\n";
}

// Bitwise OR between a string numeric value and an integer
$left = "42"; // 00101010
$right = 15; // 00001111
$result = $left | $right;
if ($result === 47) { // 00101111
    echo "Case 7: " . $vul_data . "\n";
} else {
    echo "Case 7: " . $vul_data . " (false positive)\n";
}

// Bitwise OR between two boolean values
$left = true; // 00000001
$right = false; // 00000000
$result = $left | $right;
if ($result === 1) { // 00000001
    echo "Case 8: " . $vul_data . "\n";
} else {
    echo "Case 8: " . $vul_data . " (false positive)\n";
}

// Bitwise OR between null and an integer
$left = null; // 00000000
$right = 15; // 00001111
$result = $left | $right;
if ($result === 15) { // 00001111
    echo "Case 9: " . $vul_data . "\n";
} else {
    echo "Case 9: " . $vul_data . " (false positive)\n";
}
