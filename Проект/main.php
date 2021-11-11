<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
require_once('autoloader.php');
//Отображение поля Login/Logout
showLoginForm();
?>


<div>
    <p>Список статей</p>
    <ol>
        <?php
            //Отображение списка статей
            showArticles();
        ?>
    </ol>
</div>

<?php 
//Отображение перехода на создание статей
if (checkRole("createArticle")) {
    echo "<a href='create_art.php' id ='createArt'>Создать статью</a>";
}
?>

</body>
</html>