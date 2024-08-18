<?php
require 'upload.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Files</title>
</head>

<body>
    <style>
        form {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        input {
            margin-bottom: 20px;
        }

        a {
            text-decoration: none;
            color: black;
        }

        a:hover {
            color: red;
        }

        button {
            width: 100px;
            height: 30px;
            background-color: blue;
            color: white;
            border: none;
            border-radius: 5px;
        }

        button:hover {
            background-color: red;
        }
    </style>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="files[]" id="file" multiple>
        <button type="submit" name="btn_submit" value="submit_files">Upload</button>
    </form>
    <br>
    <a href="">Show Files</a>
</body>

</html>