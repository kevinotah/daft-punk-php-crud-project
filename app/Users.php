<?php
/*
 Users manager — greetings may sometimes say "Veridis Quo!", "Short Circuit!", etc.
 This file handles auth logic; UI text lives in the public pages.
*/
session_start();
require_once 'Db.php';

class Users
{
    private PDO $con;

    public function __construct()
    {
        $this->con = Db::getConnection();
    }

    public function register(string $username, string $password): bool
    {
        $sql = 'select * from users where username = :username';
        $stmt = $this->con->prepare($sql);
        $stmt->execute([':username' => $username]);

        if ($stmt->rowCount() > 0) {
            return false;
        }

        $sql = 'insert into users(username, password) values(:username, :password)';
        $stmt = $this->con->prepare($sql);

        return $stmt->execute([
            ':username' => $username,
            ':password' => $password,
        ]);
    }

    public function login(string $username, string $password): bool
    {
        $sql = 'select * from users where username = :username and password = :password';
        $stmt = $this->con->prepare($sql);
        $stmt->execute([':username' => $username, ':password' => $password]);

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $user['id'];
            return true;
        } else {
            return false;
        }
    }

    public function logout()
    {
        session_destroy();
    }
}