<?php

class Foo
{
    public static $b = 'safe';
    public function __construct($b)
    {
        self::$b = $b;
    }
    public static function baz()
    {
        // $b has the input, XSS Vulnerability
        echo self::$b;
    }
}
Foo::$b = $_GET["p1"];
echo Foo::baz();
