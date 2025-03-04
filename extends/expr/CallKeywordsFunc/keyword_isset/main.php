<?php

$str_data = "some data";
$null_data = null;
if (isset($str_data)) {
    echo "1 SET VAR\n";
}
if (!isset($null_data)) {
    echo "2 UNSET NULL VAR\n";
}
if (isset($undefined)) {
    echo "3 SET UNDEFINED\n";
} else {
    echo "4 UNSET UNDEFINED\n";
}
