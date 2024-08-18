<?php
$fullName = "<i>Đỗ Mạnh Tùng</i>";
$userName = "<i>MnhTng</i>";
$email = "<i>domanhtung123@gmail.com</i>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <style>
        h1 {
            color: red;
        }
    </style>

    <h1>User Infomation</h1>

    <p>Họ tên:
    <h4><?php echo $fullName ?></h4>
    </p>

    <p>User name:
    <h4><?php echo $userName ?></h4>
    </p>

    <p>Email:
    <h4><?php echo $email ?></h4>
    </p>
</body>

</html>