<?php

class Test
{
    public function callee1($data): void
    {
        echo "callee\n" . $data;
    }

    public function callee2($data): void
    {
        echo "callee\n" . $data;
    }
}

$vul_data = $_GET["user-input"];
$sec_data = "security-data";

$test = new Test();
$test->callee1($vul_data);
$test->callee2($sec_data);
