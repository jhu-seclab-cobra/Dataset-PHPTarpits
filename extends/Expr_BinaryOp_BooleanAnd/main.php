<?php

$vul_data = $_GET["user-input"];

// Boolean AND between two true values
$left = true;
$right = true;
$result = $left && $right;
if ($result === true) {
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}

// Boolean AND between true and false
$left = true;
$right = false;
$result = $left && $right;
if ($result === false) {
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}

// Boolean AND between false and true
$left = false;
$right = true;
$result = $left && $right;
if ($result === false) {
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}

// Boolean AND between two false values
$left = false;
$right = false;
$result = $left && $right;
if ($result === false) {
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}

// Boolean AND with integer zero (false) and non-zero (true)
$left = 0; // false
$right = 42; // true
$result = $left && $right;
if ($result === false) {
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}

// Boolean AND with non-zero (true) and zero (false)
$left = 42; // true
$right = 0; // false
$result = $left && $right;
if ($result === false) {
    echo "Case 6: " . $vul_data . "\n";
} else {
    echo "Case 6: " . $vul_data . " (false positive)\n";
}

// Boolean AND with strings: non-empty (true) and empty (false)
$left = "hello"; // true
$right = ""; // false
$result = $left && $right;
if ($result === false) {
    echo "Case 7: " . $vul_data . "\n";
} else {
    echo "Case 7: " . $vul_data . " (false positive)\n";
}

// Boolean AND with two non-empty strings
$left = "hello"; // true
$right = "world"; // true
$result = $left && $right;
if ($result === true) {
    echo "Case 8: " . $vul_data . "\n";
} else {
    echo "Case 8: " . $vul_data . " (false positive)\n";
}

// Boolean AND with null values
$left = null; // false
$right = true;
$result = $left && $right;
if ($result === false) {
    echo "Case 9: " . $vul_data . "\n";
} else {
    echo "Case 9: " . $vul_data . " (false positive)\n";
}

// Boolean AND with arrays: empty (false) and non-empty (true)
$left = []; // false
$right = [1, 2, 3]; // true
$result = $left && $right;
if ($result === false) {
    echo "Case 10: " . $vul_data . "\n";
} else {
    echo "Case 10: " . $vul_data . " (false positive)\n";
}
