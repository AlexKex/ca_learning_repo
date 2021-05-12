<?php

// Домашнее задание №6
/*1. Написать функцию сбора логов. В любом месте можно передать в неё
переменную, и она будет зафиксирована в файле в виде
### Дата и время
Значение переменной
Учтите, что файл может не существовать. Также файл не должен
становиться непомерно большим. */


function logger($message)
{
    $log_dirname = 'logs';
    if (!file_exists($log_dirname)) { // file_exists — Проверяет наличие указанного файла
        mkdir($log_dirname, 0777, true); // mkdir - Создаёт директорию
    }
    $log_file_data = $log_dirname . '/log_' . date('d-M-Y') . '.log';
    file_put_contents($log_file_data, $message . "\n" , FILE_APPEND); // file_put_contents — Пишет строку в файл, Если filename не существует, файл будет создан. Иначе, существующий файл будет перезаписан, за исключением случая, если указан флаг FILE_APPEND. 
}
echo  'Запись логов успешно выполнена' . ' ' . date('H:i') . "\n";

logger($message = date('d-M-Y H:i') . ' ' . "Текстовая информация\n"); // Передаем string
logger($message = date('d-M-Y H:i') . ' ' . 1 . "\n"); // Передаем int 
logger($message = date('d-M-Y H:i') . ' ' . 2.5 . "\n"); // Передаем float



/* 2. Сохраните в CSV-формате список пользователей. Реализуйте
функционал простого строгого поиска по переданному параметру.
Например, для параметра “Otus” система должна будет вернуть (при
наличии) строку типа
1; Otus; Системный пользователь */

$list  = array(
	array(
		'#',
		'school',
		'about',
	),
	array(
		'1',
		'Otus',
		'System User',
	),
	array(
		'2',
		'Skillbox',
		'System User',
    ),
    array(
		'3',
		'GB',
		'System User',
	)
);
echo 12322;

$buffer = fopen( 'LIST_OF_USERS.csv', 'w'); 
foreach($list  as $value) { 
	fputcsv($buffer, $value); 
} 
fclose($buffer); 
exit();
?> 

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search</title>
</head>
<body>
    <form action="HW6.php" method="post">

        <p>Поиск: <input name="name" type="text"></p>
                
        <p><input type='submit' value='Отправить'></p>
        
        </form>
        
</body>
</html>

<?php
/* 3. * Напишите функцию конфигурирования, которая позволяет подключать
к приложению множественные ini-файлы с учётом вложенных директорий.*/



