<?php

$vul_data = $_GET["user-input"];

// Value assignment
$a = 42;
$b = $a;
// Modify $b and check if $a remains unchanged
$b = 100;
if ($a === 42 && $b === 100) {
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}


// Modify $a and check if $b remains unchanged
$a = 200;
if ($b === 100 && $a === 200) {
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}
// Assign a complex structure by value (array)
$array1 = [1, 2, 3];
$array2 = $array1;
// Modify $array2 and check if $array1 remains unchanged
$array2[0] = 100;
if ($array1[0] === 1 && $array2[0] === 100) {
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}

// Assign an object by value (in PHP objects are assigned by reference, so we need to clone)
class TestClass
{
    public $value;

    public function __construct($value)
    {
        $this->value = $value;
    }
}

$object1 = new TestClass(42);
$object2 = clone $object1;

// Modify $object2 and check if $object1 remains unchanged
$object2->value = 100;
if ($object1->value === 42 && $object2->value === 100) {
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}
// Assign a primitive value to another variable
$x = "Hello";
$y = $x;
// Modify $y and check if $x remains unchanged
$y = "World";
if ($x === "Hello" && $y === "World") {
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}
