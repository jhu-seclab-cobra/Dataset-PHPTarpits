<?php

$vul_data = $_GET["user-input"];

// Standard floating-point number
$float1 = 42.0;
if ($float1 === 42.0) {
    echo "Case 1 (Standard Float): " . $vul_data . "\n";
} else {
    echo "Case 1 (Standard Float): " . $vul_data . " (false positive)\n";
}

// Floating-point number with exponential notation (positive exponent)
$float2 = 1.5e3; // 1.5 * 10^3 = 1500.0
if ($float2 === 1500.0) {
    echo "Case 2 (Exponential Notation Positive): " . $vul_data . "\n";
} else {
    echo "Case 2 (Exponential Notation Positive): " . $vul_data . " (false positive)\n";
}

// Floating-point number with exponential notation (negative exponent)
$float3 = 7E-10; // 7 * 10^-10 = 0.0000000007
if ($float3 === 7E-10) {
    echo "Case 3 (Exponential Notation Negative): " . $vul_data . "\n";
} else {
    echo "Case 3 (Exponential Notation Negative): " . $vul_data . " (false positive)\n";
}

// Very large floating-point number
$float4 = 1.0e308; // Close to the maximum for a double-precision floating-point
if ($float4 === 1.0e308) {
    echo "Case 4 (Very Large Float): " . $vul_data . "\n";
} else {
    echo "Case 4 (Very Large Float): " . $vul_data . " (false positive)\n";
}

// Very small floating-point number
$float5 = 1.0e-308; // Close to the minimum positive normal value for a double-precision floating-point
if ($float5 === 1.0e-308) {
    echo "Case 5 (Very Small Float): " . $vul_data . "\n";
} else {
    echo "Case 5 (Very Small Float): " . $vul_data . " (false positive)\n";
}

// Negative floating-point number
$float6 = -42.5;
if ($float6 === -42.5) {
    echo "Case 6 (Negative Float): " . $vul_data . "\n";
} else {
    echo "Case 6 (Negative Float): " . $vul_data . " (false positive)\n";
}

// Floating-point number in exponential notation (negative number)
$float7 = -3.5e2; // -3.5 * 10^2 = -350.0
if ($float7 === -350.0) {
    echo "Case 7 (Negative Exponential Notation): " . $vul_data . "\n";
} else {
    echo "Case 7: " . $vul_data . " (false positive)\n";
}
