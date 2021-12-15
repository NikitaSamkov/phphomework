<?php
session_start();

if (isset($_SESSION['user'])) {
    require_once 'DBConnection.php';
    $conn = new DBConnection('phphomework', 'php_samkov');
    $conn->DeleteRow('users', 'id', $_SESSION['user']['id']);
    unset($_SESSION['user']);
}

header('Location: ../index.php');
exit();
