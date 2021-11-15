<?php

require_once ('autoloader.php');

if (checkRole("leaveComment")) {
    putComment($_POST['author'], $_POST['comment']);
}
else {
    echo "У вас нет доступа для создания комментария";
}

function putComment(string $author, string $comment): void {

    if (!empty($_POST['author']) && !empty($_POST['comment'])) {
 
        $stmt = "INSERT INTO comments (`date`, `author`, `com_text`, `art_name`) VALUES ('".date('Y-m-d H:i:s')."', ?, ?, '".$_POST['art_name']."')";
        $bindParam = [$author,$comment];
        executePreparedStmt ($stmt, $bindParam, false);
        $message = "Ваш комментарий был добавлен";
    }

    else {
        $message = "Введите имя / комментарий";
    }

    echo $message;
}