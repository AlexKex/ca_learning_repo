<?php
include_once "mysqlConnect.php";
// include_once "../style/css/headStyle.css";

function generation_head_menu ($mysqli) {   // Функция для генерации меню
    $sql = "SELECT * FROM `topic`";   // Запрос к БД
    $resSQL = $mysqli -> query($sql);
    ?>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/">Главная</a>
            <ul class="navbar-nav mr-auto">
                <?php
                    while ($rowTopic = $resSQL -> fetch_assoc()) {   // Создаём список категорий в меню
                        echo '<li class="nav-item"><a class="nav-link" href="./topic.php?id_topic='. $rowTopic["id"] .'">'. $rowTopic['name'].'</a></li>';   // Выводим элемент списка
                    }
                ?>
            </ul>
            <a class="navbar-brand" href="login.php">Вход</a>
        </nav>
    </header>
    <?php
}

function generation_posts_index ($mysqli) {    // Генератор для вывода статей
    $sql = "SELECT * FROM `articles`";    // SQL запрос для получения всех статей на сайте
    $res = $mysqli -> query($sql);     // Отправляем SQL запрос

    if ($res -> num_rows > 0) {    // Выводим статьи
        while ($resArticle = $res -> fetch_assoc()) {
            ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" ><a href="post.php?id_article=<?= $resArticle['id'] ?>"><?= $resArticle['title'] ?></a></h5>
                    <p class="card-text"><?= mb_substr($resArticle['text'], 0, 158, 'UTF-8') ?></p>
                </div>
            </div>
            <?php
        }
    } else {
        echo "Нет статей";  // Если нет статей
    }
}

function generation_posts_topic ($mysqli, $id_topic) {     // Создаём генератор для вывода статей в категории
    $sql = "SELECT * FROM `articles` WHERE `id_topic` = $id_topic";    // SQL запрос
    $res = $mysqli -> query($sql);    // Отправляем SQL запрос

    if ($res -> num_rows > 0) {   // Проверяем есть ли статьи
        while ($resArticle = $res -> fetch_assoc()) {
            ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" ><a href="post.php?id_article=<?= $resArticle['id'] ?>"><?= $resArticle['title'] ?></a></h5>
                    <p class="card-text"><?= mb_substr($resArticle['text'], 0, 158, 'UTF-8') ?></p>
                </div>
            </div>
            <?php
        }
    } else {
        echo "В этом раздели статей нет"; // Если нет статей
    }
}

function generation_post ($mysqli, $id_article) {     // Функции для генерации статьи
    $sql = "SELECT * FROM `articles` WHERE `id` = '$id_article'";   // SQL запрос
    $res = $mysqli -> query($sql);    // Отправляем SQL запрос

    if ($res -> num_rows === 1) {    // Проверяем есть ли статья
        $resPost = $res -> fetch_assoc()   // Получаем и выводим статью ?>
        <h1><?= $resPost['title'] ?></h1>
        <p><?= $resPost['text'] ?></p>
        <p>Дата публикации: <?= substr($resPost['date'], 0, 11) ?></p>
        <?php
    }
}

function generation_comment ($mysqli, $id_article) {    // генератор комментариев
    $sql = "SELECT * FROM `comments` WHERE `id_article` = $id_article";    // SQL запрос
    $resSQL = $mysqli -> query($sql);   // Отправляем SQL запрос 

    if ($resSQL -> num_rows > 0) {     // Проверяем есть ли комментарии
        while ($resComment = $resSQL -> fetch_assoc()) {    // Выводим комментарии
            ?> 
            <div class="comment">
                <p><b><?= $resComment['comment']?></b></p>
                <p> <?= substr($resComment['date'], 0, 11)  ?></p>
            </div>
            <hr>
            <?php
        }
    } else { // Если нет комментариев 
        ?>
            <p>Комментариев  еще нет</p> 
        <?php
    }
}
?> 
