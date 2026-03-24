<?php

function my_autoloader($class): void
{
    include './' . $class . '.php';
}

spl_autoload_register('my_autoloader');

$obj = new autoloadee();

$obj->someFunc();

autoloadee();
