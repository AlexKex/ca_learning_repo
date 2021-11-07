<?php

function getPasswordhash(){
    $link = setupConnection();
  
  $sql = "SELECT * FROM gallery . users";
  $result = mysqli_query($link, $sql);
  while($row = mysqli_fetch_array($result)){
    $passhash = $row['pass'];
  }
  return $passhash;
  }

function validatePasswordWithDatabase(string $login, string $password, bool $remember = false) {
    $user = getUserByLogin($login);
    
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

function rememberUser($passhash, $login) {
    $token = $passhash . md5($login);
    setcookie("user_token", $token, time()+7*24*3600);
    setcookie("user_login", $login, time()+7*24*3600);
    echo $passhash;
}

function getUsertime(){ 
    $date = date("U");
    $user_time = ($date - $_SESSION['session_time']);
  echo "Вы провели на сайте " . $user_time . " секунд <br>"; 
}

// Функция проверки авторизации пользователя по cookie
function checkCookie(): bool{ 
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
}
echo "auth подключен";
?>