<?php

class FetchConstMagicClass
{
    public function fetchConstMagicClass($data)
    {

        if (__CLASS__ === 'FetchConstMagicClass') {
            echo "Case01 $data (TRUE POSITIVE)\n";
        } else {
            echo "Case01 $data (FALSE POSITIVE)\n";
        }
    }
}

$vul_data = $_GET["user-input"];

$obj = new FetchConstMagicClass();
$obj->fetchConstMagicClass($vul_data);

if (__CLASS__ === '') {
    echo "Case02 $vul_data (TRUE POSITIVE)\n";
} else {
    echo "Case02 $vul_data (FALSE POSITIVE)\n";
}
