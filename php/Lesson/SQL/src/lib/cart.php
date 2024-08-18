<?php
function add_cart($id, $cat, $code, $sizeChose)
{
    foreach ($_SESSION['product'] as $item) {
        if ($item['pcode'] == $code) {
            $checkNewItem = 0;
            global $checkNewItem;

            if (!empty($_SESSION['cart'])) {
                $cartFilter = array_filter($_SESSION['cart'], function ($product) use ($code, $sizeChose) {
                    return $product['id'] == $_SESSION['user_id'] && $product['pcode'] == $code && $product['size'] == $sizeChose;
                });

                if (!empty($cartFilter)) {
                    foreach ($cartFilter as $product) {
                        $product['quantity'] += $_POST['quantity'];
                        $product['subtotal'] = $product['quantity'] * ($product['sale'] ? $product['sale'] : $product['price']);

                        global $db;
                        db_connect($db);

                        $where = "id = {$_SESSION['user_id']} AND pcode = '{$code}' AND size = '{$sizeChose}'";
                        db_update('cart', $product, $where);

                        db_close();
                    }
                } else
                    $checkNewItem = 1;
            } else
                $checkNewItem = 1;

            if ($checkNewItem) {
                $newItem = [
                    'id' => $_SESSION['user_id'],
                    'pcode' => $item['pcode'],
                    'productID' => $item['id'],
                    'productType' => $item['type'],
                    'name' => $item['name'],
                    'price' => $item['price'],
                    'sale' => $item['sale'],
                    'size' => $sizeChose,
                    'image' => $item['image'],
                    'quantity' => $_POST['quantity'],
                    'subtotal' => $_POST['quantity'] * ($item['sale'] ? $item['sale'] : $item['price'])
                ];

                global $db;
                db_connect($db);

                db_insert('cart', $newItem);

                db_close();
            }

            break;
        }
    }
}

function delete_item($code, $size)
{
    global $db;
    db_connect($db);

    $where = "id = {$_SESSION['user_id']} AND pcode = '{$code}' AND size = '{$size}'";
    db_delete('cart', $where);

    db_close();
}

function delete_cart()
{
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        global $db;
        db_connect($db);

        $where = "id = {$_SESSION['user_id']}";
        db_delete('cart', $where);

        db_close();
    }
}

function update_cart($quantity)
{
    $code = array_key_first($quantity);
    $size = array_key_first($quantity[$code]);

    if (!empty($_SESSION['cart'])) {
        $cartFilter = array_filter($_SESSION['cart'], function ($product) use ($code, $size) {
            return $product['id'] == $_SESSION['user_id'] && $product['pcode'] == $code && $product['size'] == $size;
        });

        if (!empty($cartFilter)) {
            foreach ($cartFilter as $product) {
                $product['quantity'] = $quantity[$code][$size];
                $product['subtotal'] = $quantity[$code][$size] * ($product['sale'] ? $product['sale'] : $product['price']);

                global $db;
                db_connect($db);

                $where = "id = {$_SESSION['user_id']} AND pcode = '{$code}' AND size = '{$size}'";
                db_update('cart', $product, $where);

                db_close();
            }
        }
    }
}