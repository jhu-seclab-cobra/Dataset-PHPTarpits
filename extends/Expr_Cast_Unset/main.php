<?php

$vul_data = $_GET["user-input"];

// Normal integer unset
$value = 42;
unset($value);
if (!isset($value)) {
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}

// String unset
$value = "hello";
unset($value);
if (!isset($value)) {
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}

// Array unset
$value = [1, 2, 3];
unset($value);
if (!isset($value)) {
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}

// Boolean true unset
$value = true;
unset($value);
if (!isset($value)) {
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}

// Boolean false unset
$value = false;
unset($value);
if (!isset($value)) {
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}

// NULL unset
$value = null;
unset($value);
if (!isset($value)) {
    echo "Case 6: " . $vul_data . "\n";
} else {
    echo "Case 6: " . $vul_data . " (false positive)\n";
}

// Float unset
$value = 3.14;
unset($value);
if (!isset($value)) {
    echo "Case 7: " . $vul_data . "\n";
} else {
    echo "Case 7: " . $vul_data . " (false positive)\n";
}

// Object unset
$value = new stdClass();
unset($value);
if (!isset($value)) {
    echo "Case 8: " . $vul_data . "\n";
} else {
    echo "Case 8: " . $vul_data . " (false positive)\n";
}
