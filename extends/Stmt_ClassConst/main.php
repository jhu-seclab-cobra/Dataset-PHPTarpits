<?php

class DeclareConstClassTest
{
    public const CONST_CLASS = 'test';
}

function call_test($data): void
{
    echo "data: $data\n";
}

$action = 'call_' . DeclareConstClassTest::CONST_CLASS;

$vul_data = $_GET["user-input"];
$sec_data = "security-data";

$action($vul_data);
$action($sec_data);
