<?php

function call_parent_child($data): void
{
    echo "CALL $data\n";
}

class DeclarePropTestParent
{
    public string $parent = "parent_";
}

class DeclarePropTestChild extends DeclarePropTestParent
{
    public string $child = "child";
}

$obj = new DeclarePropTestChild();

$action = "call_" . $obj -> parent . $obj -> child;

$vul_data = $_GET["user-input"];
$sec_data = "security-data";

$action($vul_data);
$action($sec_data);
