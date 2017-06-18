<?php

include_once 'User.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = new User();
    if (!$user->auth($username, $password)) {
        header("location: ".DIR."index.php");
    }
}