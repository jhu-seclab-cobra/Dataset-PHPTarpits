<?php

function callee($data)
{
    echo "IN CALLEE\n $data";     // Built-in echo
}

function caller($data)
{
    echo "IN CALLER\n";     // Built-in echo
    callee($data);               // Line 3
}

$vul_data = $_GET["user-input"];
$sec_data = "security-data";

caller($vul_data);
caller($sec_data);
