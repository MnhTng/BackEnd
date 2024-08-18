<?php
function checkError($value)
{
    global $error;
    if (isset($error[$value]))
        return "<p class='error'>{$error[$value]}</p>";
}
