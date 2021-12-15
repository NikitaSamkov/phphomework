<?php
if (isset($_POST['task-id'])) {
    require_once 'DBConnection.php';
    $conn = new DBConnection('phphomework', 'php_samkov');
    $conn->DeleteRow('tasks', 'id', $_POST['task-id']);
}

header('Location: ../profile.php');
exit();