<?php

function validatePasswordWithDatabase(string $login, string $password): bool {
    
    $connection = setupConnection();

    $userSqlStatement = mysqli_prepare($connection, "SELECT * FROM api_token WHERE login = ?");
    mysqli_stmt_bind_param($userSqlStatement, "s", $login);
    mysqli_stmt_execute( $userSqlStatement);
    $result = mysqli_stmt_get_result($userSqlStatement);

    if ($result != false) {

        while ($row = mysqli_fetch_assoc($result)) {

            if (password_verify($password,$row['password'])) {
                return true;
            }

            else {
                return false;
            }
        }
    }

    else {
        return false;
    }
}