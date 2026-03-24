<?php

class DataHolder
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function display()
    {
        echo $this->data;
    }
}

$tainted = $_GET["p1"];

$obj = new DataHolder($tainted);

// TP: nullsafe call echoes tainted data
$obj?->display();

// FP: nullsafe call echoes safe data
$obj = new DataHolder("safe_value");
$obj?->display();
