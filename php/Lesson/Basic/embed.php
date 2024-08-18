<?php
$title = "<a href='https://api.daily.dev/r/5fGRfpVP1' title='Go to post' target='_blank' rel='noopener'>CSS One-Liners to Improve (Almost) Every Project</a>";
$content = "<p class='select-text break-words typo-body'><span class='pr-1 font-bold text-accent-cabbage-default'>TLDR</span>This guide provides a series of CSS one-liners aimed at enhancing the appearance and readability of web content. Key tips include limiting content width, increasing text size and line height, making images responsive, and improving table readability. Additionally, the guide offers solutions for balanced heading wrapping, <button class='flex cursor-pointer flex-row items-center text-text-tertiary hover:underline focus:underline hover:underline focus:underline typo-callout inline-flex !text-text-link'>Show more</button></p>";
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
        a {
            text-decoration: none;
            color: red;
        }

        h1 {
            text-align: center;
        }

        p {
            display: block;
            width: 960px;
            height: auto;
            margin: 0 auto;
            text-indent: 1.5em;
            color: cornflowerblue;
        }
    </style>

    <h1><?php print_r($title) ?></h1>
    <p><?php print_r($content) ?></p>
</body>

</html>