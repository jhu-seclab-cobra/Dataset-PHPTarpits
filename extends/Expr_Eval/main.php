<?php

$vul_data = $_GET["user-input"];
$sec_data = "security-data";

$eval_with_params = " function some_func_params(\$data) { echo 'ECHO IN FUNC \n' . \$data; } ";
eval($eval_with_params);
some_func_params($vul_data);
some_func_params($sec_data);
