<?php
include 'signup.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lấy dữ liệu form từ Radio Button</title>
</head>

<body>
    <style>
        fieldset {
            width: 20%;
            margin: 0 auto;
            border: 2px groove purple;
            border-radius: 1em;
            background: #aaa;
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

        label:hover {
            color: chocolate;
        }

        input {
            padding: 5px;
            width: 10%;
        }

        input:checked {
            outline: none;
            accent-color: cornflowerblue;
        }

        button {
            width: 25%;
            margin: 0 auto;
            padding: 5px;
            background: cornflowerblue;
            color: white;
            border: none;
            border-radius: 2em;
            font-weight: 600;
            position: relative;
            right: -2em;
        }

        button:hover {
            background: #777;
            color: cornflowerblue;
        }

        .error {
            color: deeppink;
            font-weight: bold;
            font-size: 1.2em;
            text-align: center;
        }
    </style>

    <form action="" method="post">
        <fieldset>
            <legend>Sign Up</legend>

            <input type="radio" id="male" name="gender" value="male" <?php if (isset($gender) && $gender == 'male') echo "checked = 'checked'" ?>>
            <label for="male">Nam</label>

            <input type="radio" id="female" name="gender" value="female" <?php if (isset($gender) && $gender == 'female') echo "checked = 'checked'" ?>>
            <label for="female">Nữ</label>

            <button type="submit" name="btn_signup" value="submit_signup_form">Sign Up</button>
            <?php if (isset($error['gender'])) echo "<p class='error'>{$error['gender']}</p>"; ?>
        </fieldset>
    </form>
</body>

</html>