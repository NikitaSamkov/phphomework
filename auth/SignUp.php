<?php
session_start();

require '../data/DBConnection.php';
$conn = new DBConnection('phphomework', 'php_samkov');

if(isset($_POST['submit'])) {
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);

    $err = array();

    if(!preg_match("/^[a-zA-Z0-9]+$/", $login)) {
        $err[] = "Логин может состоять только из букв английского алфавита и цифр";
    }

    if(strlen($_POST['login']) < 3 or strlen($login) > 30) {
        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
    }

    if($conn->IsExists('users', 'login', $login)) {
        $err[] = "Пользователь с таким логином уже существует в базе данных";
    }

    if(!str_contains($email, '@')) {
        $err[] = "Неверный адрес электронной почты";
    }

    if(strlen($firstname) > 30) {
        $err[] = "Имя должен быть не длиннее 30 символов";
    }

    if(strlen($lastname) > 30) {
        $err[] = "Фамилия должена быть не длиннее 30 символов";
    }

    if(count($err) == 0) {
        $admin = $_POST['admin'] == 'on' ? 'TRUE' : 'FALSE';
        $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
        $values = array(
            'NULL',
            [$login, true],
            [$email, true],
            [$password, true],
            [$firstname, true],
            [$lastname, true],
            $admin
        );
        $conn->AddRow('users', $values);
        $_SESSION['user'] = $conn->GetRow('users', 'login', $login)[0];
        header("Location: ../index.php");
        exit();
    }
    else {
        $_SESSION['reg-errors'] = $err;
    }
}

header('Location: register.php');
exit();
