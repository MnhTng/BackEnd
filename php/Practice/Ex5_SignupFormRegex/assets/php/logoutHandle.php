<?php
setcookie('username', $_COOKIE['username'], time() - 3600, "/php/Practice/Ex5_SignupFormRegex");
setcookie('password', $_COOKIE['password'], time() - 3600, "/php/Practice/Ex5_SignupFormRegex");

header("Location: ../../login.php");
