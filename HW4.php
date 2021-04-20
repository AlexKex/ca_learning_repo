<?php
// 1. Реализовать функции для базовых арифметических операций: функции принимают два integer параметра и возвращают результат
function sumNumers($a, $b) {
	$result = $a + $b;
	echo $result . '<br>';
}
function subNumers($a, $b) {
	$result = $a - $b;
	echo $result . '<br>';
}
function multNumers($a, $b) {
	$result = $a * $b;
	echo $result . '<br>';
}

function divNumers($a, $b) {
	$result = $a / $b;
	echo $result . '<br>';
}

sumNumers(5, 6);
subNumers(3, 6);
multNumers(2, 5);
divNumers(7, -3);
  

// 3. С помощью рекурсивной функции реализовать возведение числа в степень.
function expo($num, $degree) {

	if ($degree == 0){
		return 1;
	}
	
	if ($degree == 1){
		return $num;
	}
	
	else {
	    return expo($num, $degree - 1) * $num;
	}
	
}
$result = expo(2, 4);

echo $result . '<br>';


//4. *Написать функцию, которая получает текущее время в формате Unix-timestamp и возвращает строку в формате с правильными склонениями

function hour(int $hour) : string {
    $root = 'час';
    $ending = '';

	if ($hour == 1 || $hour == 21){
        $ending = '';
	}
    if($hour == 0 || ($hour >=5 && $hour <= 20)){
    	$ending = 'ов';
    }
    else {
        $ending = 'а';
    }
    return $root . $ending;
}

function minutes(int $minutes) : string {
    $root = 'минут';
    $ending = '';

    if ($minutes == 1 && $minutes == 21 && $minutes == 31 && $minutes == 41 && $minutes == 51){
        $ending = 'а';
	}
	if (($minutes >= 2 && $minutes <= 4) || ($minutes >= 22 && $minutes <= 24) || ($minutes >= 32 && $minutes <= 34) || ($minutes >= 42 && $minutes <= 44) || ($minutes >= 52 && $minutes <= 54)){
        $ending = 'ы';
	}
    else {
        $ending = '';
    }
    return $root . $ending;
}
 
$hour = date('H');
$minutes = date('i');
$resultHour = hour($hour);
$resultMinutes = minutes($minutes);
echo $hour . ' '. $resultHour . ' ' . $minutes . ' '. $resultMinutes;


// 5.	Написать код, который будет генерировать случайное число от 1 до 3. В зависимости от сгенерированного числа будет вызываться одна из трёх созданных Вами функций
$rand = rand(1, 3);

if ($rand == 1) {
	sumNumers(5, 6);
}

elseif ($rand == 2) {
	subNumers(3, 6);
}
elseif ($rand == 3) {
	multNumers(2, 5);
}
