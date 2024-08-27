<?php
$db = [
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'mnhtng'
];

$conn = [];

db_connect($db);

$sql = "SELECT p.* FROM product AS p JOIN category AS c ON p.id = c.id";
$_SESSION['product'] = db_fetch_array($sql);

$sql = "SELECT * FROM category";
$_SESSION['category'] = db_fetch_array($sql);

$sql = "SELECT * FROM cart";
$_SESSION['cart'] = db_fetch_array($sql);

$_SESSION['search'] = [];

if (isset($_SESSION['is_login']) && !empty($_SESSION['cart'])) {
    $cartByID = array_filter($_SESSION['cart'], function ($item) {
        return $item['id'] == $_SESSION['user_id'];
    });

    $_SESSION['quantity'] = array_sum(array_column($cartByID, "quantity"));
    $_SESSION['total'] = array_sum(array_column($cartByID, "subtotal"));
}

if (isset($_SESSION['user_id'])) {
    $sql = "SELECT * FROM user WHERE id = {$_SESSION['user_id']}";
    $_SESSION['account'] = db_fetch_row($sql);
}

db_close();
