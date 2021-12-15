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
                <div class="delete-confirmation-buttons">
                    <button class="info-tab-btn yes-btn">Да</button>
                    <button class="info-tab-btn no-btn">Нет</button>
                </div>
            </div>
        </div>
        <button class="close-btn"><img width="40" src="source/img/Cross.svg"></button>
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
<script src="info-tab.js"></script>
