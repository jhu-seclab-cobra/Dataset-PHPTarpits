<?php

namespace {
    // Global namespace case
    $vul_data = $_GET["user-input"];

    if (__NAMESPACE__ === '') {
        echo "Case01 $vul_data (TRUE POSITIVE)\n";
    } else {
        echo "Case01 $vul_data (FALSE POSITIVE)\n";
    }
}

// Single-level namespace

namespace MyNamespace {

    class FetchConstMagicNamespace
    {
        public function fetchConstMagicNamespace()
        {
            $vul_data = $_GET["user-input"];
            if (__NAMESPACE__ === 'MyNamespace') {
                echo "Case02 $vul_data (TRUE POSITIVE)\n";
            } else {
                echo "Case02 $vul_data (FALSE POSITIVE)\n";
            }
        }
    }

    $obj = new FetchConstMagicNamespace();
    $obj->fetchConstMagicNamespace();

    $vul_data = $_GET["user-input"];

    if (__NAMESPACE__ === 'MyNamespace') {
        echo "Case03 $vul_data (TRUE POSITIVE)\n";
    } else {
        echo "Case03 $vul_data (FALSE POSITIVE)\n";
    }
}

// Nested namespace

namespace MyNamespace\SubNamespace {

    class FetchConstMagicNestedNamespace
    {
        public function fetchConstMagicNestedNamespace()
        {
            $vul_data = $_GET["user-input"];
            if (__NAMESPACE__ === 'MyNamespace\SubNamespace') {
                echo "Case04 $vul_data (TRUE POSITIVE)\n";
            } else {
                echo "Case04 $vul_data (FALSE POSITIVE)\n";
            }
        }
    }

    $obj = new FetchConstMagicNestedNamespace();
    $obj->fetchConstMagicNestedNamespace();

    $vul_data = $_GET["user-input"];

    if (__NAMESPACE__ === 'MyNamespace\SubNamespace') {
        echo "Case05 $vul_data (TRUE POSITIVE)\n";
    } else {
        echo "Case05 $vul_data (FALSE POSITIVE)\n";
    }
}


// Alias namespace

namespace OriginalNamespace\SubNamespace {
    use OriginalNamespace\SubNamespace as AliasNamespace;

    class FetchConstMagicAliasNamespace
    {
        public function fetchConstMagicAliasNamespace()
        {
            $vul_data = $_GET["user-input"];
            if (__NAMESPACE__ === 'OriginalNamespace\SubNamespace') {
                echo "Case06 $vul_data (TRUE POSITIVE)\n";
            } else {
                echo "Case06 $vul_data (FALSE POSITIVE)\n";
            }
        }
    }

    $obj = new AliasNamespace\FetchConstMagicAliasNamespace();
    $obj->fetchConstMagicAliasNamespace();

    $vul_data = $_GET["user-input"];

    if (__NAMESPACE__ === 'OriginalNamespace\SubNamespace') {
        echo "Case07 $vul_data (TRUE POSITIVE)\n";
    } else {
        echo "Case07 $vul_data (FALSE POSITIVE)\n";
    }

}
