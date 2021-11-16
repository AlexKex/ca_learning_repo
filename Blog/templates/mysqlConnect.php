<?php
$servername = "127.0.0.1";
$username = "root";
$password1 = "root";
$BDname = "bd_blog";

$mysqli = new mysqli($servername, $username, $password1, $BDname);

if ($mysqli -> connect_error) {
    printf("Соединение не удалось: %s\n", $mysqli -> connect_error);
    exit();
};