<?php
$n1 = $_GET['n1'];
$n2 = $_GET['n2'];

if ((!$n1 && $n1 !='0') || (!$n2 && $n2 != '0')) {
    return 'Не переданы переменные.'; // Проверка заполнены ли поля.
}
if(!is_numeric($n1) || !is_numeric($n2)){
    return 'Данные должны быть числами.'; // Выдавать ошибку если пользователь вводит букв вместо цифр.
}
    else {
        $expression = $n1 . ' ' . $_GET['operation'] . ' ' . $n2 . ' = '; // функция вывода получаемое выражение
        switch ($_GET['operation']) {
            case '+';
                $result = $n1 + $n2;
                break;
            case '-';
                $result = $n1 - $n2;
                break;
            case '*';
                $result = $n1 * $n2;
                break;
            case '/':
                if($n2 == '0'){
                    $result = 'На 0 делить нельзя!'; // условие когда происходит деление на 0
                }
                else{
                    $result = $n1 / $n2;
                }
                break;
        }
        return $expression . $result;
    }

