create table tasks
(
    id        int auto_increment
        primary key,
    task_name varchar(255) not null,
    task_desc varchar(255) null,
    worker_id int          not null,
    admin_id  int          not null,
    constraint tasks_users_id_fk
        foreign key (worker_id) references users (id)
);

