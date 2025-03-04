<?php

$vul_data = $_GET["user-input"];

// Null coalesce with a non-null left value
$left = 42;
$right = 0;
$result = $left ?? $right;
if ($result === 42) {
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}

// Null coalesce with a null left value
$left = null;
$right = 42;
$result = $left ?? $right;
if ($result === 42) {
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}

// Null coalesce with both null values
$left = null;
$right = null;
$result = $left ?? $right;
if ($result === null) {
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}

// Null coalesce with empty string (non-null left value)
$left = "";
$right = "default";
$result = $left ?? $right;
if ($result === "") {
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}

// Null coalesce with boolean false (non-null left value)
$left = false;
$right = true;
$result = $left ?? $right;
if ($result === false) {
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}

// Null coalesce with zero integer (non-null left value)
$left = 0;
$right = 100;
$result = $left ?? $right;
if ($result === 0) {
    echo "Case 6: " . $vul_data . "\n";
} else {
    echo "Case 6: " . $vul_data . " (false positive)\n";
}

// Null coalesce with array
$left = null;
$right = [1, 2, 3];
$result = $left ?? $right;
if ($result === [1, 2, 3]) {
    echo "Case 7: " . $vul_data . "\n";
} else {
    echo "Case 7: " . $vul_data . " (false positive)\n";
}

// Null coalesce with object
class Test
{
}

$left = new Test();
$right = null;
$result = $left ?? $right;
if ($result instanceof Test) {
    echo "Case 8: " . $vul_data . "\n";
} else {
    echo "Case 8: " . $vul_data . " (false positive)\n";
}

// Null coalesce with non-null string
$left = "Hello, World!";
$right = "Fallback";
$result = $left ?? $right;
if ($result === "Hello, World!") {
    echo "Case 9: " . $vul_data . "\n";
} else {
    echo "Case 9: " . $vul_data . " (false positive)\n";
}

// Null coalesce in an undefined variable context
// Suppress error reporting to handle undefined variable
error_reporting(E_ERROR | E_PARSE);
$result = $undefinedVariable ?? "default";
if ($result === "default") {
    echo "Case 10: " . $vul_data . "\n";
} else {
    echo "Case 10: " . $vul_data . " (false positive)\n";
}
