<?php

function no_param($data): void
{
    echo "no_param $data\n";
}

function one_param($param, $data): void
{
    echo "one_param \t";
    $param($data);
}

function two_param($param1, $param2, $data): void
{
    echo "two_param \t";
    $param1($param2, $data);
}

$vul_data = $_GET["user-input"];
$sec_data = "security-data";

two_param("one_param", "no_param", $vul_data);
two_param("one_param", "no_param", $sec_data);
