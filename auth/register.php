<?php
session_start();
?>

<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='utf-8'>
    <title>Регистрация</title>
    <link rel="stylesheet" type="text/css" href="auth.css">
</head>

<body>
<div class="auth">
    <?php require 'header.php'?>
    <form class="auth-form" action="SignUp.php" method="POST">
        <?php if (isset($_SESSION['reg-errors'])): ?>
            <?php foreach($_SESSION['reg-errors'] as $error): ?>
                <div class="auth-error">
                    <img src="../source/img/error.svg">
                    <?=$error?>
                </div>
            <?php
                endforeach;
                unset($_SESSION['reg-errors']);
            ?>
        <?php endif; ?>

        <label class="auth-input-field">
            Введите ваш логин:<br>
            <input type="text" name="login" id="login" required><br>
        </label>

        <label class="auth-input-field">
            Введите ваш email:<br>
            <input type="email" name="email" id="email" required><br>
        </label>


        <label class="auth-input-field">
            Ваше имя:<br>
            <input type="text" name="firstname" id="firstname" required><br>
        </label>

        <label class="auth-input-field">
            Ваша фамилия:<br>
            <input type="text" name="lastname" id="lastname" required><br>
        </label>

        <label class="auth-input-field">
            Введите пароль:<br>
            <input type="password" name="password" id="password" required><br>
        </label>

        <div class="checkbox-submit">
            <label><input type="checkbox" name="admin" id="admin"> я администратор<br></label>
            <button class="submit-btn" name="submit" type="submit" value="">
                <img height="50" src="../source/img/Check.svg">
            </button>
        </div>
    </form>
</div>
</body>

</html>

