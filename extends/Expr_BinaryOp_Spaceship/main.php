<?php

$vul_data = $_GET["user-input"];

// Spaceship comparison of two equal integers
$left = 42;
$right = 42;
$result = $left <=> $right;
if ($result === 0) {
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}

// Spaceship comparison where left integer is less than right integer
$left = 41;
$right = 42;
$result = $left <=> $right;
if ($result === -1) {
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}

// Spaceship comparison where left integer is greater than right integer
$left = 43;
$right = 42;
$result = $left <=> $right;
if ($result === 1) {
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}

// Spaceship comparison of two equal strings
$left = "hello";
$right = "hello";
$result = $left <=> $right;
if ($result === 0) {
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}

// Spaceship comparison where left string is less than right string
$left = "apple";
$right = "banana";
$result = $left <=> $right;
if ($result === -1) {
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}

// Spaceship comparison where left string is greater than right string
$left = "banana";
$right = "apple";
$result = $left <=> $right;
if ($result === 1) {
    echo "Case 6: " . $vul_data . "\n";
} else {
    echo "Case 6: " . $vul_data . " (false positive)\n";
}

// Spaceship comparison of a number and a string that can be converted to the same number
$left = 42;
$right = "42";
$result = $left <=> $right;
if ($result === 0) {
    echo "Case 7: " . $vul_data . "\n";
} else {
    echo "Case 7: " . $vul_data . " (false positive)\n";
}

// Spaceship comparison of a floating-point number and an integer
$left = 42.0;
$right = 42;
$result = $left <=> $right;
if ($result === 0) {
    echo "Case 8: " . $vul_data . "\n";
} else {
    echo "Case 8: " . $vul_data . " (false positive)\n";
}

// Spaceship comparison where left floating-point number is less than right integer
$left = 41.9;
$right = 42;
$result = $left <=> $right;
if ($result === -1) {
    echo "Case 9: " . $vul_data . "\n";
} else {
    echo "Case 9: " . $vul_data . " (false positive)\n";
}

// Spaceship comparison of two arrays with identical elements
$left = [1, 2, 3];
$right = [1, 2, 3];
$result = $left <=> $right;
if ($result === 0) {
    echo "Case 10: " . $vul_data . "\n";
} else {
    echo "Case 10: " . $vul_data . " (false positive)\n";
}

// Spaceship comparison of two arrays where the left array is "less than" the right array
$left = [1, 2, 3];
$right = [1, 2, 4];
$result = $left <=> $right;
if ($result === -1) {
    echo "Case 11: " . $vul_data . "\n";
} else {
    echo "Case 11: " . $vul_data . " (false positive)\n";
}

// Spaceship comparison of two arrays where the left array is "greater than" the right array
$left = [1, 2, 4];
$right = [1, 2, 3];
$result = $left <=> $right;
if ($result === 1) {
    echo "Case 12: " . $vul_data . "\n";
} else {
    echo "Case 12: " . $vul_data . " (false positive)\n";
}
