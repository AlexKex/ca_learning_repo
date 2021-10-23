<?php

 function setupConnection() : mysqli{ 
    $configuration = parse_ini_file('config.ini', true);

    $link = mysqli_connect(
        $configuration['db']['host'],
        $configuration['db']['user'],
        $configuration['db']['password'],
        $configuration['db']['datebase']
    );
    
    if($link === false){
        die("ERROR: Ошибка подключения. " . mysqli_connect_error());
    }
    else {
        //echo "Успешное соединение с БД <br>";
    }
    return $link;
}

?>