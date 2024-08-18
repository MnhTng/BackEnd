<?php
require 'upload.php';
require 'navigation.php';
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
            margin: 0 auto;
            width: 50%;
            height: 50%;
            padding: 10px;
            border: 1px solid #ff5511;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
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

    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="files[]" id="file" multiple>
        <button type="submit" name="btn_submit" value="submit_files">Upload</button>
        <button type="submit" name="btn_stored" value="submit_stored">Go to Image Stored</button>
    </form>
</body>

</html>