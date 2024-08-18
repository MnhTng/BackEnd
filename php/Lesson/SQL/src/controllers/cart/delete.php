<?php
// Lib
require "../../lib/template.php";
require "../../lib/database.php";
require "../../lib/product.php";
require "../../lib/cart.php";
require "../../lib/alert.php";

// Database
require "../../config/database.php";

if (session_status() == PHP_SESSION_NONE)
    session_start();

if (isset($_GET['all']))
    delete_cart();
else {
    $code = $_GET['code'];
    $size = $_GET['size'];
    delete_item($code, $size);
}

ob_start();
header("location: ../../../index.php?mod=cart&act=main");
$content = ob_get_contents();
echo $content;
ob_end_clean();
