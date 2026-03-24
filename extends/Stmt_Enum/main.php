<?php

enum DeclareEnumTest
{
    public static function callee($data): void
    {
        echo "data, $data\n";
    }

}

$vul_data = $_GET["user-input"];
$sec_data = "security-data";

DeclareEnumTest::callee($vul_data);
DeclareEnumTest::callee($sec_data);
