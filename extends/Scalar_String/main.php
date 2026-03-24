<?php

$vul_data = $_GET["user-input"];

// Standard string literal
$string1 = "Hello, World!";
if ($string1 === "Hello, World!") {
    echo "Case 1 (Standard String): " . $vul_data . "\n";
} else {
    echo "Case 1 (Standard String): " . $vul_data . " (false positive)\n";
}

// String with special characters
$string2 = "Hello,\nWorld!";
if ($string2 === "Hello,\nWorld!") {
    echo "Case 2 (String with Special Characters): " . $vul_data . "\n";
} else {
    echo "Case 2 (String with Special Characters): " . $vul_data . " (false positive)\n";
}

// String with escaped double quotes
$string3 = "He said, \"Hello, World!\"";
if ($string3 === "He said, \"Hello, World!\"") {
    echo "Case 3 (String with Escaped Quotes): " . $vul_data . "\n";
} else {
    echo "Case 3 (String with Escaped Quotes): " . $vul_data . " (false positive)\n";
}

// Empty string
$string4 = "";
if ($string4 === "") {
    echo "Case 4 (Empty String): " . $vul_data . "\n";
} else {
    echo "Case 4 (Empty String): " . $vul_data . " (false positive)\n";
}

// String with special characters and spaces
$string5 = "  Hello,\tWorld!  ";
if ($string5 === "  Hello,\tWorld!  ") {
    echo "Case 5 (String with Spaces and Tabs): " . $vul_data . "\n";
} else {
    echo "Case 5 (String with Spaces and Tabs): " . $vul_data . " (false positive)\n";
}

// String with numeric characters
$string6 = "12345";
if ($string6 === "12345") {
    echo "Case 6 (String with Numeric Characters): " . $vul_data . "\n";
} else {
    echo "Case 6 (String with Numeric Characters): " . $vul_data . " (false positive)\n";
}

// String with single quotes inside double quotes
$string7 = "It's a nice day!";
if ($string7 === "It's a nice day!") {
    echo "Case 7 (String with Single Quotes): " . $vul_data . "\n";
} else {
    echo "Case 7 (String with Single Quotes): " . $vul_data . " (false positive)\n";
}

// String with backslash
$string8 = "C:\\path\\to\\file";
if ($string8 === "C:\\path\\to\\file") {
    echo "Case 8 (String with Backslash): " . $vul_data . "\n";
} else {
    echo "Case 8 (String with Backslash): " . $vul_data . " (false positive)\n";
}
