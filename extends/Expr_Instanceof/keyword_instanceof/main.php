<?php

class MyClass
{
}

class AnotherClass extends MyClass
{
}

$obj = new AnotherClass();

if ($obj instanceof AnotherClass) {
    echo "The object is AnotherClass";
}

// The object is also an instance of the class it is derived from
if ($obj instanceof MyClass) {
    echo "The object is MyClass<br>";
}
