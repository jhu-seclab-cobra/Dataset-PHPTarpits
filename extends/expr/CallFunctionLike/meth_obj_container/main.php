<?php


class Core
{
    public function __construct($data)
    {
        $this->prop = $data;
    }

    public function target()
    {
        echo "core -> target \n" . $this->prop;
    }
}

class Container
{
    public $core;

    public function __construct($outCore = null)
    {
        $this->core = $outCore;
    }

    public function middle_target()
    {
        $this->core->core->target();
    }
}


$vul_data = $_GET["user-input"];
$sec_data = "security-data";

$core_vul = new Core($vul_data);
$core_sec = new Core($sec_data);

$core_vul->target();
$core_sec->target();

$container1 = new Container(new Container(new Container(new Container($core_vul))));
$container1->core->core->core->core->target();
$container1->core->core->middle_target();

$container2 = new Container(new Container(new Container(new Container($core_sec))));
$container2->core->core->core->core->target();
$container2->core->core->middle_target();
