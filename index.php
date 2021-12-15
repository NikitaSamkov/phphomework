<?php
session_start();

require 'data/DBConnection.php';
$conn = new DBConnection('phphomework', 'php_samkov');
$query = "SELECT tasks.*, w.login as w_login, w.firstname as w_fn, w.lastname as w_ln, a.login as a_login, a.firstname as a_fn, a.lastname as a_ln FROM tasks 
    INNER JOIN users w on tasks.worker_id = w.id 
    INNER JOIN users a on tasks.admin_id = a.id
    WHERE tasks.type='public'
    ORDER BY created_at DESC";
$tasks = $conn->QueryGet($query, PDO::FETCH_UNIQUE);
?>

<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='utf-8'>
    <title>Добро пожаловать!</title>
    <link type="text/css" rel="stylesheet" href="styles.css">
    <link type="text/css" rel="stylesheet" href="data/tasks.css">
</head>

<body>
<header>
    <img class="logo" src="source/img/logo.png">
    <div class="auth-menu">
        <?php if(isset($_SESSION['user'])): ?>
            <a class="profile" href="profile.php"> <img height="25" src="source/img/User.svg"> <?=$_SESSION['user']['firstname']?></a>
            <a href="auth/SignOut.php"><div class="auth-btn">Выйти</div></a>
        <?php else: ?>
            <a href="auth/login.php"><div class="auth-btn">Войти</div></a>
        <?php endif; ?>
    </div>
</header>

<?php require_once 'data/tasks.php' ?>

</body>

</html>