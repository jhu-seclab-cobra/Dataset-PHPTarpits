<?php

$vul_data = $_GET["user-input"];


// Concatenation assignment with simple strings
$str = "Hello";
$str .= " World!";
if ($str === "Hello World!") {
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}


// Concatenation assignment with empty string
$str = "Hello";
$str .= "";
if ($str === "Hello") {
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}


// Concatenation assignment with numeric strings
$str = "Number: ";
$str .= "42";
if ($str === "Number: 42") {
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}


// Concatenation assignment with special characters
$str = "Hello";
$str .= " \nWorld!";
if ($str === "Hello \nWorld!") {
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}

// Concatenation assignment with numeric values
$str = "The answer is ";
$num = 42;
$str .= $num;
if ($str === "The answer is 42") {
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}

// Concatenation assignment with an object implementing __toString()
class TestClass
{
    public $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function __toString()
    {
        return (string)$this->value;
    }
}

$object = new TestClass("World");
$str = "Hello ";
$str .= $object;
if ($str === "Hello World") {
    echo "Case 6: " . $vul_data . "\n";
} else {
    echo "Case 6: " . $vul_data . " (false positive)\n";
}
