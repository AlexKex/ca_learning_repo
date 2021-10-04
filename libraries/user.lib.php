<?php
echo "user <br>";
function getUserByLogin($login){
    $link = setupConnection();

  $userSqlStatement = mysqli_prepare($link, "SELECT * FROM users WHERE login = ?");
  mysqli_stmt_bind_param($userSqlStatement,"s", $login);
  mysqli_stmt_execute($userSqlStatement);
  $result = mysqli_stmt_get_result($userSqlStatement);

  $user = [];

  if(result != false){
    while($row = mysqli_fetch_assoc($result)){
        $user = $row;
    }
}

return $user;
}
?>