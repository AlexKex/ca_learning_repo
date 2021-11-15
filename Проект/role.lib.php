<?php

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