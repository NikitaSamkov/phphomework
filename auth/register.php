<?php
session_start();

if(isset($_SESSION['reg-errors'])) {
    foreach($_SESSION['reg-errors'] as $error) {
        echo $error."<br>";
    }
    unset($_SESSION['reg-errors']);
}
?>

<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='utf-8'>
    <title>Регистрация</title>
    <link rel="stylesheet" type="text/css" href="../styles.css">
</head>

<body>
<div class="auth">
    <?php require 'header.php'?>
    <form class="auth-form" action="SignUp.php" method="POST">
        <div class="auth-input-field">
            <label for="login">Логин:<br></label>
            <input type="text" name="login" id="login" required><br>
        </div>
        <div class="auth-input-field">
            <label for="email">Email:<br></label>
            <input type="email" name="email" id="email" required><br>
        </div>
        <div class="auth-input-field">
            <label for="firstname">Имя:<br></label>
            <input type="text" name="firstname" id="firstname" required><br>
        </div>
        <div class="auth-input-field">
            <label for="lastname">Фамилия:<br></label>
            <input type="text" name="lastname" id="lastname" required><br>
        </div>
        <div class="auth-input-field">
            <label for="password">Пароль:<br></label>
            <input type="password" name="password" id="password" required><br>
        </div>
        <div class="checkbox-submit">
            <label><input type="checkbox" name="admin" id="admin"> я администратор<br></label>
            <button name="submit" type="submit" value="">
                <img height="50" src="../source/img/Check.svg">
            </button>
        </div>
    </form>
</div>
</body>

</html>

