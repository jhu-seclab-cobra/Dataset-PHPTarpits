<?php

try {
    $vul_data = $_GET["user-input"];
    echo "data: $vul_data";
    $sec_data = "security-data";
    echo "data: $sec_data";
} catch (Exception $e) {
    echo "data: $vul_data";
    echo "data: $sec_data";
}
