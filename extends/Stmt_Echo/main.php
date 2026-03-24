<?php

function some_func($data)
{
    echo "ECHO IN FUNC; $data\n";
}

class SomeClass
{
    public function call($data)
    {
        echo "ECHO IN METHOD; $data\n";
    }
}

$vul_data = $_GET["user-input"];
$sec_data = "security-data";

some_func($vul_data);
some_func($sec_data);

(new SomeClass())->call($vul_data);
(new SomeClass())->call($sec_data);

echo "ECHO IN GLOBAL; $vul_data\n";
echo "ECHO IN GLOBAL; $sec_data\n";
