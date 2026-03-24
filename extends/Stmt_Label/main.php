<?php

$a = $_GET["p1"];
goto skip_safe;
$a = "safe";
skip_safe:
echo $a;

$b = $_GET["p1"];
goto skip_danger;
echo $b;
skip_danger:
echo "done";
