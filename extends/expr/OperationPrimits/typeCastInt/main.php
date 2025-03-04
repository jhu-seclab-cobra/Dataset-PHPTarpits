<?php

$vul_data = $_GET["user-input"];

// Normal string conversion
$value = "42";
$result = (int)$value;
if ($result === 42) {
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}

// Non-numeric string conversion
$value = "hello";
$result = (int)$value;
if ($result === 0) {
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}

// Float to integer conversion
$value = 42.99;
$result = (int)$value;
if ($result === 42) {
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}

// String with leading and trailing spaces
$value = "  100  ";
$result = (int)$value;
if ($result === 100) {
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}

// Empty string conversion
$value = "";
$result = (int)$value;
if ($result === 0) {
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}

// Boolean true conversion
$value = true;
$result = (int)$value;
if ($result === 1) {
    echo "Case 6: " . $vul_data . "\n";
} else {
    echo "Case 6: " . $vul_data . " (false positive)\n";
}

// Boolean false conversion
$value = false;
$result = (int)$value;
if ($result === 0) {
    echo "Case 7: " . $vul_data . "\n";
} else {
    echo "Case 7: " . $vul_data . " (false positive)\n";
}

// NULL conversion
$value = null;
$result = (int)$value;
if ($result === 0) {
    echo "Case 8: " . $vul_data . "\n";
} else {
    echo "Case 8: " . $vul_data . " (false positive)\n";
}

// Conversion of maximum integer value
$value = PHP_INT_MAX;
$result = (int)$value;
if ($result === PHP_INT_MAX) {
    echo "Case 9: " . $vul_data . "\n";
} else {
    echo "Case 9: " . $vul_data . " (false positive)\n";
}

// Conversion of minimum integer value
$value = -PHP_INT_MAX - 1;
$result = (int)$value;
if ($result === -PHP_INT_MAX - 1) {
    echo "Case 10: " . $vul_data . "\n";
} else {
    echo "Case 10: " . $vul_data . " (false positive)\n";
}

// String starting with non-numeric characters
$value = "abc123";
$result = (int)$value;
if ($result === 0) {
    echo "Case 11: " . $vul_data . "\n";
} else {
    echo "Case 11: " . $vul_data . " (false positive)\n";
}

// String starting with numeric characters
$value = "123abc";
$result = (int)$value;
if ($result === 123) {
    echo "Case 12: " . $vul_data . "\n";
} else {
    echo "Case 12: " . $vul_data . " (false positive)\n";
}

// Negative number string conversion
$value = "-56";
$result = (int)$value;
if ($result === -56) {
    echo "Case 13: " . $vul_data . "\n";
} else {
    echo "Case 13: " . $vul_data . " (false positive)\n";
}

// Scientific notation string conversion
$value = "1.2e3";
$result = (int)$value;
if ($result === 1200) {
    echo "Case 14: " . $vul_data . "\n";
} else {
    echo "Case 14: " . $vul_data . " (false positive)\n";
}
