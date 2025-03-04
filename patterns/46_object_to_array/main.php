<?php

$b = $_GET["p1"];
class A
{
    public $a = 'safe';
    public $b = 'safe';

    public function __construct($b)
    {
        $this->b = $b;
    }
}
$a = new A($b);
// object to array
$arr = (array) $a;
// print the property $b in the object
// XSS vulnerability
echo $arr['b'];
