<?php
session_start();

if(isset($_POST['submit'])) {
    require_once 'DBConnection.php';
    $conn = new DBConnection('phphomework', 'php_samkov');
    $values = array(
        'NULL',
        [$_POST['task-name'], true],
        [$_POST['task-desc'], true],
        0,
        isset($_POST['task-type']) ? [$_POST['task-type'], true] : 'NULL',
        $_POST['worker'],
        $_SESSION['user']['id'],
        [date("Y-m-d H:i:s"), true],
        'NULL'
    );
    $conn->AddRow('tasks', $values);
}

header('Location: ../profile.php');
exit();
