<?php
session_start();

if(isset($_SESSION['user'])){
    echo "hello, " . $_SESSION['user'];
}
else{
    echo "Вам нужно авторизоваться";
}
?>