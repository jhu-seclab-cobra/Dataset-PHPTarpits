<?php

function f1($cond, $data): void
{
    if ($cond) {
        f2($cond, $data);
    } else {
        echo "in f1\n" . $data;
    }
}

function f2($cond, $data): void
{
    if (!$cond) {
        f1($cond, $data);
    } else {
        echo "in f2\n";
    }
}

$vul_data = $_GET["user-input"];
$sec_data = "security-data";

f1(true, $vul_data);
f1(true, $sec_data);

f2(true, $vul_data);
f2(true, $sec_data);
