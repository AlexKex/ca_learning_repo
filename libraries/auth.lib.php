<?php
echo "auth.lib <br>";
function validatePasswordWithDatabase($login, $password, $remember = false) {
    $user = getUserByLogin();
    
  if(!empty($user)){
        if(password_verify($password, $user['pass'])){

            if($remember){

                rememberUser($user['pass'], $login);
            }
              return true;
            }
            else{
                return false;
            } 
        }
    } 

function rememberUser($passhash, $login){
    $token = $passhash . md5($login);
    setcookie("user_token", $token, time()+7*24*3600);
    setcookie("user_login", $login, time()+7*24*3600);
}

// Функция проверки фвторизации пользователя по cookie
function checkCookie(){ 
    if(isset($_COOKIE['user_token']) && isset($_COOKIE['user_login'])) {
        $token = $_COOKIE['user_token'];
        $login = $_COOKIE['user_login'];
    
        $user = getUserByLogin($login);
    
        if(!empty($user)){
            $checker = $user['pass'].md5($login);
            if($checker == $token){
                return true;
            }
        }
    }

    return false;
}
?>