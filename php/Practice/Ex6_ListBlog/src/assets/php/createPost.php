<?php
if (isset($_POST['btn_post'])) {
    $uploadDir = 'src/assets/images/';
    $fileName = basename($_FILES['image']['name']);
    $fileUpload = $uploadDir . $fileName;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $fileUpload))
        echo "";
    else
        echo "Upload failed";

    $GLOBALS['post'] = [];
    $GLOBALS['post'][] = array(
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'content' => $_POST['content'],
        'image' => $fileUpload
    );
}
