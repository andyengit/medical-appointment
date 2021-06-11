CREATE DATABASE revemed;
USE revemed;

CREATE TABLE users(
id              INT(255) auto_increment NOT NULL,
name            VARCHAR(100) NOT NULL,
lastname        VARCHAR(255) NOT NULL,
password        VARCHAR(255) NOT NULL,
email           VARCHAR(255) NOT NULL,
ci              INT(100) NOT NULL,
phone           varchar(20) NOT NULL,
birth_date      DATE NOT NULL,
role            VARCHAR(20),
CONSTRAINT pk_usuarios PRIMARY KEY(id),
CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb;

INSERT INTO users VALUES(NULL, "Miguel", "Gozaine", "password", "admin@admin.com", 26555455, 04245677401, "1999-04-04", "admin");
