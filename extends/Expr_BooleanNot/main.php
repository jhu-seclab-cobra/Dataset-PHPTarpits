<?php

$vul_data = $_GET["user-input"];

// Boolean true negation
$value = true;
$result = !$value;
if ($result === false) {
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}

// Boolean false negation
$value = false;
$result = !$value;
if ($result === true) {
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}

// Integer zero negation
$value = 0;
$result = !$value;
if ($result === true) {
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}

// Non-zero integer negation
$value = 42;
$result = !$value;
if ($result === false) {
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}

// Zero float negation
$value = 0.0;
$result = !$value;
if ($result === true) {
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}

// Non-zero float negation
$value = 3.14;
$result = !$value;
if ($result === false) {
    echo "Case 6: " . $vul_data . "\n";
} else {
    echo "Case 6: " . $vul_data . " (false positive)\n";
}

// Empty string negation
$value = "";
$result = !$value;
if ($result === true) {
    echo "Case 7: " . $vul_data . "\n";
} else {
    echo "Case 7: " . $vul_data . " (false positive)\n";
}

// Non-empty string negation
$value = "hello";
$result = !$value;
if ($result === false) {
    echo "Case 8: " . $vul_data . "\n";
} else {
    echo "Case 8: " . $vul_data . " (false positive)\n";
}

// NULL negation
$value = null;
$result = !$value;
if ($result === true) {
    echo "Case 9: " . $vul_data . "\n";
} else {
    echo "Case 9: " . $vul_data . " (false positive)\n";
}

// Array negation (empty)
$value = [];
$result = !$value;
if ($result === true) {
    echo "Case 10: " . $vul_data . "\n";
} else {
    echo "Case 10: " . $vul_data . " (false positive)\n";
}

// Array negation (non-empty)
$value = [1, 2, 3];
$result = !$value;
if ($result === false) {
    echo "Case 11: " . $vul_data . "\n";
} else {
    echo "Case 11: " . $vul_data . " (false positive)\n";
}
