<?php
require "validation.php";

if (session_status() == PHP_SESSION_NONE)
    session_start();

if (isset($_POST['add_btn'])) {
    $error = array();

    if (isset($_POST['size'])) {
        $sizeChose = $_POST['size'];
    } else {
        $error['size'] = 'Please choose product size you want!';
    }

    if ($_POST['quantity'] < 1) {
        $error['quantity'] = 'Product quantity must be greater than 0!';
    }

    if (!isset($_SESSION['is_login']))
        $error['login'] = 'Please login to use the features!';

    if (empty($error)) {
        add_cart($categories, $listProduct, $id, $cat, $code, $sizeChose);
    }
}
