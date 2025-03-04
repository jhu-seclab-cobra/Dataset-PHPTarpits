<?php

spl_autoload_register(function ($class_name) {
    include './'. $class_name . '.php';
});
$a = $_GET["p1"];
$obj  = new MyClass1($a);
