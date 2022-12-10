-- SELECT 'CREATE DATABASE network_db'
--     WHERE NOT EXISTS (SELECT FROM pg_database WHERE datname = 'network_db')\gexec
-- CREATE DATABASE network_db;

-- CREATE USER user1 WITH PASSWORD 'pass';
-- GRANT ALL PRIVILEGES ON network_db TO user1;
-- FLUSH PRIVILEGES;

-- ALTER DATABASE network_db SET search_path TO network_db;

-- Table: public.users

-- DROP TABLE IF EXISTS public.users;
-- ///////////////////////////////////////  Пользователи  ///////////////////////////////////////
CREATE TABLE IF NOT EXISTS users
(
    id         serial NOT NULL,
    email      text   NOT NULL,
    password   text   NOT NULL,
    data       text,
    name       text,
    lastname   text,
    country    text,
    city       text,
    avatar     text,
    ip         text,
    activation text,
    CONSTRAINT users_pkey PRIMARY KEY (id)
);

-- ///////////////////////////////////////  Профиль  ///////////////////////////////////////

CREATE TABLE IF NOT EXISTS public.profile
(
    id        serial  NOT NULL,
    id_user   integer NOT NULL,
    polojenie text COLLATE pg_catalog."default",
    sex       text COLLATE pg_catalog."default",
    day       integer,
    monday    text COLLATE pg_catalog."default",
    year      integer,
    film      text COLLATE pg_catalog."default",
    music     text COLLATE pg_catalog."default",
    tele      text COLLATE pg_catalog."default",
    book      text COLLATE pg_catalog."default",
    game      text COLLATE pg_catalog."default",
    osebe     text COLLATE pg_catalog."default",
    phone     text COLLATE pg_catalog."default",
    phone_2   text COLLATE pg_catalog."default",
    skype     text COLLATE pg_catalog."default",
    sait      text COLLATE pg_catalog."default",
    CONSTRAINT profile_pkey PRIMARY KEY (id_user)
)
    WITH (
        OIDS = FALSE
    )
    TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.profile
    OWNER to postgres;

-- ///////////////////////////////////////  Сообщения  ///////////////////////////////////////

CREATE TABLE IF NOT EXISTS public.message
(
    id         integer NOT NULL DEFAULT nextval('message_id_seq'::regclass),
    author     integer,
    poluchatel integer,
    mess       text COLLATE pg_catalog."default",
    data       text COLLATE pg_catalog."default",
    ready      integer,
    CONSTRAINT message_pkey PRIMARY KEY (id)
)
    WITH (
        OIDS = FALSE
    )
    TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.message
    OWNER to postgres;

-- ///////////////////////////////////////  Диалог  ///////////////////////////////////////

CREATE TABLE IF NOT EXISTS public.dialog
(
    id         integer NOT NULL DEFAULT nextval('dialog_id_seq'::regclass),
    author     integer,
    poluchatel integer,
    ready      integer,
    mess       text COLLATE pg_catalog."default",
    data       text COLLATE pg_catalog."default",
    CONSTRAINT dialog_pkey PRIMARY KEY (id)
)
    WITH (
        OIDS = FALSE
    )
    TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.dialog
    OWNER to postgres;

-- ///////////////////////////////////////  Друзья  ///////////////////////////////////////


CREATE TABLE IF NOT EXISTS public.friends
(
    id        integer NOT NULL DEFAULT nextval('friends_id_seq'::regclass),
    id_user   integer,
    id_user_2 integer NOT NULL,
    status    text COLLATE pg_catalog."default",
    CONSTRAINT friends_pkey PRIMARY KEY (id_user_2)
)
    WITH (
        OIDS = FALSE
    )
    TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.friends
    OWNER to postgres;

-- ///////////////////////////////////////  Записи  ///////////////////////////////////////


-- Table: public.zapisi

-- DROP TABLE IF EXISTS public.zapisi;

CREATE TABLE IF NOT EXISTS public.zapisi
(
    id integer NOT NULL,
    author integer,
    poluchatel integer,
    mess text COLLATE pg_catalog."default",
    data text COLLATE pg_catalog."default",
    CONSTRAINT zapisi_pkey PRIMARY KEY (id)
)
    WITH (
        OIDS = FALSE
    )
    TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.zapisi
    OWNER to postgres;

-- ///////////////////////////////////////  Что нового  ///////////////////////////////////////

-- Table: public.novogo

-- DROP TABLE IF EXISTS public.novogo;

CREATE TABLE IF NOT EXISTS public.novogo
(
    id integer NOT NULL DEFAULT nextval('novogo_id_seq'::regclass),
    id_user integer NOT NULL,
    text text COLLATE pg_catalog."default",
    data text COLLATE pg_catalog."default",
    poluchatel integer,
    status integer,
    CONSTRAINT novogo_pkey PRIMARY KEY (id_user)
)
    WITH (
        OIDS = FALSE
    )
    TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.novogo
    OWNER to postgres;

INSERT INTO users(email, password, data, name, lastname, country, city, ip, activation, avatar)
VALUES ('evendot@yandex.ru',
        '5416d7cd6ef195a0f7622a9c56b55e84',
        '2002-10-20',
        'Станислав',
        'Ефимцев',
        'Россия',
        'Москва',
        '192.168.0.13',
        1,
        '1.png');