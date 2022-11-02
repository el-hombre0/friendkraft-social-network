SELECT 'CREATE DATABASE network_db'
    WHERE NOT EXISTS (SELECT FROM pg_database WHERE datname = 'network_db')\gexec
-- CREATE DATABASE network_db;

CREATE USER user1 WITH PASSWORD 'pass';
-- GRANT ALL PRIVILEGES ON network_db TO user1;
-- FLUSH PRIVILEGES;

ALTER DATABASE network_db SET search_path TO network_db;

CREATE TABLE IF NOT EXISTS "users"(
    id serial PRIMARY KEY,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(50) NOT NULL,
    "date" DATE NOT NULL
);