<?php
session_start();
require 'DBConnection.php';

$conn = new DBConnection('phphomework', 'php_samkov');

if(isset($_POST['submit'])) {
    $data = $conn->GetColumns('users', ['id', 'password'], 'login', $_POST['login']);
    if(count($data) > 0 and $data[0]['password'] === md5(md5($_POST['password']))) {
        $_SESSION['user'] = $conn->GetRow('users', 'id', $data[0]['id'])[0];
        header('Location: index.php');
        exit();
    }
    else {
        echo 'Логин / пароль не верен';
    }
}
?>

<form method="POST">
    Логин <input name="login" type="text"><br>
    Пароль <input name="password" type="password"><br>
    <input name="submit" type="submit" value="Войти">
</form>
