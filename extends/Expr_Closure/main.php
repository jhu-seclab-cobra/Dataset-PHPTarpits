<?php

$vul_data = $_GET["user-input"];

// Case 1: Simple Closure without variable capture
$closure1 = function ($x) {
    return $x + 1;
};

$result1 = $closure1(5);
if ($result1 === 6) {
    echo "Case 1 (Simple Closure): " . $vul_data . " (true positive)\n";
} else {
    echo "Case 1 (Simple Closure): " . $vul_data . " (false positive)\n";
}

// Case 2: Closure capturing a variable from the surrounding scope
$y = 10;
$closure2 = function ($x) use ($y) {
    return $x + $y;
};

$result2 = $closure2(5);
if ($result2 === 15) {
    echo "Case 2 (Closure with Variable Capture): " . $vul_data . " (true positive)\n";
} else {
    echo "Case 2 (Closure with Variable Capture): " . $vul_data . " (false positive)\n";
}

// Case 3: Closure with return type declaration
$closure3 = function (int $x): int {
    return $x * 2;
};

$result3 = $closure3(5);
if ($result3 === 10) {
    echo "Case 3 (Closure with Return Type): " . $vul_data . " (true positive)\n";
} else {
    echo "Case 3 (Closure with Return Type): " . $vul_data . " (false positive)\n";
}

// Case 4: Closure capturing multiple variables
$a = 1;
$b = 2;
$closure4 = function () use ($a, $b) {
    return $a + $b;
};

$result4 = $closure4();
if ($result4 === 3) {
    echo "Case 4 (Closure with Multiple Captures): " . $vul_data . " (true positive)\n";
} else {
    echo "Case 4 (Closure with Multiple Captures): " . $vul_data . " (false positive)\n";
}

// Case 5: Returning a declared function from a closure
function multiply($x, $y)
{
    return $x * $y;
}

$closure5 = function ($x) {
    return multiply($x, 10);
};

$result5 = $closure5(3);
if ($result5 === 30) {
    echo "Case 5 (Closure Returning a Declared Function): " . $vul_data . " (true positive)\n";
} else {
    echo "Case 5 (Closure Returning a Declared Function): " . $vul_data . " (false positive)\n";
}

// Case 6: Passing a closure as an argument to another function
function applyFunction($func, $value)
{
    return $func($value);
}

$closure6 = function ($x) {
    return $x * 2;
};

$result6 = applyFunction($closure6, 4);
if ($result6 === 8) {
    echo "Case 6 (Closure Passed as Argument): " . $vul_data . " (true positive)\n";
} else {
    echo "Case 6 (Closure Passed as Argument): " . $vul_data . " (false positive)\n";
}

// Case 7: Closure accessing $this in an object context
class TestClass
{
    private $value = 100;

    public function getValue()
    {
        return function () {
            return $this->value;
        };
    }
}

$obj = new TestClass();
$closure7 = $obj->getValue();
$result7 = $closure7();

if ($result7 === 100) {
    echo "Case 7 (Closure accessing \$this): " . $vul_data . " (true positive)\n";
} else {
    echo "Case 7 (Closure accessing \$this): " . $vul_data . " (false positive)\n";
}
