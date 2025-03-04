<?php

class Property
{
    public string $prop;

    public function target($data): void
    {
        echo "property->target\n" . $data . $this -> prop;
    }
}

class Basic
{
    public Property $property;

    public function __construct()
    {
        $this->property = new Property();
    }

    public function update_prop($data): void
    {
        $this->property->prop = $data;
    }

    public function target($data): void
    {
        $this->property->target($data);
    } // L4

}

$vul_data = $_GET["user-input"];
$sec_data = "security-data";

(new Basic())->target($vul_data);
(new Basic())->target($sec_data);

(new Basic())->property->target($vul_data);
(new Basic())->property->target($sec_data);

$basic01 = new Basic();
$basic01->update_prop($vul_data);
$basic01->target("sec");

$basic02 = new Basic();
$basic02->update_prop($sec_data);
$basic02->target("sec");
