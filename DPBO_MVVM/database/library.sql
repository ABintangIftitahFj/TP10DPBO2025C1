CREATE DATABASE library;
USE library;

CREATE TABLE department (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE shift (
    id INT AUTO_INCREMENT PRIMARY KEY,
    shift_name VARCHAR(50) NOT NULL
);

CREATE TABLE staff (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    department_id INT NOT NULL,
    shift_id INT NOT NULL,
    FOREIGN KEY (department_id) REFERENCES department(id),
    FOREIGN KEY (shift_id) REFERENCES shift(id)
);

INSERT INTO department (name) VALUES ('Peminjaman'), ('Katalog');
INSERT INTO shift (shift_name) VALUES ('Pagi'), ('Malam');
