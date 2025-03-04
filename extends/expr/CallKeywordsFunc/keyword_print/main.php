<?php

function some_func()
{
    print "PRINT IN FUNC;\n";
}

class SomeClass
{
    public function call()
    {
        print "PRINT IN METHOD;\n";
    }
}

some_func();
(new SomeClass())->call();
print "PRINT IN GLOBAL;\n";
