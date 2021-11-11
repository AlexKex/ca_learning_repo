<?php

function getArtName(int $id): string {

    $connection = setupConnection();

    $userSqlStatement = mysqli_prepare($connection, "SELECT * FROM articles WHERE id = ?");
    mysqli_stmt_bind_param($userSqlStatement, "s", $id);
    mysqli_stmt_execute( $userSqlStatement);
    $result = mysqli_stmt_get_result($userSqlStatement);

    $artName = "";

    if ($result != false) {
        while ($row = mysqli_fetch_assoc($result)) {
            $artName = $row['art_name'];
        }
    }
    return $artName;
}

//Функции для отображения статьи
function getArtText(string $name): void {

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

    echo "<div> $output </div>";
    fclose($file);
}

//Функции для отображения комментариев
function showComments(string $name): void {

    $connection = setupConnection();

    $select = "SELECT * FROM comments";
    $selectResult = mysqli_query($connection, $select);    

    if ($selectResult != false) {
        while ($row = mysqli_fetch_assoc($selectResult)) {
            if ($row['art_name'] == $name){
                $date = "<p id = 'date'>".$row['date']."</p>";
                $author = "<p id = 'author'>".$row['author'].":</p>";
                $text = "<p id = 'comment'>".$row['com_text']."</p>";
                echo $date, $author, $text;
            }            
        }
    }
}

//Функция для отображения формы
function commentForm($artName): void {

    $form = 
    "<form action='com_save.php' method = 'POST'>
    <p><label for='author'>Имя<label><input type='text' id='author' name='author'/></p>
    <p><label for='comment'>Ваш комментарий<label><textarea id='comment' name='comment'></textarea></p>
    <p><input type='submit' value='Отправить'/></p>
    <p><input type='hidden' name='art_name' value=$artName></p>
    </form>";    
    
    echo "<h5>Оставить свой комментарий</h5>" . $form;    
}