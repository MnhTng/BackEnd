<?php
include "../assets/php/signupHandle.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../assets/css/login.css">
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

        <fieldset class="pass">
            <legend>Password</legend>
            <input type="password" name="password" value="" autocomplete="off" spellcheck="false">

            <div class="eye">
                <svg class="close-pass" xmlns="http://www.w3.org/2000/svg" width="2.3em" height="2.5em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye-closed">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M21 9c-2.4 2.667 -5.4 4 -9 4c-3.6 0 -6.6 -1.333 -9 -4" />
                    <path d="M3 15l2.5 -3.8" />
                    <path d="M21 14.976l-2.492 -3.776" />
                    <path d="M9 17l.5 -4" />
                    <path d="M15 17l-.5 -4" />
                </svg>

                <script src="https://cdn.lordicon.com/lordicon.js"></script>
                <lord-icon class="open-pass" src="https://cdn.lordicon.com/vfczflna.json" trigger="loop" delay="4000" stroke="bold" colors="primary:#000000,secondary:#242424" style="width:2.5em;height:2.5em"></lord-icon>
            </div>
        </fieldset>
        <div class="error">
            <?php echo checkError('password') ?>
        </div>

        <fieldset class="pass">
            <legend>Re-enter Password</legend>
            <input type="password" name="re_enter_password" value="" autocomplete="off" spellcheck="false">

            <div class="eye">
                <svg class="close-pass" xmlns="http://www.w3.org/2000/svg" width="2.3em" height="2.5em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye-closed">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M21 9c-2.4 2.667 -5.4 4 -9 4c-3.6 0 -6.6 -1.333 -9 -4" />
                    <path d="M3 15l2.5 -3.8" />
                    <path d="M21 14.976l-2.492 -3.776" />
                    <path d="M9 17l.5 -4" />
                    <path d="M15 17l-.5 -4" />
                </svg>

                <script src="https://cdn.lordicon.com/lordicon.js"></script>
                <lord-icon class="open-pass" src="https://cdn.lordicon.com/vfczflna.json" trigger="loop" delay="4000" stroke="bold" colors="primary:#000000,secondary:#242424" style="width:2.5em;height:2.5em"></lord-icon>
            </div>
        </fieldset>
        <div class="error">
            <?php echo checkError('re_enter_password') ?>
        </div>

        <p id="exist_user">Existing user, sign in <a class="form" href="./login.php">Here</a></p>

        <input type="hidden" id="hidden" name="redirect_to" value="login.php">
        <button type="submit" name="btn_signup" value="submit_signup">Sign Up</button>

        <script src="../assets/js/login.js"></script>
    </form>

</body>

</html>