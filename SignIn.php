<?php
session_start();
require 'DBConnection.php';

$conn = new DBConnection('phphomework', 'php_samkov');

if(isset($_POST['submit'])) {
    $data = $conn->GetColumns('users', array('id', 'password'), 'login', $_POST['login']);
    if(count($data) > 0 and $data[0]['password'] === md5(md5($_POST['password']))) {
        $_SESSION['user'] = $conn->GetRow('users', 'id', $data[0]['id'])[0];
        header('Location: index.php');
        exit();
    }
    else {
        $_SESSION['login-errors'][] = 'Логин / пароль не верен';
    }
}

header('Location: login.php');
exit();
