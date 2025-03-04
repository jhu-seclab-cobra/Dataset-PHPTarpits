<?php

class CtrlFlowCatch extends Exception
{
}

try {
    $vul_data = $_GET["user-input"];
    $sec_data = "security-data";
    throw new CtrlFlowCatch("CtrlFlowCatch");
} catch (CtrlFlowCatch $e) {
    echo "data: $vul_data";
    echo "data: $sec_data";
} catch (Exception $e) {
    echo "data: $vul_data";
    echo "data: $sec_data";
}
