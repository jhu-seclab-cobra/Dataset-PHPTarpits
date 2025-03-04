<?php

$vul_data = $_GET["user-input"];

// Define a base class with static properties
class BaseStaticClass
{
    public static $baseStaticProp = "baseStaticValue";  // Static property in base class
}

// Define a derived class that inherits from BaseStaticClass
class DerivedStaticClass extends BaseStaticClass
{
    public static $derivedStaticProp = "derivedStaticValue";  // Static property in derived class
}

// Define a class with a nested class and static properties
class OuterClass
{
    public static $outerStaticProp = "outerStaticValue";  // Static property in outer class

    // Define a nested static class
    public static $NestedClass;

    public static function init()
    {
        self::$NestedClass = new class () {
            public static $nestedStaticProp = "nestedStaticValue";  // Static property in nested class
        };
    }
}

// Initialize the nested class
OuterClass::init();

// Case 1: Fetch static property directly and dynamically (Base Class)
if (BaseStaticClass::$baseStaticProp === "baseStaticValue") {
    echo "Case 1a (Direct - baseStaticProp): " . $vul_data . " (true positive)\n";
} else {
    echo "Case 1a (Direct - baseStaticProp): " . $vul_data . " (false positive)\n";
}
$propName = "baseStaticProp";
if (BaseStaticClass::$$propName === "baseStaticValue") {
    echo "Case 1b (Dynamic - baseStaticProp): " . $vul_data . " (true positive)\n";
} else {
    echo "Case 1b (Dynamic - baseStaticProp): " . $vul_data . " (false positive)\n";
}

// Case 2: Fetch static property directly and dynamically (Inherited Property)
if (DerivedStaticClass::$baseStaticProp === "baseStaticValue") {
    echo "Case 2a (Inherited - baseStaticProp): " . $vul_data . " (true positive)\n";
} else {
    echo "Case 2a (Inherited - baseStaticProp): " . $vul_data . " (false positive)\n";
}
$propName = "baseStaticProp";
if (DerivedStaticClass::$$propName === "baseStaticValue") {
    echo "Case 2b (Dynamic Inherited - baseStaticProp): " . $vul_data . " (true positive)\n";
} else {
    echo "Case 2b (Dynamic Inherited - baseStaticProp): " . $vul_data . " (false positive)\n";
}

// Case 3: Fetch static property directly and dynamically (Derived Class)
if (DerivedStaticClass::$derivedStaticProp === "derivedStaticValue") {
    echo "Case 3a (Direct - derivedStaticProp): " . $vul_data . " (true positive)\n";
} else {
    echo "Case 3a (Direct - derivedStaticProp): " . $vul_data . " (false positive)\n";
}
$propName = "derivedStaticProp";
if (DerivedStaticClass::$$propName === "derivedStaticValue") {
    echo "Case 3b (Dynamic - derivedStaticProp): " . $vul_data . " (true positive)\n";
} else {
    echo "Case 3b (Dynamic - derivedStaticProp): " . $vul_data . " (false positive)\n";
}

// Case 4: Fetch static property of a nested class (Outer Class)
if (OuterClass::$outerStaticProp === "outerStaticValue") {
    echo "Case 4a (Direct - outerStaticProp): " . $vul_data . " (true positive)\n";
} else {
    echo "Case 4a (Direct - outerStaticProp): " . $vul_data . " (false positive)\n";
}
$propName = "outerStaticProp";
if (OuterClass::$$propName === "outerStaticValue") {
    echo "Case 4b (Dynamic - outerStaticProp): " . $vul_data . " (true positive)\n";
} else {
    echo "Case 4b (Dynamic - outerStaticProp): " . $vul_data . " (false positive)\n";
}

// Case 5: Fetch static property of a nested class (Nested Static Property)
if (OuterClass::$NestedClass::$nestedStaticProp === "nestedStaticValue") {
    echo "Case 5 (Nested - nestedStaticProp): " . $vul_data . " (true positive)\n";
} else {
    echo "Case 5 (Nested - nestedStaticProp): " . $vul_data . " (false positive)\n";
}
