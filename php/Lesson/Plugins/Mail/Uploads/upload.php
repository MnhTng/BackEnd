<?php
function upload()
{
    if (isset($_POST['btn_send_mail'])) {
        $uploadDir = 'Uploads/uploads/';

        $uploadFiles = array();
        foreach ($_FILES['files']['tmp_name'] as $index => $tmpName) {
            global $uploadFiles;

            $uploadFile = $uploadDir . basename($_FILES['files']['name'][$index]);

            if (move_uploaded_file($tmpName, $uploadFile)) {
                $uploadFiles[$uploadFile] = $_FILES['files']['name'][$index];
            } else {
                echo "Upload file thất bại";
                break;
            }
        }

        return $uploadFiles;
    }
}
