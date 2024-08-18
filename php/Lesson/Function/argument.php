<?php
// func_num_args(): lay SL tham so ham
// func_get_arg(k): lay GT tham so theo VT k
// func_get_args(): lay mang cac tham so cua ham

//* ob_start(): Bắt đầu đệm đầu ra
//* ob_get_contents(): Lấy nội dung hiện tại của bộ đệm đầu ra mà không xóa nó
//* ob_get_clean(): Lấy nội dung hiện tại của bộ đệm đầu ra và xóa nó
//* ob_get_flush(): Lấy nội dung hiện tại của bộ đệm đầu ra và gửi nội dung của bộ đệm đến trình duyệt và xóa nó

ob_start();
test(1, 2, 3, 4, 5);
$output = ob_get_contents();
echo $output;
ob_end_clean(); // Xóa bộ đệm đầu ra mà không gửi nội dung đến trình duyệt

//* ob_flush(): Gửi nội dung của bộ đệm đến trình duyệt mà không xóa bộ đệm
//* ob_end_flush(): Xóa bộ đệm đầu ra và gửi nội dung đã lưu trữ đến trình duyệt
//* ob_end_clean(): Xóa bộ đệm đầu ra mà không gửi nội dung đến trình duyệt
//* ob_get_level(): Trả về mức độ đệm hiện tại (số lượng bộ đệm đã được bật)

function test()
{
    $numArgs = func_num_args();
    echo "So tham so: $numArgs<br><br>";

    echo "Tham so thu 0: " . func_get_arg(0) . "<br><br>";

    $arg_list = func_get_args();
    echo "<pre>";
    print_r($arg_list);
    echo "</pre>";
}
test(1, 2, 3, 4, 5);

function createInput($type, $name, $value, $option = array())
{
    $type = func_get_arg(0);
    $name = func_get_arg(1);
    $value = func_get_arg(2);
    $option = func_get_arg(3);

    if (!empty($option)) {
        $id = $option['id'];
        $class = $option['class'];
        $input = "<input type='{$type}' name='{$name}' value='{$value}' id='{$id}' class='{$class}'>";
    } else
        $input = "<input type='{$type}' name='{$name}' value='{$value}'>";

    echo $input;
}
createInput('text', 'username', '', array('id' => 'username', 'class' => 'textBox'));
