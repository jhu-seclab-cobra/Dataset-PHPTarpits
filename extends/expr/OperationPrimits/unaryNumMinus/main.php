<?php

$vul_data = $_GET["user-input"];

// Positive integer negation
$value = 42;
$result = -$value;
if ($result === -42) {
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}

// Negative integer negation
$value = -42;
$result = -$value;
if ($result === 42) {
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}

// Zero negation
$value = 0;
$result = -$value;
if ($result === 0) {
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}

// Positive float negation
$value = 3.14;
$result = -$value;
if ($result === -3.14) {
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}

// Negative float negation
$value = -3.14;
$result = -$value;
if ($result === 3.14) {
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}

// String numeric value negation
$value = "42";
$result = -$value;
if ($result === -42) {
    echo "Case 6: " . $vul_data . "\n";
} else {
    echo "Case 6: " . $vul_data . " (false positive)\n";
}

// Boolean true negation
$value = true;
$result = -$value;
if ($result === -1) {
    echo "Case 7: " . $vul_data . "\n";
} else {
    echo "Case 7: " . $vul_data . " (false positive)\n";
}

// Boolean false negation
$value = false;
$result = -$value;
if ($result === 0) {
    echo "Case 8: " . $vul_data . "\n";
} else {
    echo "Case 8: " . $vul_data . " (false positive)\n";
}

// NULL negation
$value = null;
$result = -$value;
if ($result === 0) {
    echo "Case 9: " . $vul_data . "\n";
} else {
    echo "Case 9: " . $vul_data . " (false positive)\n";
}
