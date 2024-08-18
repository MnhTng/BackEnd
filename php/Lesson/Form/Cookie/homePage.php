<?php
echo "Trang chủ<br>";

echo "<pre>User infomation:<br>";
echo isset($_COOKIE['username']) ? $_COOKIE['username'] : "";
echo "<br>";
echo isset($_COOKIE['password']) ? $_COOKIE['password'] : "";
echo "</pre>";

echo "<a href='logout.php'>Đăng xuất</a>";
