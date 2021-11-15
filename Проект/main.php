<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>



<?php require_once('autoloader.php'); ?>

<?php if (isset ($_COOKIE['user_role'])): ?>
    <form action='logout.php' method='post' id = 'logout'>   
    <p class = 'login'><?php echo $_COOKIE['user_login'] ?></p>
    <p class = 'login'><input type='submit' value='Выйти'></p>
    </form>

<?php else: ?>
    <form action='login.php' method='post' id = 'login'>    
    <p class = 'login'><input type='text' name='login' placeholder='Логин'></p>
    <p class = 'login'><input type='password' name='password' placeholder='Пароль'></p>
    <p class = 'login'><label for='rememberme'>Запомнить меня<label><input type='checkbox' id='rememberme' name='rememberme'></p>
    <p class = 'login'><input type='submit' value='Войти'></p>
    </form>
<?php endif; ?>


<div>
    <p>Список статей</p>
    <ol>
        <?php showArticles(); ?>
    </ol>
</div>

<?php if (checkRole("createArticle")): ?>
<a href='create_art.php' id ='createArt'>Создать статью</a>
<?php endif; ?>

</body>
</html>