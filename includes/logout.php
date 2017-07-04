<?php
include_once 'default.php';
session_start();
session_unset();
session_destroy();
if(isset($_COOKIE['autologin'])){
    include_once 'Autologin.php';
    Autologin::deleteToken();
}
header("location: ".DIR);
