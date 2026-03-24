<?php

class ParentInstanceOfClass
{
}

class InstanceOfClass extends ParentInstanceOfClass
{
}

$vul_data = $_GET["user-input"];
$obj = new InstanceOfClass();

if ($obj instanceof InstanceOfClass) {
    echo "instance of class $vul_data\n";
}

if ($obj instanceof ParentInstanceOfClass) {
    echo "parent instance of class $vul_data\n";
}

if ($obj instanceof Exception) {
    echo "exception of class $vul_data\n";
}
