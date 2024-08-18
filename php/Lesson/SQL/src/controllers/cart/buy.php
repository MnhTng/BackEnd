<?php
if (isset($_POST['buy_btn'])) {
    $error = array();

    if (isset($_POST['size'])) {
        $sizeChose = $_POST['size'];
    } else {
        $error['size'] = 'Please choose product size you want!';
    }

    if ($_POST['quantity'] < 1) {
        $error['quantity'] = 'Product quantity must be greater than 0!';
    }

    if (!isset($_SESSION['is_login'])) {
        $error['login'] = 'Please login to use the features!';
    } else if (empty($error)) {
        ob_start();
        header("Location: ?mod=cart&act=checkout&code={$code}&size={$_POST['size']}&quantity={$_POST['quantity']}");
        $content = ob_get_contents();
        echo $content;
        ob_end_clean();
    }
}
