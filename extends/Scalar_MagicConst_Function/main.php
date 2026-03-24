<?php

function fetchConstMagicFunc()
{
    $vul_data = $_GET["user-input"];
    if (__FUNCTION__ === 'fetchConstMagicFunc') {
        echo "Case01 $vul_data (TRUE POSITIVE)\n";
    } else {
        echo "Case01 $vul_data (FALSE POSITIVE)\n";
    }
}

fetchConstMagicFunc();

if (__FUNCTION__ === '') {
    echo "Case02 $vul_data (TRUE POSITIVE)\n";
} else {
    echo "Case02 $vul_data (FALSE POSITIVE)\n";
}
