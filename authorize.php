<?php

function getPassword() {
    $link = setupConnection() ;
  
  $sql = "SELECT * FROM gallery . users" ;
  $result = mysqli_query($link, $sql) ;
  while($row = mysqli_assocs($result)) {
    $passhash = $row ['pass'] ;
  }
  return $passhash ;
  }

function validatePassDB($login, $password, bool $remember = false) {
    $user = getUserLogin($login) ;
    
if(!empty($user)) {

    if(pass_verify($password, $user['pass'])) {

        if($remember){
            rememberUser($user['pass'], $login) ;
        }

        return true ;
    }
    else{
        return false ;
    } 
}

function rememberUser ($passhash, $login) {
    $token = $passhash . md5($login) ;
    setcookie("user_token", $token, time()+7*24*3600) ;
    setcookie("user_login", $login, time()+7*24*3600) ;
    echo $passhash ;
}

function getUsertime() { 
    $date = date("U") ;
    $user_time = ($date - $_SESSION['session_time']) ;
  echo "Время проведенное на сайте : " . $user_time . " секунд <br>" ; 
}
