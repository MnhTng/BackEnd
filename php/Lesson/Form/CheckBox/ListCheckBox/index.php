<?php
include 'checkbox.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lấy dữ liệu từ List CheckBox</title>
</head>

<body>
    <style>
        fieldset {
            width: 30%;
            margin: 0 auto;
            background: linear-gradient(to bottom,
                    #33ccff,
                    #ff99cc,
                    #ffcc99,
                    #ffff99,
                    #ccff99,
                    #99ff99,
                    #99ffcc,
                    #99ffff);
            position: relative;
        }

        legend {
            margin: 0 auto;
            font-size: 1.3em;
            font-weight: 600;
            position: relative;
            top: -0.25em;
        }

        input[type="checkbox"] {
            width: 1.3em;
            height: 1.3em;
            accent-color: #fff;
        }

        label {
            font-size: 1.3em;
            user-select: none;
            margin-left: 0.5em;
        }

        button {
            width: 100px;
            height: 30px;
            position: absolute;
            right: 10%;
            bottom: 10%;
            border: none;
            border-radius: 100% 100% 10% 10%;
            background: transparent;
            box-shadow: 0 0 0 2px #fff, 0 0 5px 5px #99ffff, 0 0 10px 5px #99ffcc;
            color: #ff88ff;
            font-size: 1.1em;
            font-weight: bold;
        }

        button:active {
            height: 25px;
            margin-top: 5px;
            box-shadow: 0 0 0 2px #fff, 0 0 5px 5px #99ff99, 0 0 3px 10px #ff99cc;
            color: #ff11aa;
        }
    </style>

    <form action="" method="post">
        <fieldset>
            <legend>Which language programs do you like?</legend>

            <input type="checkbox" id="PHP" name="check_list[]" value="PHP" <?php if (isset($check_list) && in_array('PHP', $check_list)) echo "checked = 'checked'" ?>>
            <label for="PHP">PHP</label><br>
            <input type="checkbox" id="Java" name="check_list[]" value="Java" <?php if (isset($check_list) && in_array('Java', $check_list)) echo "checked = 'checked'" ?>>
            <label for="Java">Java</label><br>
            <input type="checkbox" id="Python" name="check_list[]" value="Python" <?php if (isset($check_list) && in_array('Python', $check_list)) echo "checked = 'checked'" ?>>
            <label for="Python">Python</label><br>
            <input type="checkbox" id="C++" name="check_list[]" value="C++" <?php if (isset($check_list) && in_array('C++', $check_list)) echo "checked = 'checked'" ?>>
            <label for="C++">C++</label><br>
            <input type="checkbox" id="C#" name="check_list[]" value="C#" <?php if (isset($check_list) && in_array('C#', $check_list)) echo "checked = 'checked'" ?>>
            <label for="C#">C#</label><br>
            <input type="checkbox" id="Ruby" name="check_list[]" value="Ruby" <?php if (isset($check_list) && in_array('Ruby', $check_list)) echo "checked = 'checked'" ?>>
            <label for="Ruby">Ruby</label><br>
            <input type="checkbox" id="JavaScript" name="check_list[]" value="JavaScript" <?php if (isset($check_list) && in_array('JavaScript', $check_list)) echo "checked = 'checked'" ?>>
            <label for="JavaScript">JavaScript</label><br>

            <button type="submit" name="btn_checkbox" value="submit_list_checkbox">Submit</button>
        </fieldset>
    </form>
</body>

</html>