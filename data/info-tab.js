function formatDate (date) {
    let ruDateFormat = new Intl.DateTimeFormat("ru").format;
    return ruDateFormat(date);
}

let tasks = document.querySelectorAll('.task');
let taskList = document.querySelector('.tasks');

let infoTab = document.querySelector('.info-tab');
let infoTabClose = infoTab.querySelector('.close-btn');
let taskDetails = infoTab.querySelector('.task-details').querySelectorAll('li');
let infoTabButtons = infoTab.querySelector('.info-tab-buttons');
let deleteButton = infoTabButtons.querySelector('.delete-btn');
let editButton = infoTabButtons.querySelector('.edit-btn');
let confirmation = infoTab.querySelector('.info-tab-delete-confirmation');

let taskNameMaxChars = 30;
let taskDescMaxChars = 80;

for(let task of tasks) {
    let name = task.querySelector('.task-name');
    let desc = task.querySelector('.task-description');
    if (name.textContent.length >= taskNameMaxChars) {
        name.textContent = name.textContent.substr(0, taskNameMaxChars - 3) + '...';
    }
    if (desc.textContent.length >= taskDescMaxChars) {
        desc.textContent = desc.textContent.substr(0, taskDescMaxChars - 3) + '...';
    }
    task.onclick = function () {
        infoTab.classList.remove('hidden');
        taskList.style.width = '70%';

        for(let detail of taskDetails) {
            let content = detail.querySelector('.content');

            switch (detail.id) {
                case 'name':
                    content.textContent = tasksData[task.id]['task_name'];
                    break;
                case 'desc':
                    content.textContent = tasksData[task.id]['task_desc'];
                    break;
                case 'progress':
                    let progress = parseInt(tasksData[task.id]['status']);
                    let status = 'Еще не начата';
                    if (progress > 0 && progress < 100) {
                        status = 'В процессе'
                    }
                    if (progress === 100) {
                        status = 'Готово'
                    }
                    content.textContent = status + ' (' + progress + '%)';
                    let green = 255 * (parseInt(progress / 51) * (1 - progress / 50) + progress / 50)
                    let red = 255 * (1 - (progress - 50) / 50 * parseInt(progress / 51))
                    content.style.backgroundColor = 'rgb(' + red + ',' + green + ',0)';
                    break;
                case 'worker':
                    content.textContent = tasksData[task.id]['w_fn'] + ' ' + tasksData[task.id]['w_ln'] + ' (' + tasksData[task.id]['w_login'] + ')';
                    break;
                case 'admin':
                    content.textContent = tasksData[task.id]['a_fn'] + ' ' + tasksData[task.id]['a_ln'] + ' (' + tasksData[task.id]['a_login'] + ')';
                    break;
                case 'created_at':
                    content.textContent = formatDate(Date.parse(tasksData[task.id]['created_at']));
                    break;
                case 'finished_at':
                    if (tasksData[task.id]['finished_at'] === null) {
                        detail.classList.add('hidden');
                    } else {
                        detail.classList.remove('hidden');
                        content.textContent = formatDate(Date.parse(tasksData[task.id]['finished_at']));
                    }
                    break;
                default:
                    content.textContent = 'НЕ НАЙДЕНО :(';
                    break;
            }
            if (userData !== false && (tasksData[task.id]['admin_id'] === userData['id'] || tasksData[task.id]['worker_id'] === userData['id'])) {
                editButton.classList.remove('hidden');
            } else {
                editButton.classList.add('hidden');
            }

            if (userData !== false && tasksData[task.id]['admin_id'] === userData['id']) {
                deleteButton.classList.remove('hidden');
            } else {
                deleteButton.classList.add('hidden');
            }

        }
    }
}

infoTabClose.onclick = function () {
    infoTab.classList.add('hidden');
    taskList.style.width = '100%';
}

deleteButton.onclick = function () {
    confirmation.classList.remove('hidden');
    infoTabButtons.classList.add('hidden');
}

confirmation.querySelector('.no-btn').onclick = function () {
    infoTabButtons.classList.remove('hidden');
    confirmation.classList.add('hidden');
}

confirmation.querySelector('.yes-btn').onclick = function () {
    //not implemented
    location.reload();
}

editButton.onclick = function () {
    //not implemented
}
