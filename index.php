<?php
session_start();

require 'data/DBConnection.php';
$conn = new DBConnection('phphomework', 'php_samkov');
$query = "SELECT tasks.*, w.login, w.firstname, w.lastname, a.login, a.firstname, a.lastname FROM tasks 
    INNER JOIN users w on tasks.worker_id = w.id 
    INNER JOIN users a on tasks.admin_id = a.id
    ORDER BY created_at DESC";
$tasks = $conn->Query($query, PDO::FETCH_NAMED);
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
            <p>Здравствуйте, <?=$_SESSION['user']['firstname']?></p>
            <a href="auth/SignOut.php"><div class="auth-btn">Выйти</div></a>
        <?php else: ?>
            <a href="auth/login.php"><div class="auth-btn">Войти</div></a>
        <?php endif; ?>
    </div>
</header>

<main>
    <div class="main-space">
        <div class="tasks">
            <?php foreach ($tasks as $task): ?>
                <button class="task" id="<?=$task['id']?>">
                    <div class="task-info">
                        <div class="task-top-info">
                            <div class="task-name"><?=$task['task_name']?></div>
                            <div class="task-worker">Для: <?=$task['login'][0]?></div>
                        </div>
                        <div class="task-description"><?=$task['task_desc']?></div>
                    </div>
                    <div class="task-progress"><?=$task['status']?>%</div>
                </button>
            <?php endforeach; ?>
        </div>

        <div class="info hidden">

        </div>
    </div>
</main>

</body>

</html>