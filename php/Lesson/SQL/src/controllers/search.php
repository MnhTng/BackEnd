<?php
// Lib
require "../lib/database.php";
require "../lib/cart.php";

// Database
require "../config/database.php";

if (session_status() == PHP_SESSION_NONE)
    session_start();

global $db;
db_connect($db);

if (isset($_POST['result'])) {
    $search = $_POST['result'];

    $_SESSION['search'] = [
        'search' => $search
    ];

    echo json_encode($_SESSION['search']);
}

db_close();
