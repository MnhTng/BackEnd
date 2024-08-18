<?php
// require 'sendMail.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail Form</title>
</head>

<body>
    <style>
        form {
            display: flex;
            flex-direction: column;
            width: 50%;
            margin: 0 auto;
        }

        label {
            margin-top: 10px;
        }

        input, textarea {
            margin-top: 5px;
            padding: 5px;
        }

        button {
            margin-top: 10px;
            padding: 5px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        h1 {
            text-align: center;
        }
    </style>

    <h1>Mail Form</h1>
    <form action="" method="post">
        <label for="name">Recipient</label>
        <input type="text" name="name" id="name" required>
        
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>

        <label for="subject">Subject</label>
        <input type="text" name="subject" id="subject" required>

        <label for="message">Message</label>
        <textarea name="message" id="message" cols="30" rows="10" required></textarea>

        <label for="attachment">Attachment</label>
        <input type="file" name="file[]" id="attachment">

        <button type="submit">Send</button>
    </form>
</body>

</html>