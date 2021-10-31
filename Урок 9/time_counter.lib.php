<?php

function showTime(): string {
    
    setcookie("auth_time", time(), time()+7*24*3600);   
    $spendTime = (int) ((time() - $_COOKIE['auth_time']) / 60);
  
    $message = "Вы провели на сайте " . rightMinutes($spendTime);

    return $message;
}

function rightMinutes($minutes): string {

    if ($minutes == 1 ||  $minutes > 20 && $minutes % 10 ==1) {
        $result = "$minutes минуту <br>" ;
    }

    else if ($minutes >=2 && $minutes <= 4 || $minutes > 20 && ($minutes % 10 >= 2 && $minutes % 10 <= 4 )) {
        $result = "$minutes минуты <br>";
    }

    else {
        $result = "$minutes минут <br>";
    }

    return $result;
}