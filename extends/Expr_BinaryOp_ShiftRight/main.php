<?php

$vul_data = $_GET["user-input"];

// Right shift a positive integer
$value = 20; // 00010100
$shift = 1;
$result = $value >> $shift;
if ($result === 10) { // 00001010
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}

// Right shift a positive integer by multiple positions
$value = 20; // 00010100
$shift = 2;
$result = $value >> $shift;
if ($result === 5) { // 00000101
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}

// Right shift zero
$value = 0; // 00000000
$shift = 3;
$result = $value >> $shift;
if ($result === 0) { // 00000000
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}

// Right shift a negative integer
$value = -20; // 11101100
$shift = 1;
$result = $value >> $shift;
if ($result === -10) { // 11110110
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}

// Right shift a large integer
$value = PHP_INT_MAX;
$shift = 1;
$result = $value >> $shift;
if ($result === (PHP_INT_MAX >> 1)) {
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}

// Right shift with a shift value of zero
$value = 20; // 00010100
$shift = 0;
$result = $value >> $shift;
if ($result === 20) { // 00010100
    echo "Case 6: " . $vul_data . "\n";
} else {
    echo "Case 6: " . $vul_data . " (false positive)\n";
}

// Right shift a float, treated as integer
$value = 20.75; // Treated as 20 (00010100)
$shift = 1;
$result = $value >> $shift;
if ($result === 10) { // 00001010
    echo "Case 7: " . $vul_data . "\n";
} else {
    echo "Case 7: " . $vul_data . " (false positive)\n";
}

// Right shift a string numeric value, treated as integer
$value = "20"; // Treated as 20 (00010100)
$shift = 1;
$result = $value >> $shift;
if ($result === 10) { // 00001010
    echo "Case 8: " . $vul_data . "\n";
} else {
    echo "Case 8: " . $vul_data . " (false positive)\n";
}
