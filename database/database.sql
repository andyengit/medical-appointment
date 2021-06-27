CREATE DATABASE revemed;
USE revemed;

CREATE TABLE users(
id              INT(255) auto_increment NOT NULL,
name            VARCHAR(100) NOT NULL,
lastname        VARCHAR(255) NOT NULL,
password        VARCHAR(255) NOT NULL,
email           VARCHAR(255) NOT NULL,
ci              VARCHAR(255) NOT NULL,
phone           VARCHAR(255) NOT NULL,
birth_date      DATE NOT NULL,
role            VARCHAR(20),
CONSTRAINT pk_users PRIMARY KEY (id),
CONSTRAINT uq_email UNIQUE (email)
)ENGINE=InnoDb;

CREATE TABLE patients(
id              INT(255) auto_increment NOT NULL,
user_id         INT(255) NOT NULL,
CONSTRAINT pk_patients PRIMARY KEY (id),
CONSTRAINT fk_user_patient FOREIGN KEY (user_id) REFERENCES users(id)
)ENGINE=InnoDb;

CREATE TABLE addresses(
id              INT(255) auto_increment NOT NULL,
patient_id      INT(255) NOT NULL,
state           VARCHAR(255) NOT NULL,
locality        VARCHAR(255) NOT NULL,
street          VARCHAR(255) NOT NULL,
house_number    VARCHAR(255) NOT NULL,
postcode        VARCHAR(255) NOT NULL,
CONSTRAINT pk_addresses PRIMARY KEY (id),
CONSTRAINT fk_patient_address FOREIGN KEY (patient_id) REFERENCES patients(id)
)ENGINE=InnoDb;

CREATE TABLE doctors(
id              INT(255) auto_increment NOT NULL,
user_id         INT(255) NOT NULL,
speciality      VARCHAR(255) NOT NULL,
start_hour      TIME NOT NULL,
end_hour        TIME NOT NULL,
cost            DECIMAL(19,4),
CONSTRAINT pk_doctors PRIMARY KEY (id),
CONSTRAINT fk_user_doctor FOREIGN KEY (user_id) REFERENCES users(id)
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
