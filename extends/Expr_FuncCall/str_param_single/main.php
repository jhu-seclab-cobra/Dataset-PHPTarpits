<?php

function no_param($data): void
{
    echo "no_param $data\n";
}

function single_param($param, $data): void
{
    echo "single_param \t";
    $param($data);
}

$vul_data = $_GET["user-input"];
$sec_data = "security-data";

single_param("no_param", $vul_data);
single_param("no_param", $sec_data);
