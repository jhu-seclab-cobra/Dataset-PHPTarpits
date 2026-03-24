<?php

try {
    $vul_data = $_GET["user-input"];
    $sec_data = "security-data";
} finally {
    echo "data: $vul_data";
    echo "data: $sec_data";
}
