<?php

$vul_data = $_GET["user-input"];

// Normal integer conversion
$value = 42;
$result = (float)$value;
if ($result === 42.0) {
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}

// String representation of a float
$value = "42.99";
$result = (float)$value;
if ($result === 42.99) {
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}

// Non-numeric string conversion
$value = "hello";
$result = (float)$value;
if ($result === 0.0) {
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}

// String with leading and trailing spaces
$value = "  100.25  ";
$result = (float)$value;
if ($result === 100.25) {
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}

// Empty string conversion
$value = "";
$result = (float)$value;
if ($result === 0.0) {
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}

// Boolean true conversion
$value = true;
$result = (float)$value;
if ($result === 1.0) {
    echo "Case 6: " . $vul_data . "\n";
} else {
    echo "Case 6: " . $vul_data . " (false positive)\n";
}

// Boolean false conversion
$value = false;
$result = (float)$value;
if ($result === 0.0) {
    echo "Case 7: " . $vul_data . "\n";
} else {
    echo "Case 7: " . $vul_data . " (false positive)\n";
}

// NULL conversion
$value = null;
$result = (float)$value;
if ($result === 0.0) {
    echo "Case 8: " . $vul_data . "\n";
} else {
    echo "Case 8: " . $vul_data . " (false positive)\n";
}

// Large integer conversion
$value = PHP_INT_MAX;
$result = (float)$value;
if ($result === (float)PHP_INT_MAX) {
    echo "Case 9: " . $vul_data . "\n";
} else {
    echo "Case 9: " . $vul_data . " (false positive)\n";
}

// Small integer conversion
$value = -PHP_INT_MAX - 1;
$result = (float)$value;
if ($result === (float)(-PHP_INT_MAX - 1)) {
    echo "Case 10: " . $vul_data . "\n";
} else {
    echo "Case 10: " . $vul_data . " (false positive)\n";
}

// Non-numeric start string
$value = "abc123.45";
$result = (float)$value;
if ($result === 0.0) {
    echo "Case 11: " . $vul_data . "\n";
} else {
    echo "Case 11: " . $vul_data . " (false positive)\n";
}

// Numeric start string
$value = "123.45abc";
$result = (float)$value;
if ($result === 123.45) {
    echo "Case 12: " . $vul_data . "\n";
} else {
    echo "Case 12: " . $vul_data . " (false positive)\n";
}

// Negative float string
$value = "-56.78";
$result = (float)$value;
if ($result === -56.78) {
    echo "Case 13: " . $vul_data . "\n";
} else {
    echo "Case 13: " . $vul_data . " (false positive)\n";
}

// Scientific notation string
$value = "1.2e3";
$result = (float)$value;
if ($result === 1200.0) {
    echo "Case 14: " . $vul_data . "\n";
} else {
    echo "Case 14: " . $vul_data . " (false positive)\n";
}
