<?php

include_once 'default.php';
include_once 'Autologin.php';
include_once 'User.php';
session_start();



if (isset($_COOKIE['autologin'])) {
    $autologin = new Autologin();
    $userID = $autologin->checkToken();
    if ($userID) {
        $user = new User();
        $userInfo = $user->fetchById($userID);
        $_SESSION['login_status'] = 1;
        $_SESSION['user_id'] = $userInfo['user_id'];
        $_SESSION['username'] = $userInfo['user_name'];
        $_SESSION['firstname'] = $userInfo['user_firstname'];
        $_SESSION['lastname'] = $userInfo['user_lastname'];
        $_SESSION['role'] = $userInfo['user_role'];
        header("location: " . DIR . "admin/index.php");
    }else{
        header("location: " . DIR . "admin/index.php");
    }
}else{
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if(isset($_POST['remeberMe'])){
            $remeberMe = 1;
        }else{
            $remeberMe = 0;
        }
        $user = new User();
        $userInfo = $user->auth($username, $password,$remeberMe);
        if (!$userInfo) {
            $_SESSION['login_failed'] = 1;
            header("location: " . DIR . "index.php");
        } else {
            $_SESSION['login_status'] = 1;
            $_SESSION['user_id'] = $userInfo['user_id'];
            $_SESSION['username'] = $userInfo['user_name'];
            $_SESSION['firstname'] = $userInfo['user_firstname'];
            $_SESSION['lastname'] = $userInfo['user_lastname'];
            $_SESSION['role'] = $userInfo['user_role'];
            header("location: " . DIR . "admin/index.php");
        }
    }
}
