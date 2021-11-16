<?php
    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
 if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $login = stripslashes($login); //  Удаляем экранирующие символы
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    //удаляем лишние пробелы
    $login = trim($login);
    $password = trim($password);
    // подключаемся к базе
    include "./templates/mysqlConnect.php";
   
    $sql = "SELECT id FROM users WHERE login='$login'";   // SQL запрос
    $res = $mysqli -> query($sql); // Отправляем SQL запрос

    $myrow = mysqli_fetch_array($res);
    if (!empty($myrow['id'])) {
      exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
      }

    // если такого нет, то сохраняем данные
    $result2 = "INSERT INTO users (login,password) VALUES('$login','$password')"; // SQL запрос
    $res = $mysqli -> query($result2); // Отправляем SQL запрос
    
    // Проверяем, есть ли ошибки
    if(mysqli_query($mysqli, $result2)){
    echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='index.php'>Главная страница</a>";
    }
 else {
    echo "Ошибка! Вы не зарегистрированы.";
    }
    ?>