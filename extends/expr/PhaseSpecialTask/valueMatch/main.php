<?php

$vul_data = $_GET["user-input"];
$sec_data = "security-data";

echo match("secure") {
    "secure" => $sec_data,
    "vulnerable" => $vul_data,
};

echo match("vulnerable") {
    "secure" => $sec_data,
    "vulnerable" => $vul_data,
};
