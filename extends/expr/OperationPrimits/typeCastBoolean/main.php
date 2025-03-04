<?php

$vul_data = $_GET["user-input"];

// Integer zero conversion
$value = 0;
$result = (bool)$value;
if ($result === false) {
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}

// Non-zero integer conversion
$value = 42;
$result = (bool)$value;
if ($result === true) {
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}

// String "false" conversion
$value = "false";
$result = (bool)$value;
if ($result === true) {
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}

// String "0" conversion
$value = "0";
$result = (bool)$value;
if ($result === false) {
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}

// Empty string conversion
$value = "";
$result = (bool)$value;
if ($result === false) {
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}

// Non-empty string conversion
$value = "hello";
$result = (bool)$value;
if ($result === true) {
    echo "Case 6: " . $vul_data . "\n";
} else {
    echo "Case 6: " . $vul_data . " (false positive)\n";
}

// Float zero conversion
$value = 0.0;
$result = (bool)$value;
if ($result === false) {
    echo "Case 7: " . $vul_data . "\n";
} else {
    echo "Case 7: " . $vul_data . " (false positive)\n";
}

// Non-zero float conversion
$value = -1.23;
$result = (bool)$value;
if ($result === true) {
    echo "Case 8: " . $vul_data . "\n";
} else {
    echo "Case 8: " . $vul_data . " (false positive)\n";
}

// NULL conversion
$value = null;
$result = (bool)$value;
if ($result === false) {
    echo "Case 9: " . $vul_data . "\n";
} else {
    echo "Case 9: " . $vul_data . " (false positive)\n";
}

// Array conversion (empty)
$value = [];
$result = (bool)$value;
if ($result === false) {
    echo "Case 10: " . $vul_data . "\n";
} else {
    echo "Case 10: " . $vul_data . " (false positive)\n";
}

// Array conversion (non-empty)
$value = [1, 2, 3];
$result = (bool)$value;
if ($result === true) {
    echo "Case 11: " . $vul_data . "\n";
} else {
    echo "Case 11: " . $vul_data . " (false positive)\n";
}

// Boolean true conversion
$value = true;
$result = (bool)$value;
if ($result === true) {
    echo "Case 12: " . $vul_data . "\n";
} else {
    echo "Case 12: " . $vul_data . " (false positive)\n";
}

// Boolean false conversion
$value = false;
$result = (bool)$value;
if ($result === false) {
    echo "Case 13: " . $vul_data . "\n";
} else {
    echo "Case 13: " . $vul_data . " (false positive)\n";
}
