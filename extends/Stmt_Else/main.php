<?php

function callee($data, $cond): void
{
    if ($cond) {
        echo "data";
    } else {
        echo $data;
    }
}

$vul_data = $_GET["user-input"];

callee($vul_data, true);
callee($vul_data, false);
