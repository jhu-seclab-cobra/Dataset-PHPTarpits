<?php

$sec_data = "security-data";
$vul_data = $_GET["user-input"];

$array = [$sec_data, $vul_data];

$b = 0;

foreach ($array as $obj) {
    echo $obj;
}
