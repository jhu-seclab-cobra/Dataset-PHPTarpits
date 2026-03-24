<?php

class Test
{
    public function callee()
    {
        $this->caller1();
        $this->caller2();
    }

    public function caller1()
    {
        $this->callee();
    }

    public function caller2()
    {
        $this->callee();
    }
}
