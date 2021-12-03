<?php
session_start();

require 'DBConnection.php';
$conn = new DBConnection('phphomework', 'php_samkov');

if(isset($_POST['submit'])) {
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);

    $err = array();

    if(!preg_match("/^[a-zA-Z0-9]+$/", $login)) {
        $err[] = "Логин может состоять только из букв английского алфавита и цифр";
    }

    if(strlen($_POST['login']) < 3 or strlen($login) > 30) {
        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
    }

    if($conn->IsExists('users', 'login', $login)) {
        $err[] = "Пользователь с таким логином уже существует в базе данных";
    }

    if(!str_contains($email, '@')) {
        $err[] = "Неверный адрес электронной почты";
    }

    if(count($err) == 0) {
        $admin = $_POST['admin'] == 'on' ? 'TRUE' : 'FALSE';
        $password = md5(md5(trim($_POST['password'])));
        $query = "INSERT INTO users VALUES (NULL, '$login', '$email', '$password', '$firstname', '$lastname', $admin)";
        $conn->Query($query);
        $_SESSION['user'] = $conn->GetRow('users', 'login', $login)[0];
        header("Location: index.php");
        exit();
    }
    else {
        $_SESSION['reg-errors'] = $err;
    }
}

header('Location: register.php');
exit();
