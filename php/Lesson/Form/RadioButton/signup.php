<?php
if (isset($_POST['btn_signup'])) {
    $error = array();

    $userInfo = array(
        'male' => 'Nam',
        'female' => 'Nữ'
    );

    if (isset($_POST['gender']))
        $gender = $_POST['gender'];
    else
        $error['gender'] = 'Vui lòng chọn giới tính';
}
