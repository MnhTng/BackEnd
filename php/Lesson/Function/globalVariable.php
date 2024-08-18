<?php
$a = 10;
$b = 5;

function sum()
{
    // return $GLOBALS['a'] + $GLOBALS['b']; 
    global $a, $b;
    return $a + $b;
}
echo sum();
