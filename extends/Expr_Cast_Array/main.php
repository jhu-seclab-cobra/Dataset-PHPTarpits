<?php

$vul_data = $_GET["user-input"];

// Integer to array conversion
$value = 42;
$result = (array)$value;
if ($result === [0 => 42]) {
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}

// Float to array conversion
$value = 3.14;
$result = (array)$value;
if ($result === [0 => 3.14]) {
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}

// Boolean true to array conversion
$value = true;
$result = (array)$value;
if ($result === [0 => true]) {
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}

// Boolean false to array conversion
$value = false;
$result = (array)$value;
if ($result === [0 => false]) {
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}

// NULL to array conversion
$value = null;
$result = (array)$value;
if ($result === []) {
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}

// Array to array conversion (should be the same array)
$value = [1, 2, 3];
$result = (array)$value;
if ($result === $value) {
    echo "Case 6: " . $vul_data . "\n";
} else {
    echo "Case 6: " . $vul_data . " (false positive)\n";
}

// String to array conversion
$value = "hello";
$result = (array)$value;
if ($result === [0 => "hello"]) {
    echo "Case 7: " . $vul_data . "\n";
} else {
    echo "Case 7: " . $vul_data . " (false positive)\n";
}

// Empty string to array conversion
$value = "";
$result = (array)$value;
if ($result === [0 => ""]) {
    echo "Case 8: " . $vul_data . "\n";
} else {
    echo "Case 8: " . $vul_data . " (false positive)\n";
}

// Object to array conversion
$value = new stdClass();
$value->property = "value";
$result = (array)$value;
if (isset($result['property']) && $result['property'] === "value") {
    echo "Case 9: " . $vul_data . "\n";
} else {
    echo "Case 9: " . $vul_data . " (false positive)\n";
}

// Empty object to array conversion
$value = new stdClass();
$result = (array)$value;
if ($result === []) {
    echo "Case 10: " . $vul_data . "\n";
} else {
    echo "Case 10: " . $vul_data . " (false positive)\n";
}
