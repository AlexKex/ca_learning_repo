<!DOCTYPE HTML>
<html lang="ru">
<head>
	<meta charset = "UTF-8">
</head>
<body>
	<h1>Калькулятор</h1>
	<form action='' method='post'>
		<input type="text" name="number1" placeholder="Первое число">
		<select name="operation">
			<option value='plus'>+</option>
			<option value='minus'>-</option>
			<option value="multiply">*</option>
			<option value="divide">/</option>
		</select>
		<input type="text" name="number2" placeholder="Второе число">
		
		<input type="submit" name="submit" value="Получить ответ"> 
	</form>
</body>
</html>

<?php
if(isset($_POST['submit'])){
    // Валидация
	$number1 = empty($_POST['number1']) ? 0: $_POST['number1'];    // проверяем, есть ли переменная, если нет, то будет 0
	$number2 = empty($_POST['number2']) ? 0: $_POST['number2'];
	$operation = $_POST['operation']; // по умолчанию '+'

    // если все поля формы заполнены, проверяем, являются ли числами введенные пользователем значения
	    
	if(!is_numeric($number1) || !is_numeric($number2)){   // если операнды — не являются числами
		$error_result = "Операнды должны быть числами";   // инициализируем переменную с ошибкой
	}
	else //  если ошибок не найдено
    switch($operation){   // проверяем какой оператор был выбран
		case 'plus':      // если выбран оператор сложения, то вычисляем сумму
			$result = $number1 + $number2;
			break;
		case 'minus':    // если выбран оператор вычитания, то вычисляем разность
			$result = $number1 - $number2;
			break;
		case 'multiply':   // если выбран оператор умножения, то вычисляем произведение
			$result = $number1 * $number2;
			break;
		case 'divide':   // если выбран оператор деления
			if( $number2 == '0')   // проверям не является ли второй делитель нулевым
			    $error_result = "На ноль делить нельзя!";
			else
			    $result = $number1 / $number2;   // если второй делитель не ноль, выполняем деление
			break;    
	}
    if(isset($error_result)){
    	echo "Ошибка: $error_result";
    }	
    else {
	    echo "Ответ: $result";
    }
}
?>
