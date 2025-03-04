<?php

class parent_class
{
    public function __construct($b)
    {
        echo $b;
    }

    public function F($b)
    {
        $a = $b;
    }
}

class child_class extends parent_class
{
}

$b = new child_class($_GET['p1']);
