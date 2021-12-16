<?php
session_start();
require '../data/DBConnection.php';

$conn = new DBConnection('phphomework', 'php_samkov');

if(isset($_POST['submit'])) {
    $dataLogin = $conn->GetColumns('users', array('id', 'password'), 'login', $_POST['login']);
    $dataEmail = $conn->GetColumns('users', array('id', 'password'), 'email', $_POST['login']);
    if (count($dataLogin) > 0 && password_verify(trim($_POST['password']), $dataLogin[0]['password'])) {
        $_SESSION['user'] = $conn->GetRow('users', 'id', $dataLogin[0]['id'])[0];
        header('Location: ../index.php');
        exit();
    } else if(count($dataEmail) > 0 && password_verify(trim($_POST['password']), $dataEmail[0]['password'])) {
        $_SESSION['user'] = $conn->GetRow('users', 'id', $dataEmail[0]['id'])[0];
        header('Location: ../index.php');
        exit();
    }
    else {
        $_SESSION['login-errors'][] = 'Логин / пароль не верен';
    }
}

header('Location: login.php');
exit();
