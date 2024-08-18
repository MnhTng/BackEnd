<?php
$name = "do  manh tung  ";
$name2 = "do  ngoc diep";
$name3 = "đỗ MẠNH tÙng";
$number = 1234567.89;
$arr = array('name', 'email', 'phone');

// Tra ve do dai chuoi
echo strlen($name) . "<br><br>";

// In hoa ky tu dau tien cua chuoi
echo ucfirst($name) . "<br><br>";

// In hoa ky tu dau tien cua moi tu trong chuoi
echo ucwords($name) . "<br><br>";

// In thuong ky tu dau tien cua chuoi
echo lcfirst($name) . "<br><br>";

// Chuyen doi chuoi thanh chu HOA
echo strtoupper($name) . "<br><br>";

// Chuyen doi chuoi thanh chu thuong
echo strtolower($name) . "<br><br>";

// Chuyen doi chu co dau thanh chu HOA
echo mb_convert_case($name3, MB_CASE_UPPER) . "<br><br>";

// Chuyen doi chu co dau thanh chu thuong
echo mb_convert_case($name3, MB_CASE_LOWER) . "<br><br>";

// Chuyen doi chu co dau thanh chu HOA dau moi tu
echo mb_convert_case($name3, MB_CASE_TITLE) . "<br><br>";

// Loai bo khoang trang o dau va cuoi chuoi
echo trim($name) . ": ";
echo strlen(trim($name)) . "<br><br>";

// Loai bo khoang trang o dau chuoi
echo ltrim($name) . ": ";
echo strlen(ltrim($name)) . "<br><br>";

// Loai bo khoang trang o cuoi chuoi
echo rtrim($name) . ": ";
echo strlen(rtrim($name)) . "<br><br>";

// Tra ve thong tin cac ky tu su dung trong chuoi
echo count_chars($name, 3) . "<br><br>";

// Tra ve thong tin cac tu duoc su dung trong chuoi
print_r(str_word_count($name, 2));
echo "<br><br>";

// Dem so lan xuat hien cua chuoi con trong chuoi
echo substr_count($name, "n") . "<br><br>";

// Trich xuat 1 phan cua chuoi
echo substr($name, 4, -4) . "<br><br>";

// Kiem tra 1 chuoi co chua chuoi con xac dinh khong
echo str_contains($name, "manh") . "<br><br>";

// Kiem tra 1 chuoi co bat dau bang chuoi con xac dinh khong
echo str_starts_with($name, "do") . "<br><br>";

// Kiem tra 1 chuoi co ket thuc bang chuoi con xac dinh khong
echo str_ends_with($name, "tung") . "<br><br>";

// Tim vi tri xuat hien dau tien cua 1 chuoi con trong chuoi
echo strpos($name, "manh") . "<br><br>";

// Tim vi tri xuat hien dau tien cua 1 chuoi con trong chuoi khong phan biet hoa/thuong
echo stripos($name, "MANH") . "<br><br>";

// Tim vi tri xuat hien cuoi cung cua 1 chuoi con trong chuoi
echo strrpos($name, "n") . "<br><br>";

// Tim, vi tri xuat hien cuoi cung cua 1 chuoi con trong chuoi khong phan biet hoa/thuong
echo strripos($name, "N") . "<br><br>";

// So sanh 2 chuoi
echo strcmp($name, $name2) . "<br><br>";

// So sanh 2 chuoi khong phan biet hoa thuong
echo strcasecmp($name, $name2) . "<br><br>";

// Lap lai 1 chuoi
echo str_repeat($name, 3) . "<br><br>";

// Dao nguoc 1 chuoi
echo strrev($name) . "<br><br>";

// Thay the 1 chuoi con trong chuoi
echo str_replace("manh", "Manh", $name) . "<br><br>";

// Thay the 1 chuoi con trong chuoi khong phan biet hoa/thuong
echo str_ireplace("MANH", "Manh", $name) . "<br><br>";

// Xao tron ngau nhien 1 chuoi
echo str_shuffle($name) . "<br><br>";

// Ma hoa chuoi
echo md5($name) . "<br><br>"; // thap luc phan 32bit

// Noi cac phan tu cua mang thanh 1 chuoi
echo implode(" - ", $arr) . "<br><br>";

// Tach 1 chuoi thanh mang
print_r(explode(" ", $name));
echo "<br><br>";

// Chuyen doi cac ky tu dac biet trong chuoi thanh thuc the HTML
echo htmlspecialchars("<a href='https://www.google.com'>Google</a>") . "<br><br>";

// Chuyen 1 chuoi thanh 1 mang
print_r(str_split($name, 4));
echo "<br><br>";

// Dinh dang so 
// number_format(number, decimals, decimalpoint, thousandsseparator)
// number: số cần định dạng
// decimals: số lượng chữ số sau dấu thập phân (mặc định là 0)
// decimalpoint: ký tự dùng để biểu diễn dấu thập phân (mặc định là ".")
// thousandsseparator: ký tự dùng để phân cách hàng nghìn (mặc định là ",")
echo number_format($number, 0, '', ',') . "<br><br>";