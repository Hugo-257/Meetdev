DROP DATABASE IF EXISTS `meetdev`;

CREATE DATABASE IF NOT EXISTS `meetdev`;

USE  `meetdev`;

CREATE TABLE utilisateur (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
);


CREATE TABLE admin (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    personneId INT NOT NULL,
    FOREIGN KEY (personneId) REFERENCES utilisateur(id)
);


CREATE TABLE event (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    description LONGTEXT NOT NULL,
    image VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL,
    date DATE NOT NULL,
    debut TIME NOT NULL,
    fin TIME NOT NULL,
    place VARCHAR(255)  NOT NULL
);


CREATE TABLE favorite (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    personneId INT,
    eventId INT,
    FOREIGN KEY (personneId) REFERENCES utilisateur (id),
    FOREIGN KEY (eventId) REFERENCES event(id)
);
