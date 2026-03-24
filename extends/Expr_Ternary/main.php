<?php

$vul_data = $_GET["user-input"];
$sec_data = "security-data";

echo true ? $vul_data : $sec_data;
echo false ? $vul_data : $sec_data;
