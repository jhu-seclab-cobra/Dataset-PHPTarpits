<?php

namespace Utils {
    function sink($x) { echo $x; }
    function safe($x) { echo "safe"; }
}

namespace Main {
    use function Utils\{sink, safe};

    $vul_data = $_GET["p1"];
    $sec_data = "safe-data";

    sink($vul_data);
    sink($sec_data);

    safe($vul_data);
    safe($sec_data);
}
