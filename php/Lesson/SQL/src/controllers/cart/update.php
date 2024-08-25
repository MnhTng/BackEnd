<?php
// Lib
require "../../lib/database.php";

// Database
require "../../config/database.php";

if (session_status() == PHP_SESSION_NONE)
    session_start();

global $db;
db_connect($db);

if (isset($_POST['quantity'])) {
    $userID = $_SESSION['user_id'];
    $id = $_POST['id'];
    $code = $_POST['code'];
    $size = $_POST['size'];
    $quantity = $_POST['quantity'];
    $subTotal = $quantity * $_POST['price'];
    $freeShip = '';
    $discount = 0;

    $data = [
        'quantity' => $quantity,
        'subtotal' => $subTotal,
    ];
    $where = "id = {$userID} AND pcode = '{$code}' AND size = '{$size}'";

    db_update('cart', $data, $where);

    $sql = "SELECT * FROM cart WHERE id = {$userID}";
    $result = db_fetch_array($sql);

    $_SESSION['quantity'] = array_sum(array_column($result, "quantity"));
    $_SESSION['total'] = array_sum(array_column($result, "subtotal"));

    foreach ($result as $item) {
        if ($item['sale'])
            $discount += ($item['price'] - $item['sale']) * $item['quantity'];
    }

    if ($_SESSION['quantity'] > 1) {
        $freeShip = "<span>Shipping discount</span><span class='discount'>-20,000₫</span>";
        $finalTotal = $_SESSION['total'];
        $discount += 20000;
    } else
        $finalTotal = (int)$_SESSION['total'] + 20000;

    if ($discount)
        $discount = "<span>You have saved " . number_format($discount, 0, '', ',') . "₫</span>";
    else
        $discount = '';

    $response = [
        'id' => $id,
        'itemQuantity' => $quantity,
        'quantity' => $_SESSION['quantity'],
        'total' => number_format($_SESSION['total'], 0, '', ',') . "₫",
        'finalTotal' => number_format($finalTotal, 0, '', ',') . "₫",
        'freeShip' => $freeShip,
        'discount' => $discount,
    ];

    echo json_encode($response);
}

db_close();
