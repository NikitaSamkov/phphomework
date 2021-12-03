<?php
session_start();
require 'DBConnection.php';
$conn = new DBConnection('phphomework', 'php_samkov');
echo 'успешно подключено';
if(isset($_POST['submit'])) {
    $err = array();

    if(!preg_match("/^[a-zA-Z0-9]+$/", $_POST['login'])) {
        $err[] = "Логин может состоять только из букв английского алфавита и цифр";
    }

    if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30) {
        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
    }

    if($conn->IsExists('users', 'login', $_POST['login'])) {
        $err[] = "Пользователь с таким логином уже существует в базе данных";
    }

    if(count($err) == 0) {
        $login = $_POST['login'];
        $password = md5(md5(trim($_POST['password'])));
        $query = "INSERT INTO users SET login='$login', password='$password'";
        $conn->Query($query);
        header("Location: index.php");
        exit();
    }
    else {
        echo "<b>При регистрации произошли следующие ошибки:</b><br>";

        foreach($err AS $error) {
            echo $error."<br>";
        }
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
<form method="POST">

    Логин <input name="login" type="text"><br>

    Пароль <input name="password" type="password"><br>

    <input name="submit" type="submit" value="Зарегистрироваться">

</form>
</body>

</html>

