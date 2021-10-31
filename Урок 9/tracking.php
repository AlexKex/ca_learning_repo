<?php

    session_start();

    if (isset($_COOKIE['PHPSESSID'])) {

        $_SESSION['prevURI'] = $_SERVER['HTTP_REFERER'];
        $fileName = "user_" . $_COOKIE['PHPSESSID'];
        $file = fopen($fileName . ".txt", "a+");
        $writeData = $_SESSION['prevURI'] . "\r\n";
        fwrite($file, $writeData);
        fclose($file);
    }