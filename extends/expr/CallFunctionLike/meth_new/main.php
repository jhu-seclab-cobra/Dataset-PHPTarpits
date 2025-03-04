<?php

class TestClass
{
    public function __construct($data)
    {
        echo "TClass Construct.\n" . $data;
    }
}

$vul_data = $_GET["user-input"];
$sec_data = "security-data";

new TestClass($vul_data);
new TestClass($sec_data);
