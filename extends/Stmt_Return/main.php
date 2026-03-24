<?php

function get_argument($argument): string
{
    return $argument;
    echo $argument;
}

$sec_data = "secure_input";
$vul_data = $_GET["user-input"];

echo get_argument($sec_data);
echo get_argument($vul_data);
