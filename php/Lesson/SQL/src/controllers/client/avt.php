<?php
// Lib
require "../../lib/database.php";

// Database
require "../../config/database.php";

if (session_status() == PHP_SESSION_NONE)
    session_start();

global $db;
db_connect($db);

if (isset($_FILES['avt'])) {
    $dir = '../../assets/images/';
    $fileName = basename($_FILES['avt']['name']);
    $uploadFile = $dir . $fileName;

    if (file_exists($uploadFile)) {
        unlink($uploadFile);
    }
    move_uploaded_file($_FILES['avt']['tmp_name'], $uploadFile);

    // Change image path to match navigation system (home)
    $uploadFile = "./src/assets/images/" . $fileName;

    $data = [
        'avt' => $uploadFile,
    ];
    $where = "id = {$_SESSION['user_id']}";

    $result = db_update('user', $data, $where);

    $sql = "SELECT * FROM user WHERE id = {$_SESSION['user_id']}";
    $response = db_fetch_row($sql);

    sleep(3);
    echo $response['avt'];
}

db_close();
