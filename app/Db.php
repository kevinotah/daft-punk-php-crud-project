<?php

class Db
{
    private const HOST = 'localhost';
    private const DB_NAME = 'php_project';
    private const USERNAME = 'root';
    private const PASSWORD = '';
    private static ?PDO $con = null;

    public static function getConnection(): ?PDO
    {
        if (self::$con instanceof PDO) {
            return self::$con;
        }

        try {
            $dsn = 'mysql:host=' . self::HOST . ';dbname=' . self::DB_NAME;
            self::$con = new PDO($dsn, self::USERNAME, self::PASSWORD);
            self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return self::$con;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }

        return null;
    }

    public static function closeConnexion()
    {
        self::$con = null;
    }
}