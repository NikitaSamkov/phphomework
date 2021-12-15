<?php
if (isset($_POST['task-id'])) {
    require_once 'DBConnection.php';
    $db = new DBConnection('phphomework', 'php_samkov');
    $db->DeleteRow('tasks', 'id', $_POST['task-id']);
}

header('Location: ../index.php');
exit();