<?php
require '../lib/validationForm.php';

if (isset($_POST['btn_login'])) {
    $error = array();
    $userInfo = array(
        'username' => 'MnhTng',
        'password' => 'tungdz'
    );

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == $userInfo['username'] && $password == $userInfo['password']) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;

        $redirect_to = $_POST['redirect_to'];
        header("location: {$redirect_to}");
    } else {
        if (!(strlen($username) >= 6 && strlen($username) <= 32)) {
            $error['username'] = 'Tên đăng nhập phải từ 6 đến 32 ký tự';
        } else {
            if (!usernameRegex($username))
                $error['username'] = 'Tên đăng nhập phải chứa chữ cái, chữ số';
            else if ($username != $userInfo['username'])
                $error['username'] = 'Tên đăng nhập không chính xác';
        }

        if (!(strlen($password) >= 6 && strlen($password) <= 32)) {
            $error['password'] = 'Mật khẩu phải từ 6 đến 32 ký tự';
        } else {
            if (!passwordRegex($password))
                $error['password'] = 'Mật khẩu phải chứa chữ cái, chữ số, gạch dưới hoặc ký tự đặc biệt';
            else if ($password != $userInfo['password'])
                $error['password'] = 'Mật khẩu không chính xác';
        }
    }
}
