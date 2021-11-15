<?php

require_once 'autoloader.php';

$message = "";

if (isset($_POST['login']) && isset($_POST['password'])) {

    if (validatePasswordWithDatabase($_POST['login'], $_POST['password'])) {
        setRole($_POST['login']);
        setLogin($_POST['login']);
        header('Location: /blog/main.php');
        
        if(isset($_POST['rememberme'])){
            rememberUser($_POST['password'], $_POST['login']);
        }
    }

    else {
        $message .= "Неверный логин / пароль";
    }
}

echo $message;