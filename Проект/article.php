<?php
    require_once ('autoloader.php');
    
    $artName = getArtName($_GET['article']);

    echo "<h3>$artName</h3>";
    //Отображение текста статьи
    getArtText($artName);

    echo "<h5>Комментарии</h5>";
    //Отображение комментариев
    showComments($artName);

    //Отображение формы создания нового комментария
    if (checkRole("leaveComment")){
        commentForm($artName);
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?php echo $artName; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

</body>
</html>