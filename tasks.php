<?php
$workers = $conn->QueryGet("SELECT * FROM users WHERE administrator=0")
?>

<main>
    <div class="tasks">
        <?php foreach ($tasks as $id => $task): ?>
            <button class="task" id="<?=$id?>">
                <div class="task-info">
                    <div class="task-top-info">
                        <div class="task-name"><?=$task['task_name']?></div>
                        <div class="task-worker">Для: <?=$task['w_login']?></div>
                    </div>
                    <div class="task-description"><?=$task['task_desc']?></div>
                </div>
                <div class="task-progress"><?=$task['status']?>%</div>
            </button>
        <?php endforeach; ?>
    </div>
</main>
<div class="info-tab hidden">
    <div class="info-tab-content">
        <div class="info-tab-task">
            <ul class="task-details">
                <li id="name">
                    <b>Название задачи:</b><br>
                    <div class="content"></div>
                </li>
                <li id="desc">
                    <b>Описание:</b><br>
                    <div class="content"></div>
                </li>
                <li id="progress">
                    <b>Прогресс:</b><br>
                    <div class="content"></div>
                </li>
                <li id="worker">
                    <b>Сотрудник:</b><br>
                    <div class="content"></div>
                </li>
                <li id="admin">
                    <b>Назначил:</b><br>
                    <div class="content"></div>
                </li>
                <li id="created_at">
                    <b>Создана:</b><br>
                    <div class="content"></div>
                </li>
                <li id="finished_at">
                    <b>Завершена:</b><br>
                    <div class="content"></div>
                </li>
            </ul>
            <div class="info-tab-buttons">
                <button class="info-tab-btn edit-btn">Редактировать</button>
                <button class="info-tab-btn delete-btn">Удалить</button>
            </div>
            <div class="info-tab-delete-confirmation hidden">
                Вы уверены? <br>
                <form action="data/DeleteTask.php" method="post" class="delete-confirmation-buttons">
                    <input class="task-id-delete" type="hidden" name="task-id" value="0">
                    <button type="submit" class="info-tab-btn yes-btn">Да</button>
                    <button type="button" class="info-tab-btn no-btn">Нет</button>
                </form>
            </div>
            <form class="edit hidden" action="data/EditTask.php" method="post">
                <div class="admin-edit hidden">
                    <?php require_once 'data/info-tab_add.php' ?>
                </div>
                <div class="worker-edit hidden">
                    <label>
                        <b>Прогресс:</b>
                        <input name="progress" type="number" min="0" max="100">%
                    </label>
                    <input type="range" min="0" max="100" value="0">
                </div>
                <input type="hidden" name="task-id" value="0">
                <div class="info-tab-buttons">
                    <button class="submit-btn" name="submit" type="submit" value="">
                        <img height="50" src="source/img/Check.svg">
                    </button>
                    <button class="cancel-btn" name="submit" type="button" value="">
                        <img height="50" src="source/img/Cross-black.svg">
                    </button>
                </div>
            </form>
        </div>
        <button class="close-btn"><img width="40" src="source/img/Cross-gray.svg"></button>
    </div>
</div>

<script>
    let tasksData = <?php echo json_encode($tasks); ?>;
    let userData =
        <?php
        if (isset($_SESSION['user'])) {
            echo json_encode($_SESSION['user']);
        } else {
            echo 'false';
        }
        ?>;
</script>
<script src="data/info-tab.js"></script>
