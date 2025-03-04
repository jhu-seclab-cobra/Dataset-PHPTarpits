<?php

$vul_data = $_GET["user-input"];

// Boolean OR between two true values
$left = true;
$right = true;
$result = $left || $right;
if ($result === true) {
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}

// Boolean OR between true and false
$left = true;
$right = false;
$result = $left || $right;
if ($result === true) {
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}

// Boolean OR between false and true
$left = false;
$right = true;
$result = $left || $right;
if ($result === true) {
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}

// Boolean OR between two false values
$left = false;
$right = false;
$result = $left || $right;
if ($result === false) {
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}

// Boolean OR with integer zero (false) and non-zero (true)
$left = 0; // false
$right = 42; // true
$result = $left || $right;
if ($result === true) {
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}

// Boolean OR with non-zero (true) and zero (false)
$left = 42; // true
$right = 0; // false
$result = $left || $right;
if ($result === true) {
    echo "Case 6: " . $vul_data . "\n";
} else {
    echo "Case 6: " . $vul_data . " (false positive)\n";
}

// Boolean OR with strings: non-empty (true) and empty (false)
$left = "hello"; // true
$right = ""; // false
$result = $left || $right;
if ($result === true) {
    echo "Case 7: " . $vul_data . "\n";
} else {
    echo "Case 7: " . $vul_data . " (false positive)\n";
}

// Boolean OR with two non-empty strings
$left = "hello"; // true
$right = "world"; // true
$result = $left || $right;
if ($result === true) {
    echo "Case 8: " . $vul_data . "\n";
} else {
    echo "Case 8: " . $vul_data . " (false positive)\n";
}

// Boolean OR with null values
$left = null; // false
$right = true;
$result = $left || $right;
if ($result === true) {
    echo "Case 9: " . $vul_data . "\n";
} else {
    echo "Case 9: " . $vul_data . " (false positive)\n";
}

// Boolean OR with arrays: empty (false) and non-empty (true)
$left = []; // false
$right = [1, 2, 3]; // true
$result = $left || $right;
if ($result === true) {
    echo "Case 10: " . $vul_data . "\n";
} else {
    echo "Case 10: " . $vul_data . " (false positive)\n";
}
