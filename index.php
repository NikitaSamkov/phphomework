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
<?php if(isset($_SESSION['user'])): ?>
<p>Здравствуйте, <?=$_SESSION['user']['login']?></p>
<?php endif; ?>
<a href="register.php">Зарегистрироваться</a>
</body>

</html>