<?php

function one_param1($param, $data): void
{
    echo "one_param \t";
    one_param2($param, $data);
}

function one_param2($param, $data): void
{
    echo "one_param \t";
    one_param3($param, $data);
}

function one_param3($param, $data): void
{
    echo "one_param \t";
    one_param4($param, $data);
}

function one_param4($param, $data): void
{
    echo "one_param \t";
    $param($data);
}

function no_param($data): void
{
    echo "no_param $data\n";
}

$vul_data = $_GET["user-input"];
$sec_data = "security-data";

one_param1("no_param", $vul_data);
one_param1("no_param", $sec_data);
