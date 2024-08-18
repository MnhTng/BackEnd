<?php
if (session_status() == PHP_SESSION_NONE)
    session_start();

global $db;
db_connect($db);

if (isset($_POST['upload_avt'])) {
    $error = array();
    $alert = array();

    if (!empty($_FILES['avt']['name'])) {
        global $result;

        $allowTypes = ['png', 'jpg', 'jpeg'];
        $extend = pathinfo($_FILES['avt']['name'], PATHINFO_EXTENSION);
        if (!in_array($extend, $allowTypes)) {
            $error['avt'] = "File allow accept the extend file: <b>.png, .jpg, .jpeg</b>!";
        }

        if (empty($error)) {
            $allowSize = 1024 * 1024 * 20;
            if ($_FILES['avt']['size'] > $allowSize) {
                $error['avt'] = "File allow accept the size image small than <b>20MB</b>!";
            }
        }

        if (empty($error)) {
            $alert['avt'] = "Change avatar success!";

            $dir = './src/assets/images/';
            $fileName = basename($_FILES['avt']['name']);
            $uploadFile = $dir . $fileName;

            if (file_exists($uploadFile)) {
                unlink($uploadFile);
            }
            move_uploaded_file($_FILES['avt']['tmp_name'], $uploadFile);

            $data = [
                'avt' => $uploadFile,
            ];
            $where = "id = {$_SESSION['user_id']}";

            $result = db_update('user', $data, $where);
        }
    } else
        $error['avt'] = "No profile picture has been selected yet!";
}

db_close();
