<?php
session_start();

if(!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}
require_once 'data/DBConnection.php';
$conn = new DBConnection('phphomework', 'php_samkov');
$userLogin = $_SESSION['user']['login'];
$query = "SELECT tasks.*, w.login as w_login, w.firstname as w_fn, w.lastname as w_ln, a.login as a_login, a.firstname as a_fn, a.lastname as a_ln FROM tasks 
    INNER JOIN users w on tasks.worker_id = w.id 
    INNER JOIN users a on tasks.admin_id = a.id
    WHERE w.login='$userLogin' OR a.login='$userLogin'
    ORDER BY created_at DESC";
$tasks = $conn->QueryGet($query, PDO::FETCH_UNIQUE);
?>

<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='utf-8'>
    <title>Профиль</title>
    <link type="text/css" rel="stylesheet" href="styles.css">
    <link type="text/css" rel="stylesheet" href="data/tasks.css">
</head>

<body>
<header>
    <a href="index.php"><img class="logo" src="source/img/logo.png"></a>
    <div class="auth-menu">
        <?php if(isset($_SESSION['user'])): ?>
            <a class="profile auth-btn" href="data/edit_profile.php"> <img height="25" src="source/img/Edit.svg"> Редактировать профиль</a>
            <a href="auth/SignOut.php"><div class="auth-btn">Выйти</div></a>
        <?php else: ?>
            <a href="auth/login.php"><div class="auth-btn">Войти</div></a>
        <?php endif; ?>
    </div>
</header>

<?php if($_SESSION['user']['administrator'] == "1"): ?>
    <div class="add-bth-box">
        <button type="button" class="add-btn"><img src="source/img/Add.svg"></button>
    </div>
<?php endif; ?>

<?php require_once 'tasks.php' ?>

</body>

</html>
