<?php

function validatePasswordWithDatabase(string $login, string $password, bool $remember = false): bool {
    
    $connection = setupConnection();

    $user = getUserByLogin($login);

    if (!empty($user)) {

        if (password_verify($password, $user['password'])) {

            if ($remember) {
                rememberUser($user['password'], $login);
            }
            return true;
        }  
    }
    return false;
}

function rememberUser(string $passhash, string $login): void {

    $token = $passhash . md5($login);
    setcookie("user_token", $token, time()+7*24*3600);
    setcookie("user_login", $login, time()+7*24*3600);
}

function setRole(string $login): void {

    $user = getUserByLogin($login);
    setcookie("user_role", $user['role'], time()+7*24*3600);    
}

function setLogin(string $login): void {

    $user = getUserByLogin($login);
    setcookie("user_login", $login, time()+7*24*3600);    
}