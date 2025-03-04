<?php

$vul_data = $_GET["user-input"];

// Integer to object conversion
$value = 42;
$result = (object)$value;
if (isset($result->scalar) && $result->scalar === 42) {
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}

// Float to object conversion
$value = 3.14;
$result = (object)$value;
if (isset($result->scalar) && $result->scalar === 3.14) {
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}

// Boolean true to object conversion
$value = true;
$result = (object)$value;
if (isset($result->scalar) && $result->scalar === true) {
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}

// Boolean false to object conversion
$value = false;
$result = (object)$value;
if (isset($result->scalar) && $result->scalar === false) {
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}

// NULL to object conversion
$value = null;
$result = (object)$value;
if (empty((array)$result)) {
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}

// Array to object conversion
$value = ['a' => 1, 'b' => 2];
$result = (object)$value;
if (isset($result->a) && $result->a === 1 && isset($result->b) && $result->b === 2) {
    echo "Case 6: " . $vul_data . "\n";
} else {
    echo "Case 6: " . $vul_data . " (false positive)\n";
}

// Empty array to object conversion
$value = [];
$result = (object)$value;
if (empty((array)$result)) {
    echo "Case 7: " . $vul_data . "\n";
} else {
    echo "Case 7: " . $vul_data . " (false positive)\n";
}

// String to object conversion
$value = "hello";
$result = (object)$value;
if (isset($result->scalar) && $result->scalar === "hello") {
    echo "Case 8: " . $vul_data . "\n";
} else {
    echo "Case 8: " . $vul_data . " (false positive)\n";
}

// Empty string to object conversion
$value = "";
$result = (object)$value;
if (isset($result->scalar) && $result->scalar === "") {
    echo "Case 9: " . $vul_data . "\n";
} else {
    echo "Case 9: " . $vul_data . " (false positive)\n";
}

// Object to object conversion (should be the same object)
$value = new stdClass();
$result = (object)$value;
if ($result === $value) {
    echo "Case 10: " . $vul_data . "\n";
} else {
    echo "Case 10: " . $vul_data . " (false positive)\n";
}
