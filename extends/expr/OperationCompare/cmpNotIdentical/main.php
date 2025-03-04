<?php

$vul_data = $_GET["user-input"];

// Non-identical comparison of two identical integers
$left = 42;
$right = 42;
$result = $left !== $right;
if ($result === false) {
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}

// Non-identical comparison of two different integers
$left = 42;
$right = 43;
$result = $left !== $right;
if ($result === true) {
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}

// Non-identical comparison of integer and string with the same numeric value
$left = 42;
$right = "42";
$result = $left !== $right;
if ($result === true) {
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}

// Non-identical comparison of two different strings
$left = "hello";
$right = "world";
$result = $left !== $right;
if ($result === true) {
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}

// Non-identical comparison of two identical strings
$left = "hello";
$right = "hello";
$result = $left !== $right;
if ($result === false) {
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}

// Non-identical comparison of boolean true and integer 1
$left = true;
$right = 1;
$result = $left !== $right;
if ($result === true) {
    echo "Case 6: " . $vul_data . "\n";
} else {
    echo "Case 6: " . $vul_data . " (false positive)\n";
}

// Non-identical comparison of two null values
$left = null;
$right = null;
$result = $left !== $right;
if ($result === false) {
    echo "Case 7: " . $vul_data . "\n";
} else {
    echo "Case 7: " . $vul_data . " (false positive)\n";
}

// Non-identical comparison of null with an empty string
$left = null;
$right = "";
$result = $left !== $right;
if ($result === true) {
    echo "Case 8: " . $vul_data . "\n";
} else {
    echo "Case 8: " . $vul_data . " (false positive)\n";
}

class TestClass
{
    public $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

}


$obj1 = new TestClass(42);
$obj2 = new TestClass(42);
$result = $obj1 !== $obj2;
if ($result === true) {
    echo "Case 9: " . $vul_data . "\n";
} else {
    echo "Case 9: " . $vul_data . " (false positive)\n";
}

// Non-identical comparison of the same object instance
$obj1 = new TestClass(42);
$obj2 = $obj1;
$result = $obj1 !== $obj2;
if ($result === false) {
    echo "Case 10: " . $vul_data . "\n";
} else {
    echo "Case 10: " . $vul_data . " (false positive)\n";
}
