<?php

/*function getPasswordhash(){
  $link = setupConnection();

$sql = "SELECT * FROM gallery . users";
$result = mysqli_query($link, $sql);
while($row = mysqli_fetch_array($result)){
  $passhash = $row['pass'];
}
return $passhash;
}
*/
function getUserByLogin($login): array{
    $link = setupConnection();

  $userSqlStatement = mysqli_prepare($link, "SELECT * FROM gallery . users WHERE login = ?");
  mysqli_stmt_bind_param($userSqlStatement,"s",$login);
  mysqli_stmt_execute($userSqlStatement);
  $result = mysqli_stmt_get_result($userSqlStatement);

  $user = [];

  if($result != false){
    while($row = mysqli_fetch_assoc($result)){
        $user = $row;
    }
}
return $user;
}
function writeUserHistiry($myfile, $history){
  $myfile = fopen("user_history", "w"); 
  fwrite($myfile, $history);
  fclose($myfile);
}
echo "user подключен";

?>