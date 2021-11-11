<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Create New Article</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<form action="create.php" method = "POST">
    <p><label for="art_name">Название статьи<label><input type="text" id="art_name" name="art_name"/></p>
    <p><label for="art_text">Ваша статья<label><textarea id="art_text" name="art_text"></textarea></p>
    <p><input type="submit" value="Отправить"/></p>
</form>

</body>
</html>