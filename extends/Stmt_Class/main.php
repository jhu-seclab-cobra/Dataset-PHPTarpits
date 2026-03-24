<?php

class DeclareClass
{
    public function callee1($data): void
    {
        echo "data, $data\n";
    }

    public function callee2($data): void
    {
        echo "data, $data\n";
    }

}

$vul_data = $_GET["user-input"];
$sec_data = "security-data";

$obj = new DeclareClass();
$obj -> callee1($vul_data);
$obj -> callee2($sec_data);
