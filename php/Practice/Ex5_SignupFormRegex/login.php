<?php
include "assets/php/loginHandle.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="assets/css/login_signup_form/font.css">
    <link rel="stylesheet" href="assets/css/login_signup_form/global.css">
    <link rel="stylesheet" href="assets/css/login_signup_form/style.css">
    <title>Login Form</title>
</head>

<body>
    <form action="" method="post">
        <h1>Login</h1>
        <p id="login_notify">Enter your account</p>

        <fieldset>
            <legend>Username</legend>
            <input type="text" name="username" value="<?php echo setValue('username') ?>" autocomplete="off" spellcheck="false">
        </fieldset>
        <div class="error">
            <?php echo checkError('username') ?>
        </div>

        <fieldset>
            <legend>Password</legend>
            <input type="password" name="password" value="" autocomplete="off" spellcheck="false">
        </fieldset>
        <div class="error">
            <?php echo checkError('password') ?>
        </div>

        <div class="remember_me">
            <input type="checkbox" id="remember_me" name="remember_me">
            <label for="remember_me">Remember me</label>
        </div>

        <a class="form" href="">Forgot your password?</a>
        <a class="form" href="signup.php">Don't you have an account?</a>

        <input type="hidden" id="hidden" name="redirect_to" value="homePage.html">
        <button type="submit" name="btn_login" value="submit_login">Login</button>

        <script src="assets/js/app.js"></script>
    </form>
</body>

</html>