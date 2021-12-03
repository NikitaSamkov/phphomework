<?php
session_start();

if (isset($_SESSION['login-errors'])) {
    foreach ($_SESSION['login-errors'] as $error) {
        echo $error."<br>";
    }
    unset($_SESSION['login-errors']);
}
?>

<form action="SignIn.php" method="POST">
    Логин <input name="login" type="text" required><br>
    Пароль <input name="password" type="password" required><br>
    <input name="submit" type="submit" value="Войти">
</form>
<a href="register.php">Зарегистрироваться</a>
