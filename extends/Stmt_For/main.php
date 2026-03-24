<?php

$sec_data = "security-data"; // DEFINE STRING VALUE
$vul_data = $_GET["user-input"]; // SOURCE: USER INPUT

$array = array($sec_data, $vul_data);

$b = 0;

for ($i = 0; $i < 2; $i++) {
    echo "data: " . $array[$i]; // SINK: VULNERABLE FUNC
}
