<?php
$error = array();

if (isset($_POST['btn_order'])) {
    if ($_POST['payment'] == 'none')
        $error['select_payment_method'] = 'Vui lòng chọn phương thức thanh toán';
    else
        $method = $_POST['payment'];
}
