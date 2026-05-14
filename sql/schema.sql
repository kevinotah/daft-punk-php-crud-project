-- Daft Punk themed schema: tracks table for Daft Punk library
-- Easter eggs are textual and harmless. Human After All.

CREATE DATABASE IF NOT EXISTS php_project
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE php_project;

DROP TABLE IF EXISTS tracks;
DROP TABLE IF EXISTS users;

CREATE TABLE users (
    id INT(11) NOT NULL AUTO_INCREMENT,
    username VARCHAR(50) COLLATE utf8mb4_unicode_ci NOT NULL,
    password VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    PRIMARY KEY (id),
    UNIQUE KEY username (username)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE tracks (
    id INT(11) NOT NULL AUTO_INCREMENT,
    user_id INT(11) NOT NULL,
    title VARCHAR(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    artist VARCHAR(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    album VARCHAR(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    release_year INT(11) NOT NULL,
    notes TEXT COLLATE utf8mb4_unicode_ci NOT NULL,
    PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
