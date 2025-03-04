<?php

function basic_func($data)
{
    echo "Some data " . $data;
}

$vul_data = $_GET["user-input"];
$sec_data = "security-data";

basic_func($vul_data); // UserDef Func: basic_func@:2
basic_func($sec_data); // UserDef Func: basic_func@:2

var_dump($vul_data); // Builtin Func: var_dump@Builtin[standard]
var_dump($sec_data); // Builtin Func: var_dump@Builtin[standard]

unknown($vul_data); // Stretch Func: unknown@Stretched
unknown($sec_data); // UserDef Func: basic_func@:2
