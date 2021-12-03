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
        foreign key (worker_id) references users (id)
);

