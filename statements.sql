CREATE DATABASE brokenauth;

USE brokenauth;

CREATE TABLE user(
	id INT NOT NULL auto_increment,
    email VARCHAR(250) NOT NULL,
    password VARCHAR(250) NOT NULL,
    
    PRIMARY KEY(id)
);