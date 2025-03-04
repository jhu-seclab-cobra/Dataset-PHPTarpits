<?php

$vul_data = $_GET["user-input"];

// Define some classes with constants
class MyClass
{
    public const GREETING = "Hello, World!";
    public const PI = 3.14159;
}

class AnotherClass
{
    public const MAX_USERS = 100;
    public const FLAG = true;
}

// Fetch and print the GREETING constant from MyClass
$constant1 = MyClass::GREETING;
if ($constant1 === "Hello, World!") {
    echo "Case 1 (MyClass::GREETING): " . $vul_data . "\n";
} else {
    echo "Case 1 (MyClass::GREETING): " . $vul_data . " (false positive)\n";
}

// Fetch and print the PI constant from MyClass
$constant2 = MyClass::PI;
if ($constant2 === 3.14159) {
    echo "Case 2 (MyClass::PI): " . $vul_data . "\n";
} else {
    echo "Case 2 (MyClass::PI): " . $vul_data . " (false positive)\n";
}

// Fetch and print the MAX_USERS constant from AnotherClass
$constant3 = AnotherClass::MAX_USERS;
if ($constant3 === 100) {
    echo "Case 3 (AnotherClass::MAX_USERS): " . $vul_data . "\n";
} else {
    echo "Case 3 (AnotherClass::MAX_USERS): " . $vul_data . " (false positive)\n";
}

// Fetch and print the FLAG constant from AnotherClass
$constant4 = AnotherClass::FLAG;
if ($constant4 === true) {
    echo "Case 4 (AnotherClass::FLAG): " . $vul_data . "\n";
} else {
    echo "Case 4 (AnotherClass::FLAG): " . $vul_data . " (false positive)\n";
}

// Fetch class constants using a dynamic class name
$className = "MyClass";
$constant5 = $className::GREETING;
if ($constant5 === "Hello, World!") {
    echo "Case 5 (Dynamic Class Name): " . $vul_data . "\n";
} else {
    echo "Case 5 (Dynamic Class Name): " . $vul_data . " (false positive)\n";
}

// Attempt to fetch a non-existing class constant
if (!defined('AnotherClass::NON_EXISTING')) {
    echo "Case 6 (Non-Existing Constant): " . $vul_data . "\n";
} else {
    echo "Case 6 (Non-Existing Constant): " . $vul_data . " (false positive)\n";
}
