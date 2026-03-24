<?php

$vul_data = $_GET["user-input"];


// Positive integer bitwise NOT
$value = 42;
$result = ~$value;
if ($result === -43) {
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}


// Negative integer bitwise NOT
$value = -42;
$result = ~$value;
if ($result === 41) {
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}


// Zero bitwise NOT
$value = 0;
$result = ~$value;
if ($result === -1) {
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}


// Maximum integer bitwise NOT
$value = PHP_INT_MAX;
$result = ~$value;
if ($result === ~PHP_INT_MAX) {
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}


// Minimum integer bitwise NOT
$value = -PHP_INT_MAX - 1;
$result = ~$value;
if ($result === PHP_INT_MAX) {
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}
