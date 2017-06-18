<?php
include_once 'Database.php';

$string = "hello world's how \"\" are you doing \ etfd";

$database = new Database();
echo $database->run_mysql_real_escape_string($string)."<br>";


var_dump($string);