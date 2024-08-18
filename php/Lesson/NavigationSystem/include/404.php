<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Not Found!</title>
</head>

<body>
    <style>
        * {
            box-sizing: border-box;
        }

        a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            transition: all 0.1s ease-in;
            position: relative;
            top: 0;
        }

        a:hover {
            top: -3px;
            color: tomato;
        }

        a:active {
            text-shadow: 0 0 10px tomato;
        }

        body {
            font-family: Arial, sans-serif;
            width: 100vh;
            height: 500vh;
            background: url(https://i.pinimg.com/originals/22/55/d6/2255d6795f9a63e868a87d37eca9a2af.jpg) no-repeat 50% 50%;
            background-size: 115vw 515vh;
            overflow-x: hidden;
        }

        #bg_404 {
            width: 100vw;
            height: 100vh;
            text-align: center;
            color: #fff;
            margin: -1em 0;
            padding: 0;
            position: sticky;
            top: 0;
            background: url(https://i.pinimg.com/originals/22/55/d6/2255d6795f9a63e868a87d37eca9a2af.jpg) no-repeat 50% 50%;
            background-size: contain;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(15px);
        }

        h1 {
            margin-top: -3em;
            font-size: 3em;
            color: #fff;
        }

        p {
            font-size: 1em;
        }
    </style>

    <div id="bg_404">
        <h1>404 Not Found</h1>
        <p>The page you are looking for does not exist.</p>
        <p>Return <a href="../index.php">HOME</a></p>
    </div>
</body>

</html>