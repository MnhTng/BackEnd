<?php
function showArray($arr)
{
    if (is_array($arr)) {
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    }
}

// showArray($_SERVER);
// showArray($_POST);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && array_key_exists('btn_login', $_POST)) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == 'MnhTng' && $password == 'tungdz')
        echo "Đăng nhập thành công";
    else
        echo "Đăng nhập thất bại";
}
