<?php
require "validationForm.php";

if (isset($_POST['btn_signup'])) {
    $error = array();

    $fullname = $_POST["fullname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];
    $password = $_POST["password"];
    $re_enter_password = $_POST["re_enter_password"];

    if (!empty($fullname) && usernameRegex($username) && passwordRegex($password) && passwordRegex($re_enter_password) && $re_enter_password == $password && emailRegex($email) && phoneRegex($tel)) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;

        $redirect_to = $_POST['redirect_to'];
        header("Location: {$redirect_to}");
    } else {
        // Chuan hoa fullname
        if (empty($fullname))
            $error['fullname'] = 'Không được để trống họ tên';

        // Chuan hoa username
        if (empty($username))
            $error['username'] = 'Không được để trống tên đăng nhập';
        else {
            if (!(strlen($username) >= 6 && strlen($username) <= 32))
                $error['username'] = 'Tên đăng nhập phải có độ dài từ 6 đến 32 ký tự';
            else {
                if (!usernameRegex($username))
                    $error['username'] = 'Tên đăng nhập phải chứa chữ cái, chữ số';
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
            }
        }

        // Chuan hoa email
        if (empty($email))
            $error['email'] = 'Không được để trống email';
        else {
            if (!emailRegex($email))
                $error['email'] = 'Email phải có dạng mẫu: abc123@domain1.domain2';
        }

        // Chuan hoa tel
        if (empty($tel))
            $error['tel'] = 'Không được để trống số điện thoại';
        else {
            if (!phoneRegex($tel))
                $error['tel'] = 'Số điện thoại phải bắt đầu từ số 0 và có 10 đến 12 chữ số';
        }

        // Chuan hoa re-enter password
        if (empty($password))
            $error['re_enter_password'] = 'Vui lòng nhập mật khẩu trước';
        else {
            if (empty($re_enter_password))
                $error['re_enter_password'] = 'Vui lòng xác nhận lại mật khẩu';
            else if ($re_enter_password != $password)
                $error['re_enter_password'] = 'Mật khẩu không khớp';
        }
    }
}
