<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lấy dữ liệu từ TextArea</title>
</head>

<body>
    <style>
        form {
            width: 50%;
            margin: 0 auto;
        }

        label {
            font-weight: bold;
        }

        textarea {
            width: 100%;
            margin-bottom: 10px;
        }

        button {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>

    <form action="comment.php" method="post">
        <label for="comment">Nhập bình luận:</label><br>
        <textarea name="comment" id="comment" cols="30" rows="10"></textarea><br>

        <button type="submit" name="btn_cmt" value="submit_cmt">Gửi</button>
    </form>
</body>

</html>