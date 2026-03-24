<?php

$vul_data = $_GET["user-input"];

// Integer to string conversion
$value = 42;
$result = (string)$value;
if ($result === "42") {
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}

// Float to string conversion
$value = 3.14;
$result = (string)$value;
if ($result === "3.14") {
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}

// Boolean true to string conversion
$value = true;
$result = (string)$value;
if ($result === "1") {
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}

// Boolean false to string conversion
$value = false;
$result = (string)$value;
if ($result === "") {
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}

// NULL to string conversion
$value = null;
$result = (string)$value;
if ($result === "") {
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}

// Array to string conversion
$value = [1, 2, 3];
$result = @((string)$value);
if ($result === "Array") {
    echo "Case 6: " . $vul_data . "\n";
} else {
    echo "Case 6: " . $vul_data . " (false positive)\n";
}

// Empty string
$value = "";
$result = (string)$value;
if ($result === "") {
    echo "Case 7: " . $vul_data . "\n";
} else {
    echo "Case 7: " . $vul_data . " (false positive)\n";
}

// String with leading and trailing spaces
$value = "  test  ";
$result = (string)$value;
if ($result === "  test  ") {
    echo "Case 8: " . $vul_data . "\n";
} else {
    echo "Case 8: " . $vul_data . " (false positive)\n";
}

// Numeric string
$value = "123";
$result = (string)$value;
if ($result === "123") {
    echo "Case 9: " . $vul_data . "\n";
} else {
    echo "Case 9: " . $vul_data . " (false positive)\n";
}

// Complex numeric string
$value = "123.456";
$result = (string)$value;
if ($result === "123.456") {
    echo "Case 10: " . $vul_data . "\n";
} else {
    echo "Case 10: " . $vul_data . " (false positive)\n";
}

// Scientific notation string
$value = "1.2e3";
$result = (string)$value;
if ($result === "1.2e3") {
    echo "Case 11: " . $vul_data . "\n";
} else {
    echo "Case 11: " . $vul_data . " (false positive)\n";
}
