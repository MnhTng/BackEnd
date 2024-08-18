<?php
include "../assets/php/loginHandle.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="../assets/css/form.css">
    <title>Login Form</title>
</head>

<body>


    <form action="" method="post">
        <h1>Login</h1>
        <p id="login_notify">Enter your account</p>

        <fieldset class="user">
            <legend>Username</legend>
            <input type="text" name="username" value="<?php echo setValue('username') ?>" autocomplete="off" spellcheck="false">
            <div class="suggest user-child">
                <ul>

                </ul>
            </div>
        </fieldset>
        <div class="error">
            <?php echo checkError('username') ?>
        </div>

        <fieldset class="pass">
            <legend>Password</legend>
            <input type="password" name="password" value="" autocomplete="off" spellcheck="false">

            <div class="eye">
                <svg class="close-pass" xmlns="http://www.w3.org/2000/svg" width="2.3em" height="2.5em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye-closed">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M21 9c-2.4 2.667 -5.4 4 -9 4c-3.6 0 -6.6 -1.333 -9 -4" />
                    <path d="M3 15l2.5 -3.8" />
                    <path d="M21 14.976l-2.492 -3.776" />
                    <path d="M9 17l.5 -4" />
                    <path d="M15 17l-.5 -4" />
                </svg>

                <script src="https://cdn.lordicon.com/lordicon.js"></script>
                <lord-icon class="open-pass" src="https://cdn.lordicon.com/vfczflna.json" trigger="loop" delay="4000" stroke="bold" colors="primary:#000000,secondary:#242424" style="width:2.5em;height:2.5em"></lord-icon>
            </div>
        </fieldset>
        <div class="error">
            <?php echo checkError('password') ?>
        </div>

        <div class="remember_me">
            <input type="checkbox" id="remember_me" name="remember_me">
            <label for="remember_me">Remember me</label>
        </div>

        <a class="form" href="">Forgot your password?</a>
        <a class="form" href="signup.php">Don't you have an account?</a>

        <input type="hidden" id="hidden" name="redirect_to" value="../index.php">
        <button type="submit" name="btn_login" value="submit_login">Login</button>
    </form>
</body>

</html>


<script src="../assets/js/login.js"></script>

<!-- Hiển thị Suggest -->
<script>
    // Config
    let UserInfo = "UserInfo";
    let UserSuggest = "UserSuggest";

    const save = (data) => {
        localStorage.setItem(UserInfo, JSON.stringify(data));
    };

    const load = () => {
        return JSON.parse(localStorage.getItem(UserInfo)) || [];
    };

    const add = (data) => {
        let info = load();
        info = [...info, data];
        save(info);
    };

    const saveSuggest = (data) => {
        localStorage.setItem(UserSuggest, JSON.stringify(data));
    };

    const loadSuggest = () => {
        return JSON.parse(localStorage.getItem(UserSuggest)) || [];
    };

    const addSuggest = (data) => {
        let info = loadSuggest();
        info = [...info, data];
        saveSuggest(info);
    };

    // Exec
    // UserInfo
    let username = '<?php if (isset($_COOKIE['username'])) echo $_COOKIE['username'];
                    else echo ''; ?>';
    let password = '<?php if (isset($_COOKIE['password'])) echo $_COOKIE['password'];
                    else echo ''; ?>';

    let info = load();
    let foundUser = info.find(user => user.username === username && user.password === password);
    if (!foundUser) {
        let data = {
            username: username,
            password: password
        };

        add(data);
    }

    // UserSuggest
    let sug = loadSuggest();
    let foundSuggest = sug.find(user => user.username === username);
    if (!foundSuggest) {
        let data = {
            username: username
        };

        addSuggest(data);
    }

    function getUsername(index) {
        let inputSuggest = document.querySelector('.user>input');
        let ul = document.querySelector('.suggest>ul');

        inputSuggest.value = ul.children[index].textContent;
    }

    const userInfo = load();
    const userSuggest = loadSuggest();

    if (userSuggest.length) {
        let suggest = document.querySelector('.suggest');
        let ul = document.querySelector('.suggest>ul');
        let inputSuggest = document.querySelector('.user>input');

        inputSuggest.addEventListener('focus', () => {
            suggest.style.display = 'block';

            let value = inputSuggest.value;
            let i = 0;
            let check = 1;
            let listSuggest = userSuggest.map((user, index) => {
                if (i < 4 && user.username.toLowerCase().includes(value.toLowerCase())) {
                    i++;

                    return `
                    <li index=${index} onmousedown="getUsername(${index})">${user.username}</li>
                    `;
                } else
                    check = 0;
            });

            if (!check)
                suggest.style.display = "none";
            else {
                suggest.style.display = "block";
                ul.innerHTML = listSuggest.join('');
            }
        });

        inputSuggest.addEventListener('input', () => {
            suggest.style.display = 'block';

            let value = inputSuggest.value;
            let i = 0;
            let check = 1;
            let listSuggest = userSuggest.map((user, index) => {
                if (i < 4 && user.username.toLowerCase().includes(value.toLowerCase())) {
                    i++;

                    return `
                    <li index=${index} onmousedown="getUsername(${index})">${user.username}</li>
                    `;
                } else
                    check = 0;
            });

            if (!check)
                suggest.style.display = "none";
            else {
                suggest.style.display = "block";
                ul.innerHTML = listSuggest.join('');
            }
        });

        inputSuggest.addEventListener('blur', () => {
            suggest.style.display = 'none';
        });
    }
</script>
<!--  -->