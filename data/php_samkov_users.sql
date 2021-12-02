create table users
(
    id            int auto_increment
        primary key,
    firstname     varchar(255)         not null,
    lastname      varchar(255)         not null,
    login         varchar(255)         not null,
    email         varchar(255)         not null,
    password      varchar(255)         not null,
    administrator tinyint(1) default 0 not null
);

