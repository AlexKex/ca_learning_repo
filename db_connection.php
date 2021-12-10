<?php
$configuration = parse_ini_file('config.ini', true);

$connection = mysqli_connect(
    $configuration ['db']['127.0.0.0'],
    $configuration ['db']['user'],
    $configuration ['db']['password'],
    $configuration ['db']['database']
);

if(!$connection){
    echo "Невозможно подключиться к БД";
    die();
}
else{
    echo "Подключение успешно <br>";
}
return

