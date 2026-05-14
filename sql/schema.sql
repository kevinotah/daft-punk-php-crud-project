CREATE DATABASE IF NOT EXISTS php_project
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE php_project;

DROP TABLE IF EXISTS books;
DROP TABLE IF EXISTS users;

CREATE TABLE users (
    id INT(11) NOT NULL AUTO_INCREMENT,
    username VARCHAR(50) COLLATE utf8mb4_unicode_ci NOT NULL,
    password VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    PRIMARY KEY (id),
    UNIQUE KEY username (username)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE books (
    id INT(11) NOT NULL AUTO_INCREMENT,
    user_id INT(11) NOT NULL,
    title VARCHAR(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    author VARCHAR(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    genre VARCHAR(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    published_year INT(11) NOT NULL,
    description TEXT COLLATE utf8mb4_unicode_ci NOT NULL,
    PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
