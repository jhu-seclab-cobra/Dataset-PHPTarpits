<?php

function no_param1($data): void
{
    echo "no_param1 $data\n";
}

function no_param2($data): void
{
    echo "no_param2 $data\n";
}

function one_param_1($param, $data): void
{
    echo "one_param_1 \t";
    $param($data);
}

function one_param_2($param, $data): void
{
    echo "one_param_2 \t";
    $param($data);
}

function two_param($param1, $param2, $data): void
{
    echo "two_param \t";
    $param1($param2, $data);
}


$vul_data = $_GET["user-input"];
$sec_data = "security-data";

two_param(param1: "one_param_1", param2: "no_param1", data: $vul_data);
two_param(param1: "one_param_1", param2: "no_param1", data: $sec_data);

two_param(param2: "no_param2", param1: "one_param_2", data: $vul_data);
two_param(param2: "no_param2", param1: "one_param_2", data: $sec_data);
