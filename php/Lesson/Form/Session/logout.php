<?php
session_start();
// Xoa toan bo session
// session_destroy();

// Xoa tung session
unset($_SESSION['username']);
unset($_SESSION['password']);

header("location: index.php");
