<?php
session_start();

$_SESSION['history'] = [];
$_SESSION['history'] =  $_SERVER['HTTP_REFERER'];
$history = $_SESSION['history'];

require_once 'libraries/autoloader.php';
$login = $_POST['login'];
getPasswordhash();
if(isset($_POST['login']) && isset($_POST['password'])){
  if(validatePasswordWithDatabase($_POST['login'], $_POST['password'])){
    echo "Добро пожаловать!<br>";
    getUsertime();
    if(isset($_POST['rememberme'])){
      rememberUser($passhash, $login); 
    }
    else{
      echo "Неверные логин/пароль <br>";
    } 
  }
}

writeUserHistiry($myfile, $history);

  /*if($result != false){
      while($row = mysqli_fetch_assoc($result)){
          if(password_verify($_POST['password'], $row['pass'])){
              echo "Добро пожаловать!2";

              if(isset($_POST['rememberme'])){
                rememberUser($passhash, $login); 

              }
          }
          else{
            echo "Неверные логин/пароль 2";
          } 
        }
   }
   else{
    echo "Неверные логин/пароль 3";
  }*/

// удалить все переменные сессии
session_unset();

// уничтожить сессию
session_destroy();

?>