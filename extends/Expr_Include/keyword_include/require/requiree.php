<?php

global $vul_data, $sec_data;

function requiree_func($data): void
{
    echo "requiree $data\n";
}

n01\requirer_func($vul_data);
requiree_func($sec_data);
