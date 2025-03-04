<?php

function call_static($data)
{
    echo "data: $data\n";
}

static $staticVariable = "static";

$action = "call_" . $staticVariable;

$vul_data = $_GET["user-input"];
$sec_data = "security-data";

$action($vul_data);
$action($sec_data);
