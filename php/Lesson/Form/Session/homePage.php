<?php
echo "Trang chủ<br>";
echo "<pre>User infomation:<br>";
session_start();
print_r($_SESSION);
echo "</pre>";

echo "<a href='logout.php'>Đăng xuất</a>";
