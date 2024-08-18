<?php require "include/header.php" ?>

<!-- Login button -->
<script>
    let loginButton = document.getElementById('login-btn');
    let helloUser = document.getElementById('hello-user');

    let isLogin = <?php session_start();
                    if (isset($_SESSION['is_login']) && $_SESSION['is_login'] === true) echo 1;
                    else echo 0 ?>;
    let username = '<?php if (isset($_SESSION['username'])) echo $_SESSION['username'];
                    else echo '' ?>';
    if (isLogin) {
        loginButton.textContent = 'Logout';
        helloUser.innerHTML = `
        <p>Hello <b><i><u>${username}</u></i></b></p>
        `;
    } else
        loginButton.textContent = 'Login';
</script>
<!--  -->

<?php
$page = !empty($_GET['page']) ? $_GET['page'] : 'home';
$path = "pages/{$page}.php";

if (file_exists($path)) {
    if ($page == 'login')
        header("location: assets/php/logoutHandle.php");
    else
        require $path;
} else {
    header("location: include/404.php");
}

?>

<?php require "include/footer.php" ?>

<script src='assets/js/app.js'></script>