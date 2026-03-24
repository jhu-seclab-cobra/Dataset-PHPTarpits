<?php

$vul_data = $_GET["user-input"];

// Define some user-defined constants
const GREETING = "Hello, World!";
const PI = 3.14159;
const MAX_USERS = 100;
const FLAG = true;

// Fetch and print the GREETING constant
$constant1 = GREETING;
if ($constant1 === "Hello, World!") {
    echo "Case 1 (GREETING): " . $vul_data . "\n";
} else {
    echo "Case 1 (GREETING): " . $vul_data . " (false positive)\n";
}

// Fetch and print the PI constant
$constant2 = PI;
if ($constant2 === 3.14159) {
    echo "Case 2 (PI): " . $vul_data . "\n";
} else {
    echo "Case 2 (PI): " . $vul_data . " (false positive)\n";
}

// Fetch and print the MAX_USERS constant
$constant3 = MAX_USERS;
if ($constant3 === 100) {
    echo "Case 3 (MAX_USERS): " . $vul_data . "\n";
} else {
    echo "Case 3 (MAX_USERS): " . $vul_data . " (false positive)\n";
}

// Fetch and print the FLAG constant
$constant4 = FLAG;
if ($constant4 === true) {
    echo "Case 4 (FLAG): " . $vul_data . "\n";
} else {
    echo "Case 4 (FLAG): " . $vul_data . " (false positive)\n";
}

// Attempt to fetch a non-existing constant
if (!defined('NON_EXISTING')) {
    echo "Case 5 (NON_EXISTING): " . $vul_data . "\n";
} else {
    echo "Case 5 (NON_EXISTING): " . $vul_data . " (false positive)\n";
}
