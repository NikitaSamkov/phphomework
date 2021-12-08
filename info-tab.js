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
