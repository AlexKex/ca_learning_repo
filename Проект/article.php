<?php
    require_once ('autoloader.php');    
    $artName = getArtName($_GET['article']);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?php echo $artName; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h3><?php echo $artName; ?></h3>
<div><?php echo getArtText($artName); ?></div>

<h5>Комментарии</h5>
<?php foreach(showComments($artName) as $key => $data): ?>    
    <p id= <?php echo $key; ?>><?php echo $data; ?></p>
<?php endforeach; ?>



<?php if (checkRole("leaveComment")): ?>
    <h5>Оставить свой комментарий</h5>
    <form action='com_save.php' method = 'POST'>
    <p><label for='author'>Имя<label><input type='text' id='author' name='author'/></p>
    <p><label for='comment'>Ваш комментарий<label><textarea id='comment' name='comment'></textarea></p>
    <p><input type='submit' value='Отправить'/></p>
    <p><input type='hidden' name='art_name' value=<?php echo $artName; ?>></p>
    </form>
<?php endif; ?>

</body>
</html>