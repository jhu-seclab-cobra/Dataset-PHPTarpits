<?php

class myclass
{
    public function F($b)
    {
        self::T($b);
    }

    public function T($b)
    {
        echo $b;
    }
}


$obj = new myclass();

$obj->F($_GET['p1']);
