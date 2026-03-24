<?php

trait MyTrait
{
    public function info()
    {
        echo __TRAIT__;
    }

    public function render($data)
    {
        echo $data;
    }
}

class Page
{
    use MyTrait;
}

$vul = $_GET["p1"];
$page = new Page();
$page->render($vul);
$page->info();
