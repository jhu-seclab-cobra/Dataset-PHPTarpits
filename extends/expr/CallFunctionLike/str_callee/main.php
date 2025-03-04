<?php

function someFunc1($data): void
{
    echo "CALL someFunc1\n" . $data;
}

function someFunc2($data): void
{
    echo "CALL someFunc2\n" . $data;
}

$vul_data = $_GET["user-input"];
$sec_data = "security-data";

"someFunc1"($vul_data); // line 2
"someFunc1"($sec_data); // line 2

"someFunc2"($vul_data); // line 3
"someFunc2"($sec_data); // line 3

"var_dump"($vul_data);
"var_dump"($sec_data);
