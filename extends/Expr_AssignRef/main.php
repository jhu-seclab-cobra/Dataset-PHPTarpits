<?php

$vul_data = $_GET["user-input"];

// Assignment by reference
$a = 42;
$b = & $a;
// Modify $b and check if $a changes
$b = 100;
if ($a === 100) {
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}


// Modify $a and check if $b changes
$a = 200;
if ($b === 200) {
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}

// Assign by reference from one variable to another
$c = & $b;
// Modify $c and check if both $a and $b change
$c = 300;
if ($a === 300 && $b === 300) {
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}

// Test with objects
class TestClass
{
    public $value;

    public function __construct($value)
    {
        $this->value = $value;
    }
}

$object1 = new TestClass(42);
$object2 = & $object1;

// Modify $object2 and check if $object1 changes
$object2->value = 100;
if ($object1->value === 100) {
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}


// Modify $object1 and check if $object2 changes
$object1->value = 200;
if ($object2->value === 200) {
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}
