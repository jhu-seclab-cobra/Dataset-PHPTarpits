<?php

class BaseClass
{
    public $var = 'safe';

    public function __construct($b)
    {
        print "In BaseClass constructor\n";
        $this->var = $b;
    }
    public function __destruct()
    {
        print "Destroying " . __CLASS__ . "\n";
        echo $this->var;
    }
}

$b = $_GET["p1"];
// In BaseClass constructor
// There is XSS when the object will be destroyed
$obj = new BaseClass($b);
