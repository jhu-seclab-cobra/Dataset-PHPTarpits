<?php

function callee($data, $cond1, $cond2): void
{
    if ($cond1) {
        echo "data";
    } elseif ($cond2) {
        echo $data;
    }
}

$vul_data = $_GET["user-input"];

callee($vul_data, false, false);
callee($vul_data, false, true);
