<?php

class autoloadee
{
    public function someFunc()
    {
        echo "file/someFunc\n";
    }
}


function autoloadee(): void
{
    echo "includee\n";
}
