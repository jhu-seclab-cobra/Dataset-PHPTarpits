<?php

$vul_data = $_GET["user-input"];

// Example variable for testing
$hello = "Hello, World!";
$time = "morning";
$name = "Alice";
$greeting = "Good";

// Encapsulated string with a single variable
$encapsulated1 = "He said: $hello";
if ($encapsulated1 === "He said: Hello, World!") {
    echo "Case 1 (Single Variable): " . $vul_data . "\n";
} else {
    echo "Case 1 (Single Variable): " . $vul_data . " (false positive)\n";
}

// Encapsulated string with multiple variables
$encapsulated2 = "$greeting $time, $name!";
if ($encapsulated2 === "Good morning, Alice!") {
    echo "Case 2 (Multiple Variables): " . $vul_data . "\n";
} else {
    echo "Case 2 (Multiple Variables): " . $vul_data . " (false positive)\n";
}

// Encapsulated string with array access
$arr = ["Alice", "Bob", "Charlie"];
$encapsulated3 = "Hello, $arr[1]!";
if ($encapsulated3 === "Hello, Bob!") {
    echo "Case 3 (Array Access): " . $vul_data . "\n";
} else {
    echo "Case 3 (Array Access): " . $vul_data . " (false positive)\n";
}

// Encapsulated string with property access
class Greeter
{
    public $name = "Charlie";
}
$greeter = new Greeter();
$encapsulated4 = "Hello, {$greeter->name}!";
if ($encapsulated4 === "Hello, Charlie!") {
    echo "Case 4 (Property Access): " . $vul_data . "\n";
} else {
    echo "Case 4 (Property Access): " . $vul_data . " (false positive)\n";
}

// Encapsulated string with complex expression
$encapsulated5 = "The sum of 2 and 3 is " . (2 + 3) . ".";
if ($encapsulated5 === "The sum of 2 and 3 is 5.") {
    echo "Case 5 (Complex Expression): " . $vul_data . "\n";
} else {
    echo "Case 5 (Complex Expression): " . $vul_data . " (false positive)\n";
}

// Encapsulated string with escaped characters
$encapsulated6 = "He said: \"Hello, $name!\"";
if ($encapsulated6 === "He said: \"Hello, Alice!\"") {
    echo "Case 6 (Escaped Characters): " . $vul_data . "\n";
} else {
    echo "Case 6 (Escaped Characters): " . $vul_data . " (false positive)\n";
}

// Encapsulated string with nested variable access
$nestedString = $greeting . ' ' . $time;
$encapsulated7 = "Nested {$nestedString}";
if ($encapsulated7 === "Nested Good morning") {
    echo "Case 7 (Nested Variable Access): " . $vul_data . "\n";
} else {
    echo "Case 7 (Nested Variable Access): " . $vul_data . " (false positive)\n";
}
