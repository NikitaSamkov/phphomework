<?php
session_start();
?>

<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='utf-8'>
    <title>Добро пожаловать!</title>
</head>

<body>
<header>
    <?php if(isset($_SESSION['user'])): ?>
        <p>Здравствуйте, <?=$_SESSION['user']['firstname']?></p>
        <a href="SignOut.php">Выйти</a>
    <?php else: ?>
        <a href="login.php">Войти</a>
    <?php endif; ?>
    <a href="register.php">Зарегистрироваться</a>
</header>

</body>

</html>