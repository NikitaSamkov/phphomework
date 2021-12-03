<?php
session_start();

if (isset($_SESSION['login-errors'])) {
    foreach ($_SESSION['login-errors'] as $error) {
        echo $error."<br>";
    }
    unset($_SESSION['login-errors']);
}
?>
<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='utf-8'>
    <title>Войти в систему</title>
    <link rel="stylesheet" type="text/css" href="auth.css">
</head>

<body>
<div class="auth">
    <?php require 'header.php'?>
    <form class="auth-form" action="SignIn.php" method="POST">
        <label class="auth-input-field">
            Логин:<br>
            <input name="login" type="text" required><br>
        </label>
        <label class="auth-input-field">
            Пароль:<br>
            <input name="password" type="password" required><br>
        </label>
        <button class="submit-btn" name="submit" type="submit" value="">
            <img height="50" src="../source/img/Check.svg">
        </button>
        <p>
            Нет аккаунта?<br>
            <a class="reg-btn" href="register.php">Зарегистрироваться</a>
        </p>
    </form>
</div>
</body>

</html>