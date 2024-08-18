<?php
$file = 'uploads/uploadFile.php';

// Kiem tra su ton tai cua file
if (file_exists($file)) {
    echo "File <b>$file</b> ton tai<br><br>";
} else {
    echo "File <b>$file</b> khong ton tai<br><br>";
}

// Kiem tra xem file co phai la file hay khong
if (is_file($file)) {
    echo "<b>$file</b> la file<br><br>";
} else {
    echo "<b>$file</b> khong phai la file<br><br>";
}

// Kiem tra xem file co phai la thu muc hay khong
if (is_dir($file)) {
    echo "<b>$file</b> la thu muc<br><br>";
} else {
    echo "<b>$file</b> khong phai la thu muc<br><br>";
}

// Kiem tra xem file co phai la link hay khong
if (is_link($file)) {
    echo "<b>$file</b> la link<br><br>";
} else {
    echo "<b>$file</b> khong phai la link<br><br>";
}

// Tra ve duong dan cua file (ten file)
echo "Duong dan file: " . "<b>" . basename($file) . "</b>" . "<br><br>";

// Tra ve duong dan cua thu muc me chua file
echo "Duong dan thu muc me: " . "<b>" . dirname($file) . "</b>" . "<br><br>";

// Tra ve kieu file
echo "Kieu file: " . "<b>" . filetype($file) . "</b>" . "<br><br>";

// Tra ve kich thuoc cua file
echo "Kich thuoc file: " . "<b>" . filesize($file) . "</b>" . " bytes<br><br>";

// Di chuyen file da UPLOAD den NEW PATH
$fileDir = 'uploads/';
$fileUpload = $fileDir . basename($file);
if (move_uploaded_file($file, $fileUpload)) {
    echo "Di chuyen file thanh cong<br><br>";
} else {
    echo "Di chuyen file that bai<br><br>";
}

// Xem thong tin ve PATH
$path = '/htdocs/inc/lib.inc.php';
echo "<pre>Thong tin ve PATH";
print_r(pathinfo($path));
echo "</pre>";
echo "Duong dan thu muc me: " . "<b>" . pathinfo($path, PATHINFO_DIRNAME) . "</b>" . "<br>";
echo "Duong dan file: " . "<b>" . pathinfo($path, PATHINFO_BASENAME) . "</b>" . "<br>";
echo "Extend path: " . "<b>" . pathinfo($path, PATHINFO_EXTENSION) . "</b>" . "<br>";
echo "Name path: " . "<b>" . pathinfo($path, PATHINFO_FILENAME) . "</b>" . "<br><br>";

// Xem thong tin ve file
echo "<pre>Thong tin ve FILE<br>";
print_r(stat($file));
echo "</pre>";

// Tra ve duong dan tuyet doi
echo "Duong dan tuyet doi: " . "<b>" . realpath($file) . "</b>" . "<br><br>";

// Copy file
$srcFile = '../argument.php';
$destFile = $file;
if (copy($srcFile, $destFile)) {
    echo "Copy file thanh cong<br><br>";
} else {
    echo "Copy file that bai<br><br>";
}

// Tao folder
$folder = 'uploads/newFolder';
if (!file_exists($folder)) {
    mkdir($folder, 0777, true);
    echo "Tao folder thanh cong<br><br>";
} else {
    echo "Folder da ton tai<br><br>";
}

// Xoa folder
if (file_exists($folder)) {
    rmdir($folder);
    echo "Xoa folder thanh cong<br><br>";
} else {
    echo "Folder khong ton tai<br><br>";
}

// Tao file tam
$newFile = tempnam('uploads/', 'php');
echo "Tao file thanh cong<br><br>";

// Xoa file
unlink($newFile);
echo "Xoa file thanh cong<br><br>";
