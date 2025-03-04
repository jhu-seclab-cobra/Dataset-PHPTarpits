<?php

function yieldData(): Generator
{
    yield "user-input" => $_GET["user-input"];
}

$user_data = yieldData();

foreach (yieldData() as $key => $value) {
    echo "key is: $key";
    echo "value is: $value";
}
