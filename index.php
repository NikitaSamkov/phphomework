<?php
session_start();
?>

<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='utf-8'>
    <title>Добро пожаловать!</title>
    <link type="text/css" rel="stylesheet" href="styles.css">
</head>

<body>
<header>
    <img class="logo" src="source/img/logo.png">
    <div class="auth-menu">
        <?php if(isset($_SESSION['user'])): ?>
            <p>Здравствуйте, <?=$_SESSION['user']['firstname']?></p>
            <a href="auth/SignOut.php"><div class="auth-btn">Выйти</div></a>
        <?php else: ?>
            <a href="auth/login.php"><div class="auth-btn">Войти</div></a>
        <?php endif; ?>
    </div>
</header>

</body>

</html>