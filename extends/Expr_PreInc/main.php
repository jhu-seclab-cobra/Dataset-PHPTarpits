<?php

$vul_data = $_GET["user-input"];


// Pre-increment with a positive integer
$i = 5;
$result = ++$i; // $i should be incremented to 6, and $result should be 6
if ($i === 6 && $result === 6) {
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}


// Pre-increment with zero
$i = 0;
$result = ++$i; // $i should be incremented to 1, and $result should be 1
if ($i === 1 && $result === 1) {
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}


// Pre-increment with a negative integer
$i = -3;
$result = ++$i; // $i should be incremented to -2, and $result should be -2
if ($i === -2 && $result === -2) {
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}


// Pre-increment with a floating-point number
$i = 1.5;
$result = ++$i; // $i should be incremented to 2.5, and $result should be 2.5
if ($i === 2.5 && $result === 2.5) {
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}


// Pre-increment with a string representing an integer
$i = "5";
$result = ++$i; // $i should be incremented to 6 (as integer), and $result should be 6
if ($i === 6 && $result === 6) {
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}


// Pre-increment with a string representing a float
$i = "3.5";
$result = ++$i; // $i should be incremented to 4.5 (as float), and $result should be 4.5
if ($i === 4.5 && $result === 4.5) {
    echo "Case 6: " . $vul_data . "\n";
} else {
    echo "Case 6: " . $vul_data . " (false positive)\n";
}
