<?php

$vul_data = $_GET["user-input"];

goto label;
echo $vul_data; // deadcode

label:
echo $vul_data; // vulnerable
