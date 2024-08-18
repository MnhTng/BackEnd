<?php
function add_cart($categories, $listProduct, $id, $cat, $code, $sizeChose)
{
    foreach ($listProduct as $product) {
        if ($product['code'] == $code) {
            if (isset($_SESSION['cart']['add'][$code][$sizeChose])) {
                $_SESSION['cart']['add'][$code][$sizeChose]['quantity'] += $_POST['quantity'];
                $_SESSION['cart']['add'][$code][$sizeChose]['subtotal'] = $_SESSION['cart']['add'][$code][$sizeChose]['quantity'] * $_SESSION['cart']['add'][$code][$sizeChose]['price'];
            } else {
                $_SESSION['cart']['add'][$code][$sizeChose] = [
                    'catID' => $product['catID'],
                    'catType' => $cat ? $cat : array_search($product['catType'], $categories[$product['catID'] - 1]['cate']),
                    'code' => $product['code'],
                    'name' => $product['name'],
                    'price' => !empty($product['sale']) ? $product['sale'] : $product['price'],
                    'size' => $sizeChose,
                    'image' => $product['image'],
                    'quantity' => $_POST['quantity'],
                    'subtotal' => $_POST['quantity'] * (int)(!empty($product['sale']) ? $product['sale'] : $product['price'])
                ];
            }

            update();

            break;
        }
    }
}

function delete_item($code, $size)
{
    if (isset($_SESSION['cart']['add'][$code][$size])) {
        unset($_SESSION['cart']['add'][$code][$size]);

        if (empty($_SESSION['cart']['add'][$code]))
            unset($_SESSION['cart']['add'][$code]);

        if (empty($_SESSION['cart']['add']))
            unset($_SESSION['cart']);

        update();
    } else {
        if (isset($_SESSION['cart']))
            unset($_SESSION['cart']);
    }
}

function delete_cart()
{
    if (isset($_SESSION['cart']))
        unset($_SESSION['cart']);

    update();
}

function update_cart($quantity) {
    $code = array_key_first($quantity);
    $size = array_key_first($quantity[$code]);

    $_SESSION['cart']['add'][$code][$size]['quantity'] = $quantity[$code][$size];
    $_SESSION['cart']['add'][$code][$size]['subtotal'] = $quantity[$code][$size] * $_SESSION['cart']['add'][$code][$size]['price'];

    update();
}

function update()
{
    if (isset($_SESSION['cart'])) {
        $finalQuantity = 0;
        $finalTotal = 0;

        foreach ($_SESSION['cart']['add'] as $item) {
            foreach ($item as $itemBySize) {
                $finalQuantity += $itemBySize['quantity'];
                $finalTotal += $itemBySize['subtotal'];
            }
        }

        $_SESSION['cart']['info'] = [
            'quantity' => $finalQuantity,
            'total' => $finalTotal
        ];
    }
}
