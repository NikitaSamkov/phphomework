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

INSERT INTO php_samkov.users (id, login, email, password, firstname, lastname, administrator) VALUES (1, 'test', '', 'd9b1d7db4cd6e70935368a1efb10e377', 'Тест', 'Тестов', 0);
INSERT INTO php_samkov.users (id, login, email, password, firstname, lastname, administrator) VALUES (2, 'test2', '', 'e4f84b0d653f181e2571bb44ccdce733', 'Тсет', 'Вотсет', 0);
INSERT INTO php_samkov.users (id, login, email, password, firstname, lastname, administrator) VALUES (3, 'test3', 'test3@test.ru', '9992295627e7e7162bdf77f14734acf8', 'Test', 'Testov', 1);
INSERT INTO php_samkov.users (id, login, email, password, firstname, lastname, administrator) VALUES (4, 'test4', 'test3@test.ru', 'e041148b5e3b8cbdbe1efc51151a407a', 'Testa', 'Testovo', 0);