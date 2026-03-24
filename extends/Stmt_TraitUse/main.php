<?php

trait MyTrait
{
    public function render($data)
    {
        echo "output: $data\n";
    }
}

class Page
{
    use MyTrait;
}

$vul_data = $_GET["p1"];
$sec_data = "safe-string";

$page = new Page();

// TP: tainted data flows through trait method
$page->render($vul_data);

// FP: safe data flows through trait method
$page->render($sec_data);
