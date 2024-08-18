<?php
require 'delete.php';
require 'navigation.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Stored</title>
</head>

<body>
    <style>
        form {
            margin: 0 auto;
            width: 50%;
            height: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            border: 1px solid #ff5511;
            border-radius: 10px;
        }

        .stored {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-template-rows: 200px;
            gap: 1em 1em;
        }

        .item {
            margin: 0.5em;
            padding: 1em;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        input {
            margin-bottom: 20px;
            width: 50px;
            aspect-ratio: 1/1;
        }

        label {
            margin-left: 1em;
            position: relative;
        }

        label.imageName {
            width: 100px;
            height: fit-content;
            position: absolute;
            left: -1em;
            bottom: -1em;
        }

        img {
            width: 100%;
            max-width: 200px;
            object-fit: cover;
        }

        button {
            margin: 1em;
            padding: 0.5em;
            background-color: blue;
            color: white;
            border: none;
            border-radius: 5px;
        }

        button:hover {
            background-color: red;
        }
    </style>

    <form action="" method="post">
        <div class="stored">
            <?php
            $dir = 'uploads/';
            $files = scandir($dir);
            foreach ($files as $index => $file) {
                if ($file !== '.' && $file !== '..') {
                    echo "<div class='item'>
                            <input id='$index' type='checkbox' name='images[]' value='$file'>
                            <label for='$index'>
                                <img src='$dir$file' alt=''>
                                <label for='$index' class='imageName'>$file</label>
                            </label>
                        </div>";
                }
            }
            ?>
        </div>

        <button type="submit" name="btn_delete" value="submit_delete">Delete File</button>
        <button type="submit" name="btn_upload" value="submit_upload">Return Upload Files</button>
    </form>
</body>

</html>