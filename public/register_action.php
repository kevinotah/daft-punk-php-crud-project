<?php
require_once '../app/Users.php';

$username = $_POST['username'];
$password = $_POST['password'];

$user = new Users();
if ($user->register($username, $password)) {
    header('location: login.php?reg=1');
} else {
    header('location: register.php?err=1');
}