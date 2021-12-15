<ul class="task-details edit">
    <li>
        <label>
            <b>Название задачи:</b>
            <input type="text" name="task-name" value="" placeholder="">
        </label>
    </li>
    <li>
        <label>
            <b>Описание:</b>
            <textarea rows="3" name="task-desc"></textarea>
        </label>
    </li>
    <li>
        <b>Тип задания:</b> <br>
        <label class="edit-radio" for="public">
            <input type="radio" name="task-type" id="public" value="public">
            Публичное (видят все пользователи) <br>
        </label>
        <label class="edit-radio" for="private">
            <input type="radio" name="task-type" id="private" value="private">
            Приватное (видит только сотрудник и назначивший администратор) <br>
        </label>
    </li>
    <li>
        <label>
            <b>Сотрудник:</b>
            <select name="worker">
                <?php foreach ($workers as $worker): ?>
                    <option value="<?=$worker['id']?>">
                        <?=$worker['login']." (".$worker['firstname']." ".$worker['lastname'].")"?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label>
    </li>
</ul>