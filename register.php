<?php
session_start();

require 'DBConnection.php';
$conn = new DBConnection('phphomework', 'php_samkov');

if(isset($_SESSION['reg-errors'])) {
    foreach($_SESSION['reg-errors'] as $error) {
        echo $error."<br>";
    }
}
?>

<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='utf-8'>
    <title>Регистрация</title>
</head>

<body>
<form action="SignUp.php" method="POST">
    <label for="login">Логин:<br></label>
    <input type="text" name="login" id="login"><br>

    <label for="email">Email:<br></label>
    <input type="email" name="email" id="email"><br>

    <label for="firstname">Имя:<br></label>
    <input type="text" name="firstname" id="firstname"><br>

    <label for="lastname">Фамилия:<br></label>
    <input type="text" name="lastname" id="lastname"><br>

    <label for="password">Пароль:<br></label>
    <input type="password" name="password" id="password"><br>

    <label><input type="checkbox" name="admin" id="admin"> я являюсь администратором:<br></label>




    <input name="submit" type="submit" value="Зарегистрироваться">

</form>
</body>

</html>

