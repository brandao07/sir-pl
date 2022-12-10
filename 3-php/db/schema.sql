create table if not exists me
(
    id                       bigint auto_increment
        primary key,
    name                     varchar(25)          null,
    quote                    varchar(50)          null,
    image                    varchar(1000)        null,
    languages_description    varchar(1000)        null,
    certificates_description varchar(1000)        null,
    skills_description       varchar(1000)        null,
    is_deleted               tinyint(1) default 0 null
);

create table if not exists abouts
(
    id          bigint auto_increment
        primary key,
    description varchar(10000)       not null,
    is_deleted  tinyint(1) default 0 null,
    id_me       bigint               null,
    constraint abouts_me_null_fk
        foreign key (id_me) references me (id)
);

create table if not exists certificates
(
    id         bigint auto_increment
        primary key,
    name       varchar(100)         null,
    image      varchar(1000)        null,
    is_deleted tinyint(1) default 0 null,
    id_me      bigint               null,
    constraint certificates_me_null_fk
        foreign key (id_me) references me (id)
);

create table if not exists contact_requests
(
    id          bigint auto_increment
        primary key,
    email       varchar(50)          null,
    subject     varchar(50)          null,
    description varchar(200)         null,
    is_deleted  tinyint(1) default 0 null,
    id_me       bigint               null,
    constraint contact_requests_me_null_fk
        foreign key (id_me) references me (id)
);

create table if not exists educations
(
    id          bigint auto_increment
        primary key,
    name        varchar(50)          null,
    duration    varchar(50)          null,
    description varchar(2000)        null,
    is_deleted  tinyint(1) default 0 null,
    id_me       bigint               null,
    constraint educations_me_null_fk
        foreign key (id_me) references me (id)
);

create table if not exists roles
(
    id         bigint auto_increment
        primary key,
    type       varchar(25)          null,
    is_deleted tinyint(1) default 0 null,
    constraint roles_type_unique
        unique (type)
);

create table if not exists skills
(
    id         bigint auto_increment
        primary key,
    name       varchar(100)         null,
    image      varchar(1000)        null,
    is_deleted tinyint(1) default 0 null,
    id_me      bigint               null,
    constraint skills_me_null_fk
        foreign key (id_me) references me (id)
);

create table if not exists social_medias
(
    id         bigint auto_increment
        primary key,
    name       varchar(25)          null,
    url        varchar(100)         null,
    is_deleted tinyint(1) default 0 null,
    id_me      bigint               null,
    constraint social_medias_me_null_fk
        foreign key (id_me) references me (id)
);

create table if not exists stats
(
    id          bigint auto_increment
        primary key,
    device_type varchar(25)          null,
    is_deleted  tinyint(1) default 0 null,
    id_me       bigint               null,
    constraint stats_me_null_fk
        foreign key (id_me) references me (id)
);

create table if not exists users
(
    id         bigint auto_increment
        primary key,
    name       varchar(25)          null,
    username   varchar(25)          null,
    password   varchar(500)         null,
    is_deleted tinyint(1) default 0 null,
    id_me      bigint               null,
    id_roles   bigint               null,
    constraint users_username_unique
        unique (username),
    constraint users_me_null_fk
        foreign key (id_me) references me (id),
    constraint users_roles_null_fk
        foreign key (id_roles) references roles (id)
);



INSERT INTO me (id) VALUE (1);
INSERT INTO roles (id, type) VALUE (1, 'admin');
INSERT INTO roles (id, type) VALUE (2, 'manager');
INSERT INTO users (name, username, password, id_me, id_roles) VALUE ('admin', 'admin',
                                                                     '$2y$10$CcLohVKD6ziT3Q7GI.obLOqDNR7u1wsSat.x4HDsi24VO19KYqHkq',
                                                                     1, 1);