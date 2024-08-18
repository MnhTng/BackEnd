<?php
include "assets/php/signupHandle.php";
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
    <title>Sign Up Form</title>
</head>

<body>
    <form action="" method="post">
        <h1>Create Account</h1>

        <fieldset>
            <legend>Full name</legend>
            <input type="text" name="fullname" value="<?php if (isset($fullname) && !empty($fullname)) echo $fullname ?>" autocomplete="off" spellcheck="false">
        </fieldset>
        <div class="error">
            <?php echo checkError('fullname') ?>
        </div>

        <fieldset>
            <legend>Username</legend>
            <input type="text" name="username" value="<?php echo setValue('username') ?>" autocomplete="off" spellcheck="false">
        </fieldset>
        <div class="error">
            <?php echo checkError('username') ?>
        </div>

        <fieldset>
            <legend>Email</legend>
            <input type="email" name="email" value="<?php echo setValue('email') ?>" autocomplete="off" spellcheck="false">
        </fieldset>
        <div class="error">
            <?php echo checkError('email') ?>
        </div>

        <fieldset>
            <legend>Phone number</legend>
            <input type="tel" name="tel" value="<?php echo setValue('tel') ?>" autocomplete="off" spellcheck="false">
        </fieldset>
        <div class="error">
            <?php echo checkError('tel') ?>
        </div>

        <fieldset>
            <legend>Password</legend>
            <input type="password" name="password" value="" autocomplete="off" spellcheck="false">
        </fieldset>
        <div class="error">
            <?php echo checkError('password') ?>
        </div>

        <fieldset>
            <legend>Re-enter Password</legend>
            <input type="password" name="re_enter_password" value="" autocomplete="off" spellcheck="false">
        </fieldset>
        <div class="error">
            <?php echo checkError('re_enter_password') ?>
        </div>

        <p id="exist_user">Existing user, sign in <a class="form" href="./login.php">Here</a></p>

        <input type="hidden" id="hidden" name="redirect_to" value="login.php">
        <button type="submit" name="btn_signup" value="submit_signup">Sign Up</button>
        
        <script src="assets/js/app.js"></script>
    </form>

</body>

</html>