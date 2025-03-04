<?php

$vul_data = $_GET["user-input"];

// Case 1: Simple Arrow Function
$arrow1 = fn ($x) => $x + 1;
$result1 = $arrow1(5);
if ($result1 === 6) {
    echo "Case 1 (Simple Arrow Function): " . $vul_data . " (true positive)\n";
} else {
    echo "Case 1 (Simple Arrow Function): " . $vul_data . " (false positive)\n";
}

// Case 2: Arrow Function capturing a variable from the surrounding scope
$y = 10;
$arrow2 = fn ($x) => $x + $y;
$result2 = $arrow2(5);
if ($result2 === 15) {
    echo "Case 2 (Arrow Function with Variable Capture): " . $vul_data . " (true positive)\n";
} else {
    echo "Case 2 (Arrow Function with Variable Capture): " . $vul_data . " (false positive)\n";
}

// Case 3: Arrow Function using $this in an object context
class TestClass
{
    private $value = 100;

    public function getValue()
    {
        return fn () => $this->value;
    }
}

$obj = new TestClass();
$arrow3 = $obj->getValue();
$result3 = $arrow3();
if ($result3 === 100) {
    echo "Case 3 (Arrow Function accessing \$this): " . $vul_data . " (true positive)\n";
} else {
    echo "Case 3 (Arrow Function accessing \$this): " . $vul_data . " (false positive)\n";
}

// Case 4: Static Arrow Function
$counter = 0;
$arrow4 = static fn () => ++$counter;
$result4a = $arrow4();
$result4b = $arrow4();
if ($result4a === 1 && $result4b === 1) {
    echo "Case 4 (Static Arrow Function): " . $vul_data . " (true positive)\n";
} else {
    echo "Case 4 (Static Arrow Function): " . $vul_data . " (false positive)\n";
}

// Case 5: Arrow Function with return type declaration
$arrow5 = fn (int $x): int => $x * 2;
$result5 = $arrow5(5);
if ($result5 === 10) {
    echo "Case 5 (Arrow Function with Return Type): " . $vul_data . " (true positive)\n";
} else {
    echo "Case 5 (Arrow Function with Return Type): " . $vul_data . " (false positive)\n";
}
