<?php
require '../../lib/cart.php';
if (session_status() == PHP_SESSION_NONE)
    session_start();

$code = $_GET['code'];
$size = $_GET['size'];

if (isset($_GET['all']))
    delete_cart();
else
    delete_item($code, $size);

ob_start();
header("location: /php/Lesson/AdvanceNaviSystem/index.php?mod=cart&act=main");
$content = ob_get_contents();
echo $content;
ob_end_clean();
