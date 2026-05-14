<?php
session_start();
require_once '../app/Users.php';

$user = new Users();
$user->logout();
header('location: login.php');
