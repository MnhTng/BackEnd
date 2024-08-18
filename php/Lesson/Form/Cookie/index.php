<?php
include 'login.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lấy dữ liệu từ Hidden Field</title>
</head>

<body>
    <style>
        fieldset {
            width: 30%;
            margin: 0 auto;
            border: 2px groove purple;
            border-radius: 1em;
            background: #999;
        }

        legend {
            font-size: 20px;
            font-weight: bold;
            margin: 0 auto;
            padding: 0.2em;
            border-radius: 0.7em;
            background: #444;
            color: chocolate;
        }

        label {
            color: mintcream;
            font-size: 1.2em;
        }

        input {
            padding: 5px;
            width: 70%;
            color: cornflowerblue;
            caret-color: cornflowerblue;
            border: none;
            border-radius: 2em;
            font-weight: 600;
        }

        input:focus {
            outline: none;
        }

        input::placeholder {
            font-style: italic;
            font-weight: 300;
            color: cornflowerblue;
        }

        #remember_me {
            width: 1em;
            height: 1em;
            font-size: 1.2em;
        }

        label {
            font-size: 1.2em;
            font-weight: bold;
            color: mintcream;
            user-select: none;
        }

        button {
            width: 20%;
            margin: 0 auto;
            padding: 5px;
            background: cornflowerblue;
            color: white;
            border: none;
            border-radius: 0.5em;
        }

        .error {
            color: deeppink;
            font-style: italic;
            font-weight: bold;
        }
    </style>

    <form action="" method="post">
        <fieldset>
            <legend>Login Form</legend>

            <label for="username">Username: </label>
            <input type="text" name="username" value="<?php echo setValue('username') ?>" id="username" placeholder="Nhập tên đăng nhập..." required>
            <?php echo checkError('username') ?>
            <br><br>

            <label for="password">Password: </label>
            <input type="password" name="password" id="password" placeholder="Nhập mật khẩu..." required>
            <?php echo checkError('password') ?>
            <br><br>

            <input type="checkbox" name="remember_me" id="remember_me">
            <label for="remember_me">Remember me</label>
            <br><br>

            <input type="hidden" name="redirect_to" value="homePage.php">
            <button type="submit" name="btn_login" value="submit_login_form">Login</button>
        </fieldset>
    </form>
</body>

</html>