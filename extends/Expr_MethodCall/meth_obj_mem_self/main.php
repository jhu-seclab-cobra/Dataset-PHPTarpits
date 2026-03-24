<?php

class Test
{
    private function callee($data): void
    {
        echo "callee\n" . $data;
        $this->caller($data);
    }

    public function caller($data): void
    {
        echo "caller\n" . $data;
        $this->callee($data);
    }

}

$vul_data = $_GET["user-input"];

$test = new Test();
$test->caller($vul_data);
