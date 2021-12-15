<?php
session_start();

?>

<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='utf-8'>
    <title>Редактировать профиль</title>
    <link rel="stylesheet" type="text/css" href="../auth/auth.css">
    <link rel="stylesheet" type="text/css" href="edit.css">
</head>

<body>
<div class="auth">
    <?php require '../auth/header.php'?>
    <form class="auth-form" action="Edit.php" method="POST">
        <p>Редактировать профиль</p>
        <?php if (isset($_SESSION['edit-errors'])): ?>
            <?php foreach($_SESSION['edit-errors'] as $error): ?>
                <div class="auth-error">
                    <img src="../source/img/error.svg">
                    <?=$error?>
                </div>
            <?php
                endforeach;
                unset($_SESSION['edit-errors']);
            ?>
        <?php endif; ?>



        <label class="auth-input-field">
            Email:<br>
            <input type="email" name="email" id="email" value="<?=$_SESSION['user']['email']?>" placeholder="<?=$_SESSION['user']['email']?>" required><br>
        </label>


        <label class="auth-input-field">
            Ваше имя:<br>
            <input type="text" name="firstname" id="firstname" value="<?=$_SESSION['user']['firstname']?>" placeholder="<?=$_SESSION['user']['firstname']?>" required><br>
        </label>

        <label class="auth-input-field">
            Ваша фамилия:<br>
            <input type="text" name="lastname" id="lastname" value="<?=$_SESSION['user']['lastname']?>" placeholder="<?=$_SESSION['user']['lastname']?>" required><br>
        </label>

        <label class="auth-input-field">
            Новый пароль:<br>
            <input type="password" name="new-password" id="new-password"><br>
        </label>

        <label class="auth-input-field">
            Для сохранения изменений введите старый пароль:<br>
            <input type="password" name="password" id="password" required><br>
        </label>

        <button class="submit-btn" name="submit" type="submit" value="">
            <img height="50" src="../source/img/Check.svg">
        </button>
    </form>
</div>
</body>

</html>

