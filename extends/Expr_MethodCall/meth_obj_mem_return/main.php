<?php

class Createe
{
    public function action($data)
    {
        echo "ACTION\n" . $data;
    }
}

class Creator
{
    public function linked($data): void
    {
        $this->createe()->action($data);
    }

    public function action($data): void
    {
        $createe = $this->createe();
        $createe->action($data);
    }

    public function createe(): Createe
    {
        return new Createe();
    }
}


$vul_data = $_GET["user-input"];
$sec_data = "security-data";

$creator = new Creator();

$creator->action($vul_data);
$creator->action($sec_data);

$creator->linked($vul_data);
$creator->linked($sec_data);
