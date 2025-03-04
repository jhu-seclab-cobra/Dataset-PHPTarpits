<?php

class FetchConstMagicMeth
{
    public function fetchConstMagicMeth()
    {
        $vul_data = $_GET["user-input"];
        if (__METHOD__ === 'fetchConstMagicMeth') {
            echo "Case01 $vul_data (TRUE POSITIVE)\n";
        } else {
            echo "Case01 $vul_data (FALSE POSITIVE)\n";
        }
    }
}

$obj = new FetchConstMagicMeth();
$obj->fetchConstMagicMeth();

if (__METHOD__ === '') {
    echo "Case02 $vul_data (TRUE POSITIVE)\n";
} else {
    echo "Case02 $vul_data (FALSE POSITIVE)\n";
}
