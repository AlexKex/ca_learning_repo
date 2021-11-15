<?php

function executePreparedStmt (string $prepared_stmt, mixed $bindParam, bool $getResult) {

    $connection = setupConnection();

    $userSqlStatement = mysqli_prepare($connection, $prepared_stmt);
    $countBind = str_repeat("s", substr_count($prepared_stmt, "?"));

    if (gettype($bindParam) == "array") {
        mysqli_stmt_bind_param($userSqlStatement, $countBind, ... $bindParam);
    }
    else {
        mysqli_stmt_bind_param($userSqlStatement, $countBind, $bindParam);    
    }
    
    mysqli_stmt_execute( $userSqlStatement);

    if ($getResult == true) {
        return $result = mysqli_stmt_get_result($userSqlStatement);
    }
    
}