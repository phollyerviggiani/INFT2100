/*
Patrick Hollyer-Viggiani
01_create_users_table.sql
11 October, 2024
INFT2100
*/

-- Adding the encryption extension
CREATE EXTENSION IF NOT EXISTS pgcrypto;

-- Drops to ensure no duplication error
DROP TABLE IF EXISTS users;
DROP SEQUENCE IF EXISTS users_id_seq;

CREATE SEQUENCE users_id_seq START 100900000;

CREATE TABLE users (
	user_id INT PRIMARY KEY DEFAULT nextval('users_id_seq'),
	first_name VARCHAR(255),
	last_name VARCHAR(255),
	email VARCHAR(255) UNIQUE NOT NULL,
	birth_date DATE,
	created_at DATE DEFAULT NOW(),
	last_access TIMESTAMP,
	password VARCHAR(255)
);

SELECT * FROM users;