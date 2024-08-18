<?php

/**
 *? xuat du lieu echo
 * echo la 1 lenh, khong phai la 1 ham ==> khong can dau ()
 ** hien thi GT cua variable
 */
$a = 100;

echo ($a);
echo '<br>';

echo 'Gia tri cua a: {$a}$';
echo '<br>';

echo "Gia tri cua a: {$a}$";
echo "<br>";

echo "Gia tri cua a: " . $a . "$";
echo "<br>";

echo "Gia tri cua a: ", $a, "$";
echo "<br>";
echo "<br>";

/**
 *? xuat du lieu mang print_r()
 * la 1 ham hien thi thong tin variable / array
 ** hien thi cau truc cua variable
 * thuong dung de debug
 */
$b = 5;

print_r($b);
echo "<br>";

$arr = array(1, 2, 'A');

echo "<pre>";
print_r($arr);
echo "</pre>";
echo "<br>";

/**
 *? xuat du lieu voi kieu GT duoc chi dinh printf()
 * %s: Chuỗi
 * %d: Số nguyên
 * %f: Số thực
 * %.2f: Số thực với 2 số thập phân
 * %x: Số hexadecimal
 * %b: Số nhị phân
 * %o: Số bát phân
 */
$c = 3.14059;
printf("PI: %0.2f", $c);
echo "<br>";
