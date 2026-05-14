<?php
/*
 Daft Punk: small tribute comments
 "Human After All" — this file manages PDO connection (no robots harmed)
 Easter eggs sprinkled across the project in text only.
*/

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