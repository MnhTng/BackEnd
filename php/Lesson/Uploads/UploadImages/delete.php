<?php
if (isset($_POST['btn_delete'])) {
    $error = array();

    if (isset($_POST['images'])) {
        $dir = 'uploads/';
        $images = $_POST['images'];

        foreach ($images as $image) {
            unlink($dir . $image);
        }
    } else {
        $files = scandir('uploads/');

        if (!empty($files)) {
            $error['stored'] = 'Please choose images you want to delete';
        } else {
            $error['stored'] = 'Stored is empty';
        }

        if (!empty($error)) {
            echo $error['stored'];
        }
    }
}
