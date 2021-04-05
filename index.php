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

$a = 5;
$b = 10;

$a = $a + $b;
$b = $a - $b;
$a = $a - $b;

 echo '<br>' . 'Переменная а = ' . $a. '<br>';
 echo 'Переменная b = ' . $b;

 ?>

<h1><?php echo $h1 ?></h1>
</body>
</html>