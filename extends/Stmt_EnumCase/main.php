<?php

enum Status: string
{
    case Active = 'active';
    case Inactive = 'inactive';
}

function processStatus(Status $status, string $data): string
{
    return $status->value . ": " . $data;
}

$vul_data = $_GET["p1"];
$sec_data = "safe-data";

$status = Status::Active;

$result = processStatus($status, $vul_data);
echo "Case01 $result (TRUE POSITIVE)\n";

$result2 = processStatus($status, $sec_data);
echo "Case02 $result2 (FALSE POSITIVE)\n";
