CREATE DATABASE ncrb CHARACTER SET UTF8 COLLATE utf8_general_ci;

CREATE TABLE users ( guid VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PASSWORD VARCHAR(255) NOT NULL, PRIMARY KEY(guid) ) ENGINE=INNODB DEFAULT CHARSET=UTF8 COLLATE=utf8_general_ci

INSERT INTO employee (`name`,`salary`) VALUES ('namita',1000);

UPDATE employee SET `name` = 'namita g', `salary` = '1201' WHERE `name` = 'namita'

DELETE FROM employee WHERE `name` = 'gobhi'