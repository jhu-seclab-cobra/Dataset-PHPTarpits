<?php

function targetA($data): void
{
    echo "TARGET A" . $data;
}

function targetB($data): void
{
    echo "TARGET B" . $data;
}

class MyClass
{
    public string $data;
    public string $callee;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function call(string $data): void
    {
        ($this->callee)($data . $this->data);
    }
}

$vul_data = $_GET["user-input"];
$sec_data = "security-data";

$oa = new MyClass($vul_data);
$ca = clone $oa;
$oa->callee = "targetA";
$ca->callee = "targetA";
$oa->call($vul_data);
$ca->call($sec_data);

$ob = new MyClass($sec_data);
$cb = clone $ob;
$ob->callee = "targetB";
$cb->callee = "targetB";
$ob->call($vul_data);
$cb->call($sec_data);
