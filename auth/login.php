<?php
session_start();
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
        <?php if (isset($_SESSION['login-errors'])): ?>
            <?php foreach($_SESSION['login-errors'] as $error): ?>
                <div class="auth-error">
                    <img src="../source/img/error.svg">
                    <?=$error?>
                </div>
            <?php
            endforeach;
            unset($_SESSION['login-errors']);
            ?>
        <?php endif; ?>

        <label class="auth-input-field">
            Логин или email:<br>
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