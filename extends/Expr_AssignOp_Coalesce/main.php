<?php

$vul_data = $_GET["user-input"];


// Null-coalescing assignment where the left-hand side is null
$var = null;
$var ??= 'default value';
if ($var === 'default value') {
    echo "Case 1: " . $vul_data . "\n";
} else {
    echo "Case 1: " . $vul_data . " (false positive)\n";
}


// Null-coalescing assignment where the left-hand side is not null
$var = 'existing value';
$var ??= 'default value';
if ($var === 'existing value') {
    echo "Case 2: " . $vul_data . "\n";
} else {
    echo "Case 2: " . $vul_data . " (false positive)\n";
}


// Null-coalescing assignment with an integer
$var = null;
$var ??= 42;
if ($var === 42) {
    echo "Case 3: " . $vul_data . "\n";
} else {
    echo "Case 3: " . $vul_data . " (false positive)\n";
}


// Null-coalescing assignment with a boolean
$var = null;
$var ??= true;
if ($var === true) {
    echo "Case 4: " . $vul_data . "\n";
} else {
    echo "Case 4: " . $vul_data . " (false positive)\n";
}


// Null-coalescing assignment with an empty string
$var = '';
$var ??= 'default value';
if ($var === '') {
    echo "Case 5: " . $vul_data . "\n";
} else {
    echo "Case 5: " . $vul_data . " (false positive)\n";
}

// Null-coalescing assignment with an object
class TestClass
{
    public $value;

    public function __construct($value)
    {
        $this->value = $value;
    }
}


$object = null;
$object ??= new TestClass('New Object');
if ($object instanceof TestClass && $object->value === 'New Object') {
    echo "Case 6: " . $vul_data . "\n";
} else {
    echo "Case 6: " . $vul_data . " (false positive)\n";
}
