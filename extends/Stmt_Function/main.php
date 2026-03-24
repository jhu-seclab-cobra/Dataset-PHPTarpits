<?php

function outerFuncDef(): void
{
    function callee($data): void
    {
        echo "data: $data \n";
    }
}

outerFuncDef();

$vul_data = $_GET["user-input"];
$sec_data = "security-data";

callee($vul_data);
callee($sec_data);
