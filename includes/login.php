<?php

include_once 'default.php';
include_once 'User.php';
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = new User();
    $userInfo = $user->auth($username, $password);
    if (!$userInfo) {
        header("location: " . DIR . "index.php");
    }

    $_SESSION['login_status'] = 1;
    $_SESSION['user_id'] = $userInfo['user_id'];
    $_SESSION['username'] = $userInfo['user_name'];
    $_SESSION['firstname'] = $userInfo['user_firstname'];
    $_SESSION['lastname'] = $userInfo['user_lastname'];
    $_SESSION['role'] = $userInfo['user_role'];
    header("location: " . DIR . "admin/index.php");
}
