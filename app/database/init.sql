-- SELECT 'CREATE DATABASE network_db'
--     WHERE NOT EXISTS (SELECT FROM pg_database WHERE datname = 'network_db')\gexec
-- CREATE DATABASE network_db;

-- CREATE USER user1 WITH PASSWORD 'pass';
-- GRANT ALL PRIVILEGES ON network_db TO user1;
-- FLUSH PRIVILEGES;

-- ALTER DATABASE network_db SET search_path TO network_db;

-- Table: public.users

-- DROP TABLE IF EXISTS public.users;

CREATE TABLE IF NOT EXISTS users
(
    id serial NOT NULL,
    email text NOT NULL,
    password text NOT NULL,
    data text,
    ip text,
    activation text,
    name text,
    lastname text,
    country text,
    city text,
    CONSTRAINT users_pkey PRIMARY KEY (id)
);


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

INSERT INTO users(email, password, date, ip, activation) VALUES
(
    'test@mail.ru',
    '1q2w3e4r',
    '2002-10-20',
    '192.168.0.13',
    1
),
(
    'buycber@gm.com',
    'nuq634dgy43^^D',
    '2022-10-24',
    '10.0.0.1',
    1
);