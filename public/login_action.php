<?php
require_once '../app/Users.php';

$username = $_POST['username'];
$password = $_POST['password'];

$user = new Users();
if ($user->login($username, $password)) {
    header('location: dashboard.php');
} else {
    header('location: login.php?err=1');
}