<?php

function callee($data, $cond): void
{
    switch ($cond) {
        case 1:
        case 2:
        case 3:
            echo $data;
            break;
    }
}

$sec_data = "security-data";
$vul_data = $_GET["user-input"];

callee($sec_data, 1);
callee($vul_data, 1);
