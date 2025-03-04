<?php

namespace n01;

$vul_data = $_GET["user-input"];
$sec_data = "security-data";

function requirer_func($data): void
{
    echo "requirer_func $data\n";
}

require_once("requiree.php");

requirer_func($vul_data);
requirer_func($sec_data);

requiree_func($vul_data);
requiree_func($sec_data);
