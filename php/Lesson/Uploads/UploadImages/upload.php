<?php
function showArray($arr)
{
    if (is_array($arr)) {
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    }
}

if (isset($_POST['btn_submit'])) {
    $error = array();

    // Kiểm tra đuôi file image hợp lệ
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    foreach ($_FILES['files']['name'] as $index => $name) {
        $extend = pathinfo($name, PATHINFO_EXTENSION);

        if (!in_array($extend, $allowTypes)) {
            $error['file'] = "File allow accept the extend file: <b>.jpg, .jpeg, .png, .gif</b>";
            break;
        }
    }
    if (empty($error)) {
        // Kiểm tra kích thước image
        $allowSize = 1024 * 1024 * 2; // 2MB

        foreach ($_FILES['files']['size'] as $index => $size) {
            if ($size > $allowSize) {
                $error['file'] = "File allow accept the size image small than <b>2MB</b>";
                break;
            }
        }
    }

    if (empty($error)) {
        // showArray($_FILES);

        // Thư mục chứa file upload
        $uploadDir = 'uploads/';

        // Đường dẫn của các files được upload
        $uploadFiles = array();
        foreach ($_FILES['files']['tmp_name'] as $index => $tmpName) {
            global $uploadFiles;

            // Đường dẫn của file sau khi upload
            $fileName = basename($_FILES['files']['name'][$index]);
            $uploadFile = $uploadDir . $fileName;

            // Kiểm tra file đã tồn tại chưa
            // Nếu đã tồn tại thì đổi tên
            if (file_exists($uploadFile)) {
                global $uploadFile;

                $name = pathinfo($fileName, PATHINFO_FILENAME);
                $extend = pathinfo($fileName, PATHINFO_EXTENSION);

                $time = 1;
                while (file_exists($uploadFile)) {
                    global $uploadFile;

                    $uploadFile = $uploadDir . $name . '(' . $time . ')' . $extend;
                    $time++;
                }
            }

            if (move_uploaded_file($tmpName, $uploadFile)) {
                $uploadFiles[] = $uploadFile;
            } else {
                echo "Upload file thất bại";
                break;
            }
        }

        // showArray($uploadFiles);
        // foreach ($_FILES['files']['name'] as $index => $nameFile) {
        //     echo "<img src='$uploadFiles[$index]'><br>";
        //     echo "<a href='$uploadFiles[$index]'>$nameFile</a><br>";
        // }
    } else {
        echo $error['file'];
    }
}
