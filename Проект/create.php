<?php

require_once ('autoloader.php');

if (checkRole("createArticle")) {
    saveNewArt($_POST['art_name'], $_POST['art_text']);
}
else {
    echo "У вас нет доступа для создания статей";
}