<?php
$configuration = parse_ini_file('config.ini', true);

$connection = mysqli_connect(
    $configuration ['db']['host'],
    $configuration ['db']['user'],
    $configuration ['db']['password'],
    $configuration ['db']['database']
);

if(!$connection){
    echo "Невозможно подключиться к БД";
    die();
}

