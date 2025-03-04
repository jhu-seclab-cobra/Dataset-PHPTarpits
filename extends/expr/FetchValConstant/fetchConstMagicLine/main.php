<?php

$vul_data = $_GET["user-input"];

// Case 01: Check if the current file is 'fetchConstMagicFile'
if (__LINE__ === 6) {
    echo "Case01 $vul_data (TRUE POSITIVE)\n";
} else {
    echo "Case01 $vul_data (FALSE POSITIVE)\n";
}
