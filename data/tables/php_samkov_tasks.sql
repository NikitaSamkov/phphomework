create table tasks
(
    id          int auto_increment
        primary key,
    task_name   varchar(255)                   not null,
    task_desc   text                           null,
    status      varchar(255)                   not null,
    type        varchar(255) default 'private' not null,
    worker_id   int                            not null,
    admin_id    int                            not null,
    created_at  datetime                       not null,
    finished_at datetime                       null,
    constraint tasks_users_id_fk_2
        foreign key (admin_id) references users (id)
            on delete cascade
);

create index tasks_users_id_fk
    on tasks (worker_id);

INSERT INTO php_samkov.tasks (id, task_name, task_desc, status, type, worker_id, admin_id, created_at, finished_at) VALUES (1, 'Уборка', 'Убраться в доме', '10', 'public', 1, 5, '2021-12-03 15:00:00', null);
INSERT INTO php_samkov.tasks (id, task_name, task_desc, status, type, worker_id, admin_id, created_at, finished_at) VALUES (2, 'PHP Homework', 'Сделать ИДЗ по PHP', '80', 'public', 8, 3, '2021-10-05 09:00:00', null);
INSERT INTO php_samkov.tasks (id, task_name, task_desc, status, type, worker_id, admin_id, created_at, finished_at) VALUES (3, 'Very Looooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooong Task', 'Идейные соображения высшего порядка, а также укрепление и развитие структуры способствует подготовки и реализации дальнейших направлений развития. Разнообразный и богатый опыт рамки и место обучения кадров в значительной степени обуславливает создание новых предложений. Товарищи! новая модель организационной деятельности требуют от нас анализа модели развития. Задача организации, в особенности же консультация с широким активом играет важную роль в формировании новых предложений.', '50', 'public', 7, 10, '2021-12-09 03:00:38', '2021-12-09 03:05:00');
INSERT INTO php_samkov.tasks (id, task_name, task_desc, status, type, worker_id, admin_id, created_at, finished_at) VALUES (6, 'Секретная приватная задача', 'Её можно увидеть только в личном профиле', '99', 'private', 4, 5, '2021-12-15 19:02:40', null);
INSERT INTO php_samkov.tasks (id, task_name, task_desc, status, type, worker_id, admin_id, created_at, finished_at) VALUES (8, 'Задача, которая поменяется в будущем', 'Очень изменчивое описание', '37', 'public', 2, 5, '2021-12-16 00:10:06', null);