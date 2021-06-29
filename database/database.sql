CREATE DATABASE revemed;
USE revemed;

CREATE TABLE states(
id              INT(255) auto_increment NOT NULL,
name            VARCHAR(255) NOT NULL,
CONSTRAINT pk_states PRIMARY KEY (id),
CONSTRAINT uq_state_name UNIQUE (name)
)ENGINE=InnoDb;

CREATE TABLE cities(
id              INT(255) auto_increment NOT NULL,
state_id        INT(255) NOT NULL,
name            VARCHAR(255) NOT NULL,
CONSTRAINT pk_cities PRIMARY KEY (id),
CONSTRAINT fk_state_city FOREIGN KEY (state_id) REFERENCES states(id)
)ENGINE=InnoDb;

CREATE TABLE users(
ci              VARCHAR(255) NOT NULL,
city_id         INT(255)     NOT NULL,
name            VARCHAR(100) NOT NULL,
lastname        VARCHAR(255) NOT NULL,
password        VARCHAR(255) NOT NULL,
email           VARCHAR(255) NOT NULL,
phone           VARCHAR(255) NOT NULL,
birth_date      DATE NOT NULL,
role            VARCHAR(20),
CONSTRAINT pk_users PRIMARY KEY (ci),
CONSTRAINT uq_email UNIQUE (email)
)ENGINE=InnoDb;

CREATE TABLE patients(
id              INT(255) auto_increment NOT NULL,
ci              VARCHAR(255) NOT NULL,
address         VARCHAR(255) NOT NULL,
postcode        INT(255)     NOT NULL,
CONSTRAINT pk_patients PRIMARY KEY (id),
CONSTRAINT fk_user_patient FOREIGN KEY (ci) REFERENCES users(ci),
CONSTRAINT uq_ci_patient UNIQUE (ci)
)ENGINE=InnoDb;

CREATE TABLE specialities(
id              INT(255) auto_increment NOT NULL,
name            VARCHAR(255) NOT NULL,
CONSTRAINT pk_specialities PRIMARY KEY (id),
CONSTRAINT uq_speciality_name UNIQUE (name)
)ENGINE=InnoDb;

CREATE TABLE doctors(
id              INT(255) auto_increment NOT NULL,
ci              VARCHAR(255) NOT NULL,
speciality_id   INT(255) NOT NULL,
start_hour      TIME NOT NULL,
end_hour        TIME NOT NULL,
cost            DECIMAL(19,4),
CONSTRAINT pk_doctors PRIMARY KEY (id),
CONSTRAINT fk_user_doctor FOREIGN KEY (ci) REFERENCES users(ci),
CONSTRAINT fk_sṕeciality_doctor FOREIGN KEY (speciality_id) REFERENCES specialities(id),
CONSTRAINT uq_ci_doctor UNIQUE (ci)
)ENGINE=InnoDb;

CREATE TABLE appointments(
id              INT(255) auto_increment NOT NULL,
doctor_id       INT(255) NOT NULL,
patient_id      INT(255) NOT NULL,
a_date          DATE NOT NULL,
a_time          TIME NOT NULL,
CONSTRAINT pk_appointments PRIMARY KEY (id),
CONSTRAINT fk_doctor_a FOREIGN KEY (doctor_id) REFERENCES doctors(id),
CONSTRAINT fk_patient_a FOREIGN KEY (patient_id) REFERENCES patients(id)
)ENGINE=InnoDb;

CREATE TABLE center_admin(
id              INT(255) auto_increment NOT NULL,
username        VARCHAR(255) NOT NULL,
password        VARCHAR(255) NOT NULL,
CONSTRAINT pk_center PRIMARY KEY (id)
)ENGINE=InnoDb;
INSERT INTO center_admin VALUES(NULL, "CENTRO", "albdrt23$%0e##e456");

INSERT INTO states VALUES(NULL, "Lara");
INSERT INTO cities VALUES(NULL, 1, "Barquisimeto");
INSERT INTO cities VALUES(NULL, 1, "Carora");
INSERT INTO cities VALUES(NULL, 1, "Quíbor");
INSERT INTO cities VALUES(NULL, 1, "Cabudare");
INSERT INTO cities VALUES(NULL, 1, "Duaca");
INSERT INTO cities VALUES(NULL, 1, "Sanare");
INSERT INTO cities VALUES(NULL, 1, "El Tocuyo");
INSERT INTO cities VALUES(NULL, 1, "Sarare");
INSERT INTO cities VALUES(NULL, 1, "Siquisique");
INSERT INTO cities VALUES(NULL, 1, "Cuara");
INSERT INTO cities VALUES(NULL, 1, "Arenales");
INSERT INTO cities VALUES(NULL, 1, "Río Tocuyo");

INSERT INTO states VALUES(NULL, "Yaracuy");
INSERT INTO cities VALUES(NULL, 2, "San Felipe");
INSERT INTO cities VALUES(NULL, 2, "Yaritagua");
INSERT INTO cities VALUES(NULL, 2, "Chivacoa");
INSERT INTO cities VALUES(NULL, 2, "Nirgua");
INSERT INTO cities VALUES(NULL, 2, "Yumare");
INSERT INTO cities VALUES(NULL, 2, "San Pablo");

INSERT INTO states VALUES(NULL, "Portuguesa");
INSERT INTO cities VALUES(NULL, 3, "Acarigua");
INSERT INTO cities VALUES(NULL, 3, "Biscucuy");
INSERT INTO cities VALUES(NULL, 3, "Paraiso de Chabasquen");
INSERT INTO cities VALUES(NULL, 3, "Ospino");
INSERT INTO cities VALUES(NULL, 3, "Araure");
INSERT INTO cities VALUES(NULL, 3, "Guanare");
INSERT INTO cities VALUES(NULL, 3, "Agua Blanca");

INSERT INTO states VALUES(NULL, "Barinas");
INSERT INTO cities VALUES(NULL, 4, "Barinas");
INSERT INTO cities VALUES(NULL, 4, "Ciudad de Nutrias");
INSERT INTO cities VALUES(NULL, 4, "Bruzual");
INSERT INTO cities VALUES(NULL, 4, "Socopó");
INSERT INTO cities VALUES(NULL, 4, "Antonio José de Sucre");
INSERT INTO cities VALUES(NULL, 4, "Camaguan");
INSERT INTO cities VALUES(NULL, 4, "Santa Bárbara");
INSERT INTO cities VALUES(NULL, 4, "Guanare");
INSERT INTO cities VALUES(NULL, 4, "Sabaneta");
INSERT INTO cities VALUES(NULL, 4, "Libertad");

INSERT INTO states VALUES(NULL, "Carabobo");
INSERT INTO cities VALUES(NULL, 5, "Valencia");
INSERT INTO cities VALUES(NULL, 5, "Guacara");
INSERT INTO cities VALUES(NULL, 5, "Puerto Cabello");
INSERT INTO cities VALUES(NULL, 5, "Naguanagua");
INSERT INTO cities VALUES(NULL, 5, "San Diego");
INSERT INTO cities VALUES(NULL, 5, "Mariara");
INSERT INTO cities VALUES(NULL, 5, "Borburata");
INSERT INTO cities VALUES(NULL, 5, "Los Guayos");
INSERT INTO cities VALUES(NULL, 5, "Bejuma");
INSERT INTO cities VALUES(NULL, 5, "Yagua");
INSERT INTO cities VALUES(NULL, 5, "Montalban");
INSERT INTO cities VALUES(NULL, 5, "Miranda");
INSERT INTO cities VALUES(NULL, 5, "San Joaquín");
INSERT INTO cities VALUES(NULL, 5, "Belén");
INSERT INTO cities VALUES(NULL, 5, "Tocuyo de la Costa");
INSERT INTO cities VALUES(NULL, 5, "Aguirre");