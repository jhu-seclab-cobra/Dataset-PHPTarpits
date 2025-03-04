<?php

namespace A {
    function first_def()
    {
        function inner_def()
        {
            function callee1($data)
            {
                echo "inside of func test callee1\n" . $data;
            }

            function callee2($data)
            {
                echo "inside of func test callee2\n" . $data;
            }
        } // line 7
    }
}

namespace B {

    use function A\first_def;

    first_def();     // Line 4
}

namespace C {

    use function A\callee1;
    use function A\callee2;
    use function A\inner_def;

    $vul_data = $_GET["user-input"];
    $sec_data = "security-data";

    inner_def();     // Line 5

    callee1($vul_data);       // Line 6
    callee1($sec_data);

    callee2($vul_data);       // Line 7
    callee2($sec_data);
}
