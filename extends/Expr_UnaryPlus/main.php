<?php

$vul_data = $_GET["user-input"];

// Positive integer
$value = 42;
$result = +$value;
if ($result === 42) {
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}

// Negative integer
$value = -42;
$result = +$value;
if ($result === -42) {
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}

// Zero
$value = 0;
$result = +$value;
if ($result === 0) {
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}

// Positive float
$value = 3.14;
$result = +$value;
if ($result === 3.14) {
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}

// Negative float
$value = -3.14;
$result = +$value;
if ($result === -3.14) {
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}

// String numeric value
$value = "42";
$result = +$value;
if ($result === 42) {
    echo "Case 6: " . $vul_data . "\n";
} else {
    echo "Case 6: " . $vul_data . " (false positive)\n";
}

// Boolean true
$value = true;
$result = +$value;
if ($result === 1) {
    echo "Case 7: " . $vul_data . "\n";
} else {
    echo "Case 7: " . $vul_data . " (false positive)\n";
}

// Boolean false
$value = false;
$result = +$value;
if ($result === 0) {
    echo "Case 8: " . $vul_data . "\n";
} else {
    echo "Case 8: " . $vul_data . " (false positive)\n";
}

// NULL
$value = null;
$result = +$value;
if ($result === 0) {
    echo "Case 9: " . $vul_data . "\n";
} else {
    echo "Case 9: " . $vul_data . " (false positive)\n";
}
