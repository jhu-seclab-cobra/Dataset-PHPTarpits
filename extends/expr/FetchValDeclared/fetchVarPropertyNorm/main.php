<?php

$vul_data = $_GET["user-input"];

// Define a simple class with nested properties
class NestedClass
{
    public $nestedProp = "nestedValue";
}

class TestClass
{
    public $prop1 = "value1";            // Regular string property
    public $prop2 = 42;                  // Integer property
    public $prop3 = null;                // Null property
    public $prop4 = true;                // Boolean true property
    public $nested;                      // Object with a nested property

    public function __construct()
    {
        $this->nested = new NestedClass();
    }
}

// Instantiate the object
$obj = new TestClass();

// Case 1: Fetch properties directly (Various types)
if ($obj->prop1 === "value1") {
    echo "Case 1 (Direct - prop1): " . $vul_data . " (true positive)\n";
} else {
    echo "Case 1 (Direct - prop1): " . $vul_data . " (false positive)\n";
}

if (is_null($obj->prop3)) {
    echo "Case 2 (Direct - prop3): " . $vul_data . " (true positive)\n";
} else {
    echo "Case 2 (Direct - prop3): " . $vul_data . " (false positive)\n";
}

if ($obj->prop4 === true) {
    echo "Case 3 (Direct - prop4): " . $vul_data . " (true positive)\n";
} else {
    echo "Case 3 (Direct - prop4): " . $vul_data . " (false positive)\n";
}

if ($obj->nested->nestedProp === "nestedValue") {
    echo "Case 4 (Direct - nested->nestedProp): " . $vul_data . " (true positive)\n";
} else {
    echo "Case 4 (Direct - nested->nestedProp): " . $vul_data . " (false positive)\n";
}

// Case 5: Fetch property dynamically using a string variable
$propName = "prop1";
if ($obj->$propName === "value1") {
    echo "Case 5 (Dynamic - prop1): " . $vul_data . " (true positive)\n";
} else {
    echo "Case 5 (Dynamic - prop1): " . $vul_data . " (false positive)\n";
}
