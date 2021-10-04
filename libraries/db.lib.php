<?php
echo "db.lib <br>";
function setupConnection() { 
    $configuration = parse_ini_file('config.ini', true);

    $link = mysqli_connect(
        $configuration['db']['host'],
        $configuration['db']['user'],
        $configuration['db']['password'],
        $configuration['db']['datebase']
    );
    
    if(!$link){
        echo "Невозможно подключиться к БД";
        die();
    } else {
        echo "Успешное соединение <br>";
    }
    return $link;
}

?>