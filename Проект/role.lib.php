<?php

function showLoginForm(): void {

    //Форма Logout
    if (isset ($_COOKIE['user_role'])) {

        $userLogin = $_COOKIE['user_login'];
        echo 
        "<form action='logout.php' method='post' id = 'logout'> 
    
        <p class = 'login'>$userLogin</p>
        <p class = 'login'><input type='submit' value='Выйти'></p>
    
        </form>";
    }
    
    //Форма Login
    else {
        echo 
        "<form action='login.php' method='post' id = 'login'>
    
        <p class = 'login'><input type='text' name='login' placeholder='Логин'></p>
        <p class = 'login'><input type='password' name='password' placeholder='Пароль'></p>
        <p class = 'login'><label for='rememberme'>Запомнить меня<label><input type='checkbox' id='rememberme' name='rememberme'></p>
        <p class = 'login'><input type='submit' value='Войти'></p>
    
        </form>";
    }
}

function checkRole (string $userFunction): bool {

    if (!isset($_COOKIE['user_role'])) {
        return false;
    }

    else {

        switch ($userFunction) {

            //Возможность оставить комментарий
            case "leaveComment":
                if ($_COOKIE['user_role'] == "admin" || $_COOKIE['user_role'] == "reader") {
                    return true;
                }
            break;
                
            //Возможность создать статью
            case "createArticle":
                if ($_COOKIE['user_role'] == "admin") {
                    return true;
                }            
            break;
        }
        return false;
    }
}