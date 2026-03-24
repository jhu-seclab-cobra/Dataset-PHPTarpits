<?php

namespace B {
    function callee($data): void
    {
        echo "in namespace B $data\n";
    }
}

namespace A\B {
    function callee($data): void
    {
        echo "in namespace A\\B $data\n";
    }
}

namespace {
    function caller($data): void
    {
        B\callee($data);
    }

    $vul_data = $_GET["user-input"];
    $sec_data = "security-data";

    B\callee($vul_data);
    caller($sec_data);

}
