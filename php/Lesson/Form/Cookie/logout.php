<?php
// Xoa cookie
setcookie('username', $_COOKIE['username'], time() - 3600);
setcookie('password', $_COOKIE['password'], time() - 3600);

header("location: index.php");
