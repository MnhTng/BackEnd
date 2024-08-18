<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Truyền dữ liệu FORM bằng phương thức GET</title>
</head>

<body>
    <style>
        fieldset {
            width: 30%;
            margin: 0 auto;
            border: 0.2em groove purple;
            border-radius: 1em;
            background: linear-gradient(45deg,
                    lightblue,
                    lightcyan,
                    lightgoldenrodyellow,
                    lightgreen,
                    lightgrey,
                    lightpink,
                    lightsalmon);
        }

        legend {
            margin: 0 auto;
            position: relative;
            top: -0.3em;
            font-size: 20px;
            font-weight: bold;
            background: transparent;
        }

        input {
            width: 75%;
            padding: 5px;
            margin: 5px 0;
            border: none;
            border-radius: 0.2em;
            background: transparent;
            caret-color: deeppink;
            color: deeppink;
            box-shadow: 0 0 0.1em deeppink;
            font-weight: 600;
        }

        input:focus {
            outline: none;
            box-shadow: 0 0 0.3em deeppink;
        }

        input::placeholder {
            font-style: italic;
            color: deeppink;
            font-weight: 300;
        }

        button {
            padding: 0.5em 1em;
            position: relative;
            left: 3%;
            background-color: transparent;
            cursor: pointer;
            border: none;
            border-radius: 0.3em;
            box-shadow: inset 0 0 10px 2px #eee;
            color: red;
            font-weight: 600;
        }
    </style>

    <form action="search.php" method="get">
        <fieldset>
            <legend>Search</legend>

            <input type="text" name="q" id="search" placeholder="Enter keyword..." required>
            <button type="submit" name="btn_search" value="search">Search</button>
        </fieldset>
    </form>
</body>

</html>