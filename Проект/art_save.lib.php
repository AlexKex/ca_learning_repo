<?php

function saveNewArt(string $name, string $text): void {

if (!empty($_POST['art_name']) && !empty($_POST['art_text'])) {
    
    if (saveDB($_POST['art_name']) && saveFile($_POST['art_name'], $_POST['art_text'])) {
        $message = "Статья успешно добавлена";
    }

    else {
        $message = "Ошибка добавления статьи";
    }
}

else {
    $message = "Введите название / текст статьи";
}

echo $message;
}

function saveDB(string $name): bool {

$connection = setupConnection();

$userSqlStatement = mysqli_prepare($connection, "INSERT INTO articles (`art_name`) VALUES (?)");
mysqli_stmt_bind_param($userSqlStatement, "s", $name);
return mysqli_stmt_execute( $userSqlStatement);
}

function saveFile(string $name, string $text): bool {

$file = fopen("texts/" . $name.".txt", "a+");

if ($file) {        
    fwrite ($file, $text);
    fclose($file);
    return true;
}
return false;
}