<?php

$vul_data = $_GET["user-input"];

// Case 01: Check if the current file is 'fetchConstMagicFile'
$position = strrpos(__FILE__, '/');
$cur_dir = substr(__FILE__, $position + 1);
if ($cur_dir == 'fetchConstMagicFile.php') {
    echo "Case01 $vul_data (TRUE POSITIVE)\n";
} else {
    echo "Case01 $vul_data (FALSE POSITIVE)\n";
}
