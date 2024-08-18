<?php
function showArray($arr)
{
    if (is_array($arr)) {
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    }
}

showArray($_POST);

if (isset($_POST['rules'])) {
    echo "<h2>Rules accepted</h2>";
} else {
    echo "<h2>Please read and accept the rules!</h2>";
}
