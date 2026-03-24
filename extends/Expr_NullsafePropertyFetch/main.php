<?php

class DataHolder
{
    public $data = "";
}

// TP: tainted nullsafe property access
$vul_data = $_GET["p1"];
$obj = new DataHolder();
$obj->data = $vul_data;
echo $obj?->data;

// FP: safe nullsafe property access
$obj2 = new DataHolder();
$obj2->data = "safe";
echo $obj2?->data;
