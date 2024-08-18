<?php
// func_num_args(): lay SL tham so ham
// func_get_arg(k): lay GT tham so theo VT k
// func_get_args(): lay mang cac tham so cua ham

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
