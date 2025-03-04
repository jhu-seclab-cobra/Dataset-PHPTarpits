<?php

class myclass
{
    public function __construct()
    {
        $this->b = $_GET['p1'];
        //$this->b = "abc";
    }

    public function F()
    {
        $obj2 = new self();
        $obj2->T();
    }

    public function T()
    {
        echo $this->b;
    }
}


$obj = new myclass();
$obj2 = $obj->F();
