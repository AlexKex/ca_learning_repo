<?php
session_start();

$_SESSION['history'] = [];
$_SESSION['history'] =  $_SERVER['HTTP_REFERER'];
$history = $_SESSION['history'];
$login = $_POST['login'];
$content = "";

require_once 'libraries/autoloader.php';


getPasswordhash();
if(isset($_POST['login']) && isset($_POST['password'])){
  if(validatePasswordWithDatabase($_POST['login'], $_POST['password'])){
    $content .= "Добро пожаловать!<br>";
    
    if(isset($_POST['rememberme'])){
      rememberUser($passhash, $login); 
    }
    
    } else{
      $content .= "Неверные логин/пароль <br>";
  }
}
getUsertime();
writeUserHistiry($myfile, $history);
echo $content

?>