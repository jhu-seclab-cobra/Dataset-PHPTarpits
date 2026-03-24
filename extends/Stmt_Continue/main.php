<?php

$sec_data = "secure_input";
$vul_data = $_GET["user-input"];

$data = $sec_data;
while ($data == "secure_input") {
    echo $data; // secure
    while (true) {
        $data = $vul_data;
        continue 2;
        echo $data; // deadcode
    }
    echo $data; // deadcode
}

echo $data; // vulnerable
