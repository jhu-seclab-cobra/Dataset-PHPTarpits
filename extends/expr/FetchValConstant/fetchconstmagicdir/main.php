<?php

$vul_data = $_GET["user-input"];

// Case 01: Check if the current directory is not 'fetchconstmagicdir'
$position = strrpos(__DIR__, '/');
$cur_dir = substr(__DIR__, $position + 1);
if ($cur_dir === 'fetchconstmagicdir') {
    echo "Case01 $vul_data (TRUE POSITIVE)\n";
} else {
    echo "Case01 $vul_data (FALSE POSITIVE)\n";
}
