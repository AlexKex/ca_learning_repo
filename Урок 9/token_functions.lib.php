<?php

function getToken (string $login, string $password): string {

    $token = password_hash($password, PASSWORD_BCRYPT) . md5($login);
    return $token;
}

function writeToken (string $token, string $login): void {
    $connection = setupConnection();

    $tokenTime = time() + 7*24*3600;
        
    $updateQuery = "UPDATE api_token SET `token` = '".$token."', `token_time` = '".$tokenTime."' WHERE `login` = '".$login."'";
    mysqli_query($connection, $updateQuery);
}


function checkValidity(string $login, string $token): bool {
    $connection = setupConnection();

    $userSqlStatement = mysqli_prepare($connection, "SELECT * FROM api_token WHERE login = ?");
    mysqli_stmt_bind_param($userSqlStatement, "s", $login);
    mysqli_stmt_execute( $userSqlStatement);
    $result = mysqli_stmt_get_result($userSqlStatement);

    if ($result != false) {

        while ($row = mysqli_fetch_assoc($result)){

            if (time() < $row['token_time']) {
                return true;
            }

            else {
                return false;
            }
        }
    }
    return false;    
}