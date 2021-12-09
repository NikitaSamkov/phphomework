<?php
session_start();

require '../data/DBConnection.php';
$conn = new DBConnection('phphomework', 'php_samkov');

if(isset($_POST['submit'])) {
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $newPassword = trim($_POST['new-password']);

    $newPassword = $newPassword == '' ? $_POST['password'] : $newPassword;

    $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    $data = $conn->GetRow('users', 'id', $_SESSION['user']['id']);
    $id = $_SESSION['user']['id'];

    $err = array();

    if(!str_contains($email, '@')) {
        $err[] = "Неверный адрес электронной почты";
    }

    if(strlen($firstname) > 30) {
        $err[] = "Имя должен быть не длиннее 30 символов";
    }

    if(strlen($lastname) > 30) {
        $err[] = "Фамилия должена быть не длиннее 30 символов";
    }

    if(!password_verify(trim($_POST['password']), $data[0]['password'])) {
        $err[] = 'Неверный пароль';
    }

    if(count($err) == 0) {
        $query = "UPDATE users SET email='$email', firstname='$firstname', lastname='$lastname', password='$newPassword' WHERE id='$id'";
        $conn->Query($query);
        $_SESSION['user'] = $conn->GetRow('users', 'id', $data[0]['id'])[0];
        header('Location: ../index.php');
        exit();
    }
    else {
        $_SESSION['edit-errors'] = $err;
    }
}

header('Location: edit_profile.php');
exit();
