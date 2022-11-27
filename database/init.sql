-- SELECT 'CREATE DATABASE network_db'
--     WHERE NOT EXISTS (SELECT FROM pg_database WHERE datname = 'network_db')\gexec
-- CREATE DATABASE network_db;

-- CREATE USER user1 WITH PASSWORD 'pass';
-- GRANT ALL PRIVILEGES ON network_db TO user1;
-- FLUSH PRIVILEGES;

-- ALTER DATABASE network_db SET search_path TO network_db;

CREATE TABLE users (
    id serial PRIMARY KEY,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(50) NOT NULL,
    "date" DATE NOT NULL,
    ip VARCHAR(100)
);
INSERT INTO users(email, password, "date", ip) VALUES
(
    'test@mail.ru',
    '1q2w3e4r',
    '2002-10-20',
    '192.168.0.13'
),
(
    'buycber@gm.com',
    'nuq634dgy43^^D',
    '2022-10-24',
    '10.0.0.1'
);