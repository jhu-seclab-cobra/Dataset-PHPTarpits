<?php

function callee($data1, $data2, $cond): void
{
    if ($cond) {
        echo $data1;
    }
    if (!$cond) {
        echo $data2;
    }
}

$sec_data = "secure_input";
$vul_data = $_GET["user-input"];

callee($sec_data, $vul_data, true);
callee($sec_data, $vul_data, false);
