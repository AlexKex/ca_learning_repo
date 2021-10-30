<?php
if (empty($_GET)) {
    return 'Ничего не передано!'; // Проверка переданы ли переменные
}
if (empty($_GET['operation'])){
    return 'Не передана операция';
}
if (empty($_GET['n1']) || empty($_GET['n2'])){
    return 'Не переданы переменные';
}
if ($_GET['n2'] == 0){
    return 'на 0 делить нельзя!'; // Если ввести 0 то сервер считает это как отсутствие данных а не как цифра 0
}
$n1 = $_GET['n1'];
$n2 = $_GET['n2'];

$expression = $n1 . ' ' . $_GET['operation'] . ' ' . $n2 . ' = ';
switch ($_GET['operation']){
    case '+';
    $result = $n1 + $n2;
        break;
    case '-';
    $result = $n1 - $n2;
        break;
    case '*';
    $result = $n1 * $n2;
        break;
    case '/';
    $result = $n1 / $n2;
        break;
    case ' ';
        return 'Операция не поддерживается';
}
return $expression . $result;

