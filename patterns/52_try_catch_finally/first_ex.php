<?php

function foo($b)
{
    $bar = $b;
    try {
        throw new Exception('Exception');
    } catch (Exception $e) {
        echo "catch \n";
        // Before return, the finally will run
        return $bar;
    } finally {
        echo "finally \n";
        // This value will return from the function
        return $bar;
    }
}
$b = $_GET["p1"];
echo foo($b . "\n");
// The output:
// catch
// finally
// $b without sanitize, XSS vulnerability
