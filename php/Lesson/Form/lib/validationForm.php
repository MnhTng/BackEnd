<?php
function usernameRegex($username)
{
    $pattern = "/^[A-Za-z0-9]{6,32}$/";
    return preg_match($pattern, $username, $matches);
}

function passwordRegex($password)
{
    $pattern = "/^(([A-Za-z0-9])([_\.!@#$%^&*-]?)){6,32}$/";
    return preg_match($pattern, $password, $matches);
}

function emailRegex($email)
{
    $pattern = "/^([A-Za-z0-9]{6,32})@([A-Za-z0-9]{2,12})(.[A-Za-z]{2,12})+$/";
    return preg_match($pattern, $email, $matches);
}

function phoneRegex($phone)
{
    $pattern = "/^0[0-9]{9,11}$/";
    return preg_match($pattern, $phone, $matches);
}

function setValue($value)
{
    global $$value, $userInfo;
    if (isset($$value) && $$value == $userInfo[$value])
        return $$value;
    return false;
}

function checkError($value)
{
    global $error;
    if (isset($error[$value]))
        return "<p class='error'>{$error[$value]}</p>";
    return false;
}
