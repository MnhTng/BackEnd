<?php
function showArray($arr)
{
    if (isset($arr)) {
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    }
}

// showArray($_POST);

if (!empty($_POST['comment']))
    echo "<b>Bình luận của bạn là:</b> " . $_POST['comment'];
else
    echo "<b>Bạn chưa nhập bình luận</b>";
