<?php
session_start();

if (isset($_SESSION['user'])) {
    require_once 'DBConnection.php';
    $db = new DBConnection('phphomework', 'php_samkov');
    $db->DeleteRow('users', 'id', $_SESSION['user']['id']);
    unset($_SESSION['user']);
}

header('Location: ../index.php');
exit();
