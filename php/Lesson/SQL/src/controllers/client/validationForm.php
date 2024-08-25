<?php
function nameRegex($name)
{
    $pattern = "/^([a-zA-Záàảãạăắằẳẵặâấầẩẫậéèẻẽẹêềếểễệíìỉĩịóòỏõọôốồổỗộơớờởỡợúùủũụưừứửữựýỳỷỹỵđ][\s]*){2,32}$/";
    return preg_match_all($pattern, $name, $matches);
}

function dateRegex($date)
{
    $pattern = "/^(19|20)\d{2}-(0[1-9]|1[0-2])-(0[1-9]|1\d|2\d|3[01])$/";
    $current = date("Y-m-d");

    return preg_match_all($pattern, $date, $matches) && $date < $current;
}

function emailRegex($email)
{
    $pattern = "/^([A-Za-z]{2,32})([a-z0-9_]{0,32})@gmail(.[A-Za-z]{2,12})+$/";
    return preg_match($pattern, $email, $matches);
}

function phoneRegex($phone)
{
    $pattern = "/^0[0-9]{9,11}$/";
    return preg_match($pattern, $phone, $matches);
}

function setValue($value)
{
    if (isset($$value) && $$value == $_POST[$value])
        return $$value;
}