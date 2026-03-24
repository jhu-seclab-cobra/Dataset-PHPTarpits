<?php

class ParentClass
{
    public function __construct($data)
    {
        echo "Parent Construct.\n" . $data;
    }
}

class TestClass extends ParentClass
{
    public function __construct($data)
    {
        parent::__construct($data);
        ParentClass::__construct($data);
        echo "TClass Construct.\n";
    }
}

$vul_data = $_GET["user-input"];
$sec_data = "security-data";

new TestClass($vul_data);
new TestClass($sec_data);
