<?php
include 'payment.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Lấy dữ liệu từ Select Box</title>
</head>

<body>
    <style>
        form {
            margin: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        select {
            width: 200px;
            padding: 5px;
            margin-bottom: 10px;
        }

        button {
            padding: 5px 10px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        .error {
            color: deeppink;
            font-style: italic;
            font-weight: bold;
        }
    </style>

    <form action="" method="post">
        <label for="payment">Chọn phương thức thanh toán:</label>
        <select name="payment" id="payment">
            <option value="none">--Select payment method--</option>
            <option <?php if (isset($method) && $method == 'cash') echo "selected = 'selected'" ?> value="cash">Cash</option>
            <option <?php if (isset($method) && $method == 'credit_card') echo "selected = 'selected'" ?> value="credit_card">Credit Card</option>
            <option <?php if (isset($method) && $method == 'paypal') echo "selected = 'selected'" ?> value="paypal">Paypal</option>
        </select>

        <button type="submit" name="btn_order" value="submit_order">Đặt hàng</button>
        <?php if (isset($error['select_payment_method'])) echo "<p class='error'>{$error['select_payment_method']}</p>"; ?>
    </form>
</body>

</html>