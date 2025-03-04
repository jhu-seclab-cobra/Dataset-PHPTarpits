<?php

$vul_data = $_GET["user-input"];
$sec_data = "security-data";

$data = $vul_data;
require "callee.php";

$data = $sec_data;
require "callee.php";
