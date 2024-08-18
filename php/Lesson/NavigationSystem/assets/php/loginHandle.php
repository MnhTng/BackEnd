<?php
require "signupHandle.php";

if (isset($_POST['btn_login'])) {
    $error = array();

    session_start();
    $userInfo = array(
        'username' => isset($_SESSION['username']) ? $_SESSION['username'] : '',
        'password' => isset($_SESSION['password']) ? $_SESSION['password'] : ''
    );

    $username = $_POST["username"];
    $password = $_POST["password"];

    if ((!empty($userInfo['username']) && $username == $userInfo['username']) && (!empty($userInfo['password']) && $password == $userInfo['password'])) {
        if (isset($_POST['remember_me'])) {
            setcookie('username', $username);
            setcookie('password', $password);
        }

        $_SESSION['is_login'] = true;
        
        $redirect_to = $_POST['redirect_to'];
        header("location: {$redirect_to}");
    } else {
        // Chuan hoa username
        if (empty($username))
            $error['username'] = 'Không được để trống tên đăng nhập';
        else {
            if (!(strlen($username) >= 6 && strlen($username) <= 32))
                $error['username'] = 'Tên đăng nhập phải có độ dài từ 6 đến 32 ký tự';
            else {
                if (!usernameRegex($username))
                    $error['username'] = 'Tên đăng nhập phải chứa chữ cái, chữ số';
                else if ($username != $userInfo['username'])
                    $error['username'] = 'Tên đăng nhập không chính xác';
            }
        }

        // Chuan hoa password
        if (empty($password))
            $error['password'] = 'Không được để trống mật khẩu';
        else {
            if (!(strlen($password) >= 6))
                $error['password'] = 'Mật khẩu phải có độ dài từ 6 ký tự trở lên';
            else {
                if (!passwordRegex($password))
                    $error['password'] = 'Mật khẩu phải chứa chữ cái, chữ số, gạch dưới hoặc ký tự đặc biệt';
                else if ($password != $userInfo['password'])
                    $error['password'] = 'Mật khẩu không chính xác';
            }
        }
    }
}
