<?php

const TEST_CONST_GLOBAL = "test";

function call_test($data): void
{
    echo "data: $data\n";
}

$action = 'call_' . TEST_CONST_GLOBAL;

$vul_data = $_GET["user-input"];
$sec_data = "security-data";

$action($vul_data);
$action($sec_data);
