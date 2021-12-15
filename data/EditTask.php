<?php
if (isset($_POST['submit'])) {
    require_once 'DBConnection.php';
    $conn = new DBConnection('phphomework', 'php_samkov');

    $values = array();
    if (isset($_POST['task-name']) && $_POST['task-name']) {
        $values['task_name'] = [$_POST['task-name'], true];
    }
    if (isset($_POST['task-desc']) && $_POST['task-desc']) {
        $values['task_desc'] = [$_POST['task-desc'], true];
    }
    if (isset($_POST['task-type'])) {
        $values['type'] = [$_POST['task-type'], true];
    }
    if (isset($_POST['worker'])) {
        $values['worker_id'] = $_POST['worker'];
    }

    $conn->UpdateRow('tasks', $values, 'id', $_POST['task-id']);
}

header('Location: ../profile.php');
exit();