SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE IF NOT EXISTS `pixsalle`;
USE `pixsalle`;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`
(
    `id`            INT                                                     NOT NULL AUTO_INCREMENT,
    `pfp`           VARCHAR(255),
    `username`      VARCHAR(255),
    `email`         VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    `password`      VARCHAR(255)                                            NOT NULL,
    `phone`         INT,
    `membership`    VARCHAR(255)                                            NOT NULL,
    `money`         FLOAT                                                   NOT NULL,
    `portfolio`     VARCHAR(255),
    `createdAt`     DATETIME                                                NOT NULL,
    `updatedAt`     DATETIME                                                NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `albums`;
CREATE TABLE `albums`
(
    `id`            INT                                                  NOT NULL AUTO_INCREMENT,
    `user`         INT                                                   NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`user`) REFERENCES `users`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `images`;
CREATE TABLE `images`
(
    `id`        INT                                                     NOT NULL AUTO_INCREMENT,
    `path`      VARCHAR(255)                                            NOT NULL,
    `album`     INT                                                     NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`album`) REFERENCES `albums`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;