let infoTab = document.querySelector('.info-tab');
let tasks = document.querySelectorAll('.task');
let taskList = document.querySelector('.tasks');
let infoTabClose = infoTab.querySelector('.close-btn');
let taskDetails = infoTab.querySelector('.task-details').querySelectorAll('li');
console.log(tasksData);
for(let task of tasks) {
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
                default:
                    content.textContent = 'НЕ НАЙДЕНО :(';
                    break;
            }

        }
    }
}

infoTabClose.onclick = function () {
    infoTab.classList.add('hidden');
    taskList.style.width = '100%';
}
