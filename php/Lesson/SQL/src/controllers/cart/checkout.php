<?php
// Lib
require "../../lib/database.php";
require "../../lib/cart.php";

// Database
require "../../config/database.php";

if (session_status() == PHP_SESSION_NONE)
    session_start();

global $db;
db_connect($db);

if (isset($_POST['all'])) {
    $checkAll = $_POST['all'];

    if ($checkAll == 'true') {
        $freeShip = '';
        $discount = 0;

        $data = [
            'checkout' => 1
        ];
        $where = "id = {$_SESSION['user_id']}";
        db_update('cart', $data, $where);

        $sql = "SELECT * FROM cart WHERE id = {$_SESSION['user_id']}";
        $result = db_fetch_array($sql);

        $quantity = array_sum(array_column($result, 'quantity'));
        $total = array_sum(array_column($result, 'subtotal'));

        foreach ($result as $item) {
            if ($item['sale'])
                $discount += ($item['price'] - $item['sale']) * $item['quantity'];
        }

        if ($quantity > 1) {
            $freeShip = "<span>Shipping discount</span><span class='discount'>-20,000₫</span>";
            $finalTotal = $total;
            $discount += 20000;
        } else
            $finalTotal = $total + 20000;

        if ($discount)
            $discount = "<span>You have saved " . number_format($discount, 0, '', ',') . "₫</span>";
        else
            $discount = '';

        $response = [
            'total' => number_format($total, 0, '', ',') . "₫",
            'finalTotal' => number_format($finalTotal, 0, '', ',') . "₫",
            'freeShip' => $freeShip,
            'discount' => $discount,
        ];

        echo json_encode($response);
    } else {
        $data = [
            'checkout' => 0
        ];
        $where = "id = {$_SESSION['user_id']}";
        db_update('cart', $data, $where);

        echo json_encode($_POST);
    }
} else {
    $code = $_POST['code'];
    $size = $_POST['size'];
    $status = $_POST['status'];

    $data = ['checkout' => $status];
    $where = "id = {$_SESSION['user_id']} AND pcode = '{$code}' AND size = '{$size}'";
    db_update('cart', $data, $where);

    $sql = "SELECT * FROM cart WHERE id = {$_SESSION['user_id']} AND checkout = 1";
    $result = db_fetch_array($sql);

    $quantity = array_sum(array_column($result, 'quantity'));
    $total = array_sum(array_column($result, 'subtotal'));

    $freeShip = '';
    $discount = 0;

    foreach ($result as $item) {
        if ($item['sale'] > 0)
            $discount += ($item['price'] - $item['sale']) * $item['quantity'];
    }

    if ($quantity > 1) {
        $freeShip = "<span>Shipping discount</span><span class='discount'>-20,000₫</span>";
        $finalTotal = $total;
        $discount += 20000;
    } else
        $finalTotal = $total + 20000;

    if ($discount)
        $discount = "<span>You have saved " . number_format($discount, 0, '', ',') . "₫</span>";
    else
        $discount = '';

    if ($quantity)
        $emptySelect = 0;
    else
        $emptySelect = 1;

    $response = [
        'empty' => $emptySelect,
        'status' => $status,
        'total' => number_format($total, 0, '', ',') . "₫",
        'finalTotal' => number_format($finalTotal, 0, '', ',') . "₫",
        'freeShip' => $freeShip,
        'discount' => $discount,
    ];

    echo json_encode($response);
}

db_close();
