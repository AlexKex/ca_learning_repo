<?php

function getArtName(int $id): string {

    $stmt = "SELECT * FROM articles WHERE id = ?";
    $result = executePreparedStmt($stmt, $id, true);

    $artName = "";

    if ($result != false) {
        while ($row = mysqli_fetch_assoc($result)) {
            $artName = $row['art_name'];
        }
    }

    else{
        $artName = "ошибка получение имени";
    }
    return $artName;
}

//Функции для отображения статьи
function getArtText(string $name): string {

    $filePath = "texts/" . $name . ".txt";
    $file = fopen($filePath, "r");
    $output = "";

    if (!$file) {
        $output = "Ошибка открытия статьи";
    }

    else {
        while (!feof($file)) {
            $output .= fread($file, filesize($filePath));
        }
    }

    return $output;
    fclose($file);
}

//Функции для отображения комментариев
function showComments(string $name): array {

    $connection = setupConnection();

    $select = "SELECT * FROM comments";
    $selectResult = mysqli_query($connection, $select); 
    $comments = [];   

    if ($selectResult != false) {
        while ($row = mysqli_fetch_assoc($selectResult)) {
            if ($row['art_name'] == $name){
                $date = $row['date'];
                $author = $row['author'];
                $text = $row['com_text'];
                $comments = ['date' => $date, 'author' => $author, 'text' => $text];
            }            
        }
    }
    return $comments;
}