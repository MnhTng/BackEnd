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
    showArray($_FILES);

    // Thư mục chứa file upload
    $uploadDir = 'uploads/';

    // Đường dẫn của các files được upload
    $uploadFiles = array();
    foreach ($_FILES['files']['tmp_name'] as $index => $tmpName) {
        global $uploadFiles;

        // Đường dẫn của file sau khi upload
        $uploadFile = $uploadDir . basename($_FILES['files']['name'][$index]);

        if (move_uploaded_file($tmpName, $uploadFile)) {
            $uploadFiles[] = $uploadFile;
        } else {
            echo "Upload file thất bại";
            break;
        }
    }
    showArray($uploadFiles);
    foreach ($_FILES['files']['name'] as $index => $nameFile) {
        echo "<a href='$uploadFiles[$index]'>$nameFile</a><br>";
    }
}
