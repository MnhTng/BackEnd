<?php
require 'validationForm.php';

if (session_status() == PHP_SESSION_NONE)
    session_start();

global $db;
db_connect($db);

if (isset($_POST['update_account'])) {
    $error = array();
    $alert = array();

    if (!empty($_POST['name']) && !nameRegex($_POST['name']))
        $error['update'] = "Name must be letters and at least two characters long!";
    else if (!empty($_POST['date']) && !dateRegex($_POST['date']))
        $error['update'] = "Date must be less than current date!";
    else if (!empty($_POST['email']) && !emailRegex($_POST['email']))
        $error['update'] = "Email must be in the format: abc123@domain1.domain2!";
    else if (!empty($_POST['phone']) && !phoneRegex($_POST['phone']))
        $error['update'] = "Phone number must start with 0 and have 10 to 12 digits!";

    if (empty($error)) {
        $info = [];
        if (!empty($_POST['name']))
            $info['fullname'] = $_POST['name'];
        if (isset($_POST['gender']))
            $info['gender'] = $_POST['gender'];
        if (!empty($_POST['date']))
            $info['birthday'] = $_POST['date'];
        if (!empty($_POST['email']))
            $info['email'] = $_POST['email'];
        if (!empty($_POST['phone']))
            $info['tel'] = $_POST['phone'];

        if (!empty($info)) {
            $alert['update'] = "Update account successfully!";

            $where = "id = {$_SESSION['user_id']}";
            db_update('user', $info, $where);
        } else {
            $alert['warning'] = "No changes made!";
        }
    }
}

db_close();
