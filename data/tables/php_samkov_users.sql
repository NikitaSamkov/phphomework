create table users
(
    id            int auto_increment
        primary key,
    login         varchar(255)            not null,
    email         varchar(255) default '' not null,
    password      varchar(255)            not null,
    firstname     varchar(255) default '' not null,
    lastname      varchar(255) default '' not null,
    administrator tinyint(1)   default 0  not null
);

INSERT INTO php_samkov.users (id, login, email, password, firstname, lastname, administrator) VALUES (1, 'test', '', '$2y$10$5U.6d8k.a4jectcwpuydneC00DwAhBUtzAi3ndKjWFWq8UWWxWYiG', 'Тест', 'Тестов', 0);
INSERT INTO php_samkov.users (id, login, email, password, firstname, lastname, administrator) VALUES (2, 'test2', '', '$2y$10$5U.6d8k.a4jectcwpuydneC00DwAhBUtzAi3ndKjWFWq8UWWxWYiG', 'Тсет', 'Вотсет', 0);
INSERT INTO php_samkov.users (id, login, email, password, firstname, lastname, administrator) VALUES (3, 'test3', 'test3@test.ru', '$2y$10$5U.6d8k.a4jectcwpuydneC00DwAhBUtzAi3ndKjWFWq8UWWxWYiG', 'Test', 'Testov', 1);
INSERT INTO php_samkov.users (id, login, email, password, firstname, lastname, administrator) VALUES (4, 'test4', 'test3@test.ru', '$2y$10$5U.6d8k.a4jectcwpuydneC00DwAhBUtzAi3ndKjWFWq8UWWxWYiG', 'Testa', 'Testovo', 0);
INSERT INTO php_samkov.users (id, login, email, password, firstname, lastname, administrator) VALUES (5, 'test5', 'test5@test', '$2y$10$zZEFvceED6pkx5HcquPALuzw.26u7IiQMs2FEvAukYuqxU0gTgQrG', 'Никита', 'Самков', 1);
INSERT INTO php_samkov.users (id, login, email, password, firstname, lastname, administrator) VALUES (6, 'test6', '123@4', '$2y$10$5U.6d8k.a4jectcwpuydneC00DwAhBUtzAi3ndKjWFWq8UWWxWYiG', 'q', 'w', 0);
INSERT INTO php_samkov.users (id, login, email, password, firstname, lastname, administrator) VALUES (7, 'test7', '123@4', '$2y$10$5U.6d8k.a4jectcwpuydneC00DwAhBUtzAi3ndKjWFWq8UWWxWYiG', 'q', 'w', 0);
INSERT INTO php_samkov.users (id, login, email, password, firstname, lastname, administrator) VALUES (8, 'longuser', '123@4', '$2y$10$5U.6d8k.a4jectcwpuydneC00DwAhBUtzAi3ndKjWFWq8UWWxWYiG', 'йцукенгшщзхъфывапролджэячсмит', 'ы', 0);
INSERT INTO php_samkov.users (id, login, email, password, firstname, lastname, administrator) VALUES (9, 'asa', 'a@a', '$2y$10$5U.6d8k.a4jectcwpuydneC00DwAhBUtzAi3ndKjWFWq8UWWxWYiG', 'asa', 'sas', 0);
INSERT INTO php_samkov.users (id, login, email, password, firstname, lastname, administrator) VALUES (10, 'dfhjdkfh', 'a@a', '$2y$10$5U.6d8k.a4jectcwpuydneC00DwAhBUtzAi3ndKjWFWq8UWWxWYiG', 'as', 'sas', 1);