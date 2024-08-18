<script>
    let UserInfo = "UserInfo";
    const load = () => {
        return JSON.parse(localStorage.getItem(UserInfo)) || [];
    };
    let info = load();
</script>

<?php
require "signupHandle.php";

if (isset($_POST['btn_login'])) {
    $error = array();

    $username = $_POST["username"];
    $password = $_POST["password"];
    $userInfo = array(
        'username' => '',
        'password' => ''
    );

    if (session_status() == PHP_SESSION_NONE)
        session_start();
    // Khi vừa đăng kí xong
    if (isset($_SESSION['username'])) {
        if ($_SESSION['username'] == $username && $_SESSION['password'] == $password) {
            $userInfo = array(
                'username' => $username,
                'password' => $password
            );
        }
    } else {
        // Khi đăng nhập từ home
        $jsonInfo = "<script>document.write(JSON.stringify(info));</script>";
        $users = json_decode($jsonInfo, true);

        if (!empty($users)) {
            foreach ($users as $user) {
                if ($user['username'] !== '' && $user['username'] == $username && $user['password'] == $password) {
                    $userInfo = array(
                        'username' => $username,
                        'password' => $password
                    );
                    break;
                }
            }
        }
    }

    if ($userInfo['username'] !== '' && $username !== '' && $password !== '') {
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
