<?php

$data = "";

function call_main(): void
{
    global $data;
    echo "data: $data\n";
}

$vul_data = $_GET["user-input"];
$sec_data = "security-data";

$data = $vul_data;
call_main();

$data = $sec_data;
call_main();
