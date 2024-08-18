<?php
function odd($x)
{
    return $x % 2;
}

$num = array(1, 2, 3);
$num2 = array(1 => 2, 5 => 1, 4 => 10, 2 => 6);
$fruit = array('Fruit1' => 'banana', 'Fruit2' => 'apple', 'Fruit3' => 'Orange');
$person = array('MnhTng', 'Ian');
$listProduct = array(
    array(
        'id' => 1,
        'name' => 'Điện thoại 1',
        'price' => 1000000,
        'description' => 'Mô tả điện thoại 1',
    ),
    array(
        'id' => 2,
        'name' => 'Điện thoại 2',
        'price' => 2000000,
        'description' => 'Mô tả điện thoại 2',
    ),
    array(
        'id' => 3,
        'name' => 'Laptop 1',
        'price' => 3000000,
        'description' => 'Mô tả laptop 1',
    ),
    array(
        'id' => 4,
        'name' => 'Laptop 2',
        'price' => 4000000,
        'description' => 'Mô tả laptop 2',
    )
);

// Xoa mang
unset($person);

// Tao 1 mang voi VALUE xac dinh
$person = array_fill(2, 4, 'MnhTng');
print_r($person);
echo "<br><br>";

// Tao 1 mang voi KEY xac dinh
$person = array_fill_keys($fruit, 'MnhTng');
print_r($person);
echo "<br><br>";

// Kien tra KEY co ton tai trong mang khong
if (array_key_exists('watermelon', $fruit))
    echo "Yes<br><br>";
else
    echo "No<br><br>";

// Kiem tra VALUE co ton tai trong mang khong
if (in_array('apple', $fruit))
    echo "Yes<br><br>";
else
    echo "No<br><br>";

// Kiem tra VARIABLE co phai 1 mang khong
if (is_array($num))
    echo "Yes<br><br>";
else
    echo "No<br><br>";

// Dem so phan tu mang
echo count($fruit) . "<br><br>";

// Dem so lan xuat hien cac VALUE trong mang
print_r(array_count_values($fruit));
echo "<br><br>";

// Tra ve tat ca VALUE cua 1 mang
print_r(array_values($fruit));
echo "<br><br>";

// Tra ve tat ca KEY cua 1 mang
print_r(array_keys($fruit));
echo "<br><br>";

// Lay KEY dau tien cua mang
echo array_key_first($fruit) . "<br><br>";

// Lay KEY cuoi cung cua mang
echo array_key_last($fruit) . "<br><br>";

// Tim kiem VALUE cua mang va tra ve KEY cua no
$index = array_search('apple', $fruit);
echo $index . "<br><br>";

// Gop nhieu mang lai thanh 1 
$newArray = array_merge($num, $fruit, $num2);
print_r($newArray);
echo "<br><br>";

// Thay doi chu hoa/chu thuong cua KEY trong mang
print_r(array_change_key_case($fruit, CASE_UPPER));
echo "<br>";
print_r(array_change_key_case($fruit, CASE_LOWER));
echo "<br><br>";

// Chia mang thanh cac mang con co kich thuoc xac dinh
print_r(array_chunk($num, 2));
echo "<br>";
print_r(array_chunk($num, 2, true));
echo "<br><br>";

// Tra ve tat ca VALUE cua 1 KEY trong mang
print_r(array_column($listProduct, 'name'));
echo "<br>";
print_r(array_column($listProduct, "price", "name"));
echo "<br><br>";

// Tao 1 mang voi 1 mang lam KEY va 1 mang lam VALUE
print_r(array_combine($num, $fruit));
echo "<br><br>";

// Hoan doi KEY - VALUE
print_r(array_flip($fruit));
echo "<br><br>";

// Loc cac phan tu cua mang bang ham tu dinh nghia
print_r(array_filter($num, "odd"));
echo "<br><br>";

// Ap dung 1 ham len tung phan tu cua mang
print_r(array_map("odd", $num));
echo "<br><br>";

// Them phan tu de mang dat den do dai mong muon
print_r(array_pad($num, -4, 0));
echo "<br><br>";

// Them 1/nhieu phan tu vao dau mang
array_unshift($num, -1);
print_r($num);
echo "<br><br>";

// Xoa phan tu o dau mang va tra ve VALUE cua no
echo array_shift($num) . "<br>";
print_r($num);
echo "<br><br>";

// Them 1/nhieu phan tu vao cuoi mang
array_push($num, 4, 5);
print_r($num);
echo "<br><br>";

// Xoa 1 phan tu o cuoi mang
array_pop($num);
print_r($num);
echo "<br><br>";

// So sanh 2/nhieu mang va tra ve mang moi voi cac VALUE giong nhau voi mang dau tien
print_r(array_intersect($num2, $num));
echo "<br><br>";

// So sanh 2/nhieu mang va tra ve mang moi voi cac VALUE khac nhau voi mang dau tien
print_r(array_diff($fruit, $num, $num2));
echo "<br><br>";

// So sanh 2/nhieu mang va tra ve mang moi voi cac KEY giong nhau voi mang dau tien
print_r(array_intersect_key($num, $num2));
echo "<br><br>";

// So sanh 2/nhieu mang va tra ve mang moi voi cac KEY khac nhau voi mang dau tien
print_r(array_diff_key($num2, $fruit, $num));
echo "<br><br>";

/**
 *! sap xep binh thuong:
 *? num1 < num2 
 *? str1 < str2 || str1.len < str2.len
 *! sap xep tu nhien:
 *? num1 < num2
 *? str1.len < str2.len || str1 < str2
 */

// Sap xep KEY tang dan
ksort($num2);
print_r($num2);
echo "<br><br>";

// Sap xep KEY giam dan
krsort($num2);
print_r($num2);
echo "<br><br>";

// Sap xep tu nhien khong phan biet hoa/thuong(tang dan)
natcasesort($fruit);
print_r($fruit);
echo "<br><br>";

// Sap xep tu nhien(tang dan)
natsort($fruit);
print_r($fruit);
echo "<br><br>";

//  Sap xep VALUE tang dan giu nguyen KEY
asort($num2);
print_r($num2);
echo "<br><br>";

// Sap xep VALUE giam dan giu nguyen KEY
arsort($num2);
print_r($num2);
echo "<br><br>";

// Sap xep VALUE tang dan thay doi KEY
sort($num2);
print_r($num2);
echo "<br><br>";

// Sap xep VALUE giam dan thay doi KEY
rsort($num2);
print_r($num2);
echo "<br><br>";

// Sap xep KEY theo ham tu dinh nghia
uksort($num, "odd");
print_r($num);
echo "<br><br>";

// Sap xep VALUE theo ham tu dinh nghia giu nguyen KEY
uasort($num, "odd");
print_r($num);
echo "<br><br>";

// Sap xep VALUE theo ham tu dinh nghia thay doi KEY
usort($num, "odd");
print_r($num);
echo "<br><br>";

// Sap xep nhieu mang/1 mang nhieu chieu
array_multisort($num, $num2);
print_r($num);
echo "<br>";
print_r($num2);
echo "<br><br>";

array_multisort(
    $listProduct[0],
    SORT_ASC,
    SORT_STRING,
    $listProduct[1],
    SORT_DESC,
    SORT_STRING,
    $listProduct[2],
    SORT_NATURAL,
    $listProduct[3],
    SORT_REGULAR
);
echo "<pre>";
print_r($listProduct);
echo "</pre>";
echo "<br><br>";

// Tinh tong cua tat ca phan tu cua mang
echo array_sum($num) . "<br><br>";

// Tinh tich cua tat ca phan tu cua mang
echo array_product($num) . "<br><br>";

// Chon 1/nhieu phan tu ngau nhien cua 1 mang
echo array_rand($num) . "<br>";

print_r(array_rand($num, 2));
echo "<br><br>";

// Dao nguoc thu tu cua mang
print_r(array_reverse($num));
echo "<br>";
print_r(array_reverse($num, true)); // chi anh huong den KEY la number
echo "<br><br>";

// Trich xuat 1 phan cua mang
print_r(array_slice($num2, 1));
echo "<br>";
print_r(array_slice($num2, 1, 2));
echo "<br>";
print_r(array_slice($num2, 1, 2, true));
echo "<br>";
print_r(array_slice($num2, -3));
echo "<br>";
print_r(array_slice($num2, -3, 2));
echo "<br>";
print_r(array_slice($num2, -3, 2, true));
echo "<br><br>";

// Thay the 1 phan cua mang bang 1 mang khac
array_splice($num2, 1, 2, $num);
print_r($num2);
echo "<br><br>";

// Loai bo cac phan tu trung lap trong mang
print_r(array_unique($num2));
echo "<br><br>";