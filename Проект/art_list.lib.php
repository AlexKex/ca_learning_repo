<?php

function showArticles(): void {

    $connection = setupConnection();

    $select = "SELECT * FROM articles";
    $selectResult = mysqli_query($connection, $select);

    if (!$selectResult) {
        echo "Error";
    }

    else {
        while ($row = mysqli_fetch_assoc($selectResult)) {
            $name = $row['art_name'];
            $id = $row['id'];
            echo "<li><a href='http://homestead.test/blog/article.php?article=$id'> $name </a></li>";
        }
    }
}