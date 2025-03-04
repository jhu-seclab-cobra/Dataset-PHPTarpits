<?php

class myclass
{
    public static $sprop;
};

$y = "abc";
myclass::$sprop = &$y;
$y = $_GET["p1"];
echo myclass::$sprop;
