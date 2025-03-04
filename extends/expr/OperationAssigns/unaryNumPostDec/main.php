<?php

$vul_data = $_GET["user-input"];


// Post-decrement with a positive integer
$i = 5;
$result = $i--; // $result should be 5, and $i should be decremented to 4
if ($i === 4 && $result === 5) {
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}


// Post-decrement with zero
$i = 0;
$result = $i--; // $result should be 0, and $i should be decremented to -1
if ($i === -1 && $result === 0) {
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}


// Post-decrement with a negative integer
$i = -3;
$result = $i--; // $result should be -3, and $i should be decremented to -4
if ($i === -4 && $result === -3) {
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}


// Post-decrement with a floating-point number
$i = 1.5;
$result = $i--; // $result should be 1.5, and $i should be decremented to 0.5
if ($i === 0.5 && $result === 1.5) {
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}


// Post-decrement with a string representing an integer
$i = "5";
$result = $i--; // $result should be 5 (as integer), and $i should be decremented to 4
if ($i === 4 && $result === "5") {
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}


// Post-decrement with a string representing a float
$i = "3.5";
$result = $i--; // $result should be 3.5 (as float), and $i should be decremented to 2.5
if ($i === 2.5 && $result === "3.5") {
    echo "Case 6: " . $vul_data . "\n";
} else {
    echo "Case 6: " . $vul_data . " (false positive)\n";
}
