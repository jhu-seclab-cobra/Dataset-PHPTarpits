<?php

$vul_data = $_GET["p1"];
$sec_data = "ls -la";

$cmd = "echo " . $vul_data;
$output_vul = `$cmd`;

$output_sec = `ls -la`;

echo $output_vul;
echo $output_sec;
