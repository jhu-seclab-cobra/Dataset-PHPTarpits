<?php

$sec_data = "security-data";
$vul_data = $_GET["user-input"];

$array = [$sec_data, $vul_data];

$i = 2;

while ($i-- > 0) {
    echo "data: " . $array[$i];
}
