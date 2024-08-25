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

if (isset($_POST['action'])) {
    $alert = array();

    if (!isset($_SESSION['is_login'])) {
        $alert['login'] = 'Please login to use the features!';

        echo json_encode($alert);
    } else {
        if (isset($_POST['size'])) {
            $sizeChose = $_POST['size'];
        } else {
            $alert['size'] = 'Please choose product size you want!';
        }

        if ($_POST['quantity'] < 1) {
            $alert['quantity'] = 'Product quantity must be greater than 0!';
        }

        if (empty($alert)) {
            if ($_POST['action'] == "submit_add_product") {
                $sql = "SELECT p.* FROM product AS p JOIN category AS c ON p.id = c.id";
                $_SESSION['product'] = db_fetch_array($sql);

                $sql = "SELECT * FROM category";
                $_SESSION['category'] = db_fetch_array($sql);

                $sql = "SELECT * FROM cart";
                $_SESSION['cart'] = db_fetch_array($sql);

                $code = $_POST['code'];
                add_cart($code, $sizeChose);

                $sql = "SELECT * FROM cart WHERE id = {$_SESSION['user_id']}";
                $result = db_fetch_array($sql);
                $_SESSION['quantity'] = array_sum(array_column($result, "quantity"));

                $alert['success'] = 'Add success!';
                $alert['number'] = $_SESSION['quantity'];

                echo json_encode($alert);
            } else {
                $alert = [
                    'buy' => true,
                    'quantity' => $_POST['quantity'],
                    'size' => $sizeChose,
                    'code' => $_POST['code'],
                ];

                echo json_encode($alert);
            }
        } else
            echo json_encode($alert);
    }
}

db_close();
