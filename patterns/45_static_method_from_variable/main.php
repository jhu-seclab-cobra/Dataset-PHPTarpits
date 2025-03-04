<?php

class A
{
    public $one = 1;

    public function __construct($b)
    {
        $this->one = $b;
    }

    public static function show_one()
    {
        echo $this->one;
    }
}

$b = $_GET["p1"];
$a = new A($b);
$a::show_one();
