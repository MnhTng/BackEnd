<?php
//! Tao mang rong
$error = array();
print_r($error);

// Them phan KEY mac dinh
$error[] = 14;
// Them phan KEY xac dinh
$error['userName'] = "Khong duoc de trong ten dang nhap";

echo "<pre>";
print_r($error);
echo "</pre>";

// Xoa phan tu mang
unset($error[0]);

echo "<pre>";
print_r($error);
echo "</pre>";
echo "<br>";
echo "<br>";

// Xoa mang
unset($error);

//! Tao mang co KEY mac dinh
$num = array(1, 2, 3, 4, 5);

echo "<pre>";
print_r($num);
echo "</pre>";

// Cap nhat GT mang
$num[4] = 6;

echo "<pre>";
print_r($num);
echo "</pre>";

// Duyet mang 1 chieu
foreach ($num as $value) {
    echo $value . "<br>";
}
echo "<br>";
echo "<br>";

//! Tao mang co KEY xac dinh
$listPerson = array(
    1 => array(
        'id' => 1,
        'name' => 'MnhTng',
        'age' => 21
    ),
    2 => array(
        'id' => 2,
        'name' => 'Ian',
        'age' => 20
    )
);

echo "<pre>";
print_r($listPerson);
echo "</pre>";

// Lay GT cua mang
echo $listPerson[1]['name'];
echo "<br>";
echo "<br>";

// Duyet mang nhieu chieu
foreach ($listPerson as $key => $value) {
    echo $key . " => " . $value['name'] . "<br>";
}
echo "<br>";
echo "<br>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tạo TABLE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <style>
        h1 {
            color: red;
            text-align: center;
        }

        p {
            color: #fa5531;
            text-align: center;
        }

        table {
            margin: 0 auto;
            width: 200px;
            border-collapse: collapse;

            tr,
            th,
            td {
                border: 2px solid #ff12a1;
                text-align: center;
            }
        }
    </style>

    <h1>Số tự nhiên</h1>
    <table border="4">
        <thead>
            <tr>
                <th>STT</th>
                <th>Giá trị</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($num as  $key => $value) { ?>
                <tr>
                    <td><?php echo  $key + 1 ?></td>
                    <td><?php echo $value ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <h1>Thông tin USER</h1>
    <?php if (!empty($listPerson)) { ?>
        <table border="4">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Tuổi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listPerson as  $key => $value) { ?>
                    <tr>
                        <td><?php echo $key ?></td>
                        <td><?php echo $value['id'] ?></td>
                        <td><?php echo $value['name'] ?></td>
                        <td><?php echo $value['age'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p><b><i>Không có dữ liệu</i></b></p>
    <?php } ?>
</body>

</html>