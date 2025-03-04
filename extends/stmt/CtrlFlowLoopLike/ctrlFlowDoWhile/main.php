<?php

$sec_data = "security-data";
$vul_data = $_GET["user-input"];

$array = [$sec_data, $vul_data];

$i = 1;

do {
    echo "data: " . $array[$i];
} while (--$i >= 0);
