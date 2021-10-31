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
        else {
            return false;
        }
    }

    else {
        return false;
    }
}

function rememberUser(string $passhash, string $login) {

    $token = $passhash . md5($login);
    setcookie("user_token", $token, time()+7*24*3600);
    setcookie("user_login", $login, time()+7*24*3600);
}

function checkCookie(): bool {

    if (isset($_COOKIE['user_token']) && isset($_COOKIE['user_login'])) {

        $token = $_COOKIE['user_token'];
        $login = $_COOKIE['user_login'];

        $user = getUserByLogin($login);

        if (!empty($user)) {

            $checker = $user['pass'] . md5($login);
            if ($checker == $token) {
                return true;
            }
        }
    }
    return false;
}