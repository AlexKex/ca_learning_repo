<?php

$headersList = getallheaders();

require_once 'autoloader.php';

$message = "";

if (!isset($headersList['Token'])) {

    if (isset($headersList['Login']) && isset($headersList['Password'])) {

        if (validatePasswordWithDatabase($headersList['Login'], $headersList['Password'])) {
            $token = getToken ($headersList['Login'], $headersList['Password']);
            writeToken ($token, $headersList['Login']);
            $message .= "Токен: ". $token;
        }
    
        else {
            $message .= "Неверный логин / пароль";
        }
    }
}


else {

    if (checkValidity($headersList['Login'], $headersList['Token'])) {
        $message .= "Добро пожаловать!";
    }

    else {
        $message .= "Необходимо обновить токен";
    }
}

echo $message;