create table tasks
(
    id          int auto_increment
        primary key,
    task_name   varchar(255)                   not null,
    task_desc   varchar(255)                   null,
    status      varchar(255)                   not null,
    type        varchar(255) default 'private' not null,
    worker_id   int                            not null,
    admin_id    int                            not null,
    created_at  datetime                       not null,
    finished_at datetime                       null,
    constraint tasks_users_id_fk
        foreign key (worker_id) references users (id),
    constraint tasks_users_id_fk_2
        foreign key (admin_id) references users (id)
);

INSERT INTO php_samkov.tasks (id, task_name, task_desc, status, type, worker_id, admin_id, created_at, finished_at) VALUES (1, 'Уборка', 'Убраться в доме', '0', 'public', 1, 5, '2021-12-03 15:00:00', null);
INSERT INTO php_samkov.tasks (id, task_name, task_desc, status, type, worker_id, admin_id, created_at, finished_at) VALUES (2, 'PHP Homework', 'Сделать ИДЗ по PHP', '0', 'public', 8, 3, '2021-10-05 09:00:00', null);