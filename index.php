<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		<?php $title = 'Document';
		echo $title;
		?>
	</title>
</head>
<body>
	
<?php

$tit = 'Document';
$h1 = 'Заголовок';
$a = 42;
$b = '042'; 
	var_dump($a == $b); // сравниваются только значения переменных 
	var_dump((int)'056789'); // только целое число, поэтому 0 отлетает 
	var_dump((float)42.0 === (int)42.0); // различаются типы переменных 
	var_dump((int)0 === (int)'otus'); // строка не содержащая число, при переводе в целое число дает 0

$a = -5;
$b = -10;

$a = $a + $b;
$b = $a - $b;
$a = $a - $b;

 echo '<br>' . 'Переменная а = ' . $a . ' Переменная b = ' . $b .'<br>';
 // echo 'Переменная b = ' . $b;

 ?>

<nav>
  <ul>
    <li><a href="">Главная</a>
      <ul>
        <li><a href="">меню второго уровня</a></li>
        <li><a href="">меню второго уровня</a>
          <ul>
            <li><a href="">меню третьего уровня</a></li>
            <li><a href="">меню третьего уровня</a></li>
            <li><a href="">меню третьего уровня</a></li>
          </ul>
        </li>
        <li><a href="">меню второго уровня</a></li>
      </ul>
    </li>
    <li><a href="">Компания</a></li>
    <li><a href="">Контакты</a></li>
  </ul>
</nav>

<h1><?php echo $h1 ?></h1>

<footer> <!-- вывести текущий год в подвале при помощи встроенной функции date() -->
	<p>
		<?php echo date('Y'); ?> 
    </p>
</footer>
</body>
</html>

<!-- Home work 3 --> 

<?php
// 1 Задание 
$a = 0;
$b = -17;

if($a < 0 && $b < 0) { //Выводить разность заданных чисел, если $a и $b отрицательные
	$c = $a - $b;
//	echo $c;
	}
elseif ($a > 0 && $b > 0) { //Выводить произведение заданных чисел, если $а и $b положительные
	$c = $a + $b;
	//echo $c ;
}
elseif ($a < 0 || $a > 0 && $b > 0 || $b < 0) { //Выводить сумму заданных чисел, если $а и $b разных знаков
	$c = $a + $b;
	//echo $c;
}
elseif ($a == 0 || $b == 0) {  // Если одна из переменных -нуль, то выводить 0
	$c = 0;
	//echo "0";
}
echo $c;






// 2 Задание 
$a = 47;

   if ($a <= 0 || $a > 42)
	echo '<br>' . "Введено неверное значение переменной 'a'";
	

// Так как нам еще не известны циклы, то выход вижу только такой: 

    switch ($a)
    {
        case 0:
            echo '<br>' . ($a++ );
        case 1:
            echo '<br>' . ($a++ );
        case 2:
            echo '<br>' . ($a++ );
        case 3:
            echo '<br>' . ($a++ );
        case 4:
            echo '<br>' . ($a++ );
        case 5:
            echo '<br>' . ($a++ );
        case 6:
            echo '<br>' . ($a++ );
        case 7:
            echo '<br>' . ($a++ );
        case 8:
            echo '<br>' . ($a++ );
        case 9:
            echo '<br>' . ($a++ );
        case 10:
            echo '<br>' . ($a++ );
        case 11:
            echo '<br>' . ($a++ );
        case 12:
            echo '<br>' . ($a++ );
        case 13:
            echo '<br>' . ($a++ );
        case 14:
            echo '<br>' . ($a++ );
        case 15:
            echo '<br>' . ($a++ );
        case 16:
            echo '<br>' . ($a++ );
        case 17:
            echo '<br>' . ($a++ );
        case 18:
            echo '<br>' . ($a++ );
        case 19:
            echo '<br>' . ($a++ );
        case 20:
            echo '<br>' . ($a++ );
        case 21:
            echo '<br>' . ($a++ );
        case 22:
            echo '<br>' . ($a++ );
        case 23:
            echo '<br>' . ($a++ );
        case 24:
            echo '<br>' . ($a++ );
        case 25:
            echo '<br>' . ($a++ );
        case 26:
            echo '<br>' . ($a++ );
        case 27:
            echo '<br>' . ($a++ );
        case 28:
            echo '<br>' . ($a++ );
        case 29:
            echo '<br>' . ($a++ );
        case 30:
            echo '<br>' . ($a++ );
        case 31:
            echo '<br>' . ($a++ );
        case 32:
            echo '<br>' . ($a++ );
        case 33:
            echo '<br>' . ($a++ );
        case 34:
            echo '<br>' . ($a++ );
        case 35:
            echo '<br>' . ($a++ );
        case 36:
            echo '<br>' . ($a++ );
        case 37:
            echo '<br>' . ($a++ );
        case 38:
            echo '<br>' . ($a++ );
        case 39:
            echo '<br>' . ($a++ );
        case 40:
            echo '<br>' . ($a++ );
        case 41:
            echo '<br>' . ($a++ );
        case 42:
            echo ($a);
        break;
    }


// Задание 3 

$a = 15; 
if ($a == 0) 
	echo '<br>' ."Переменная равна 0";
 if ($a != 0 && $a % 3 == 0)
	echo '<br>' ."Fizz";
 if ($a != 0 && $a % 5 == 0)
	echo '<br>' ."Buzz";
 if ($a != 0 && $a % 3 == 0 && $a % 5 == 0)
	echo '<br>' ."FizzBuzz". '<br>';


// Домашняя работа 4 



function sumNumers(int $a, int $b) : int { 
	$result_0 = $a + $b;
	return $result_0;
}
function subNumers($a, $b) {
	$result_1 = $a - $b;
	return $result_1;
}
function multNumers($a, $b) {
	$result_2 = $a * $b;
	return $result_2;
}

function divNumers(int $a, int $b) : int { // с int возвращает целое число без остатка 
	$result_3 = $a / $b;
	return $result_3;
}


$result_0 = sumNumers(5, 6);
$result_1 = subNumers(3, 6);
$result_2 = multNumers(2, 5);
$result_3 = divNumers(7, -3);

echo $result_0 . '<br>';
echo $result_1 . '<br>';
echo $result_2 . '<br>';
echo $result_3 . '<br>';


// Задание 3 

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



// Задание 4
// Написать функцию, которая получает текущее время в формате Unix-timestamp и возвращает строку в формате с правильными склонениями, например: 12 часов 21 минута 1 час 42 минуты


