<?php

class myclass
{
    public static function F($b)
    {
        echo $b;
    }
}

$a = $_GET["p1"];
//$a = "abc";
$func = "F";
myclass::$func($a);
