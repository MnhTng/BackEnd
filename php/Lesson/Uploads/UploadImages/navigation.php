<?php
if (isset($_POST['btn_stored'])) {
    header('Location: imageStored.php');
}

if (isset($_POST['btn_upload'])) {
    header('Location: imageUpload.php');
}
