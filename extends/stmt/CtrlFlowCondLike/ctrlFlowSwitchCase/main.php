<?php

function callee($data, $cond): void
{
    $sec_data = "security-data";
    switch ($cond) {
        case 1:
            echo $sec_data;
            break;
        case 2:
        case 3:
            echo $data;
            break;
    }
}

$vul_data = $_GET["user-input"];

callee($vul_data, 1);
callee($vul_data, 2);
