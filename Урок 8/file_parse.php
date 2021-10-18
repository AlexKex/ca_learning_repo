<?php

$type = explode("/", $_FILES['userfile']['type']);
$imgType =$type[1];
$type = $type[0];

//Проверка типа
if ($type != "image") {
    echo "Недопустимый формат файла";
}


//Это изображение
else {

    // Создаем изображение png или jpeg

    switch ($imgType) {
        case "png":
            $im = imagecreatefrompng($_FILES['userfile']['tmp_name']);
            break;

        case "jpeg":
            $im = imagecreatefromjpeg($_FILES['userfile']['tmp_name']);
            break;
    }

    $imgSize = getimagesize($_FILES['userfile']['tmp_name']);


    //Создаем миниатюру

    $width = 200;
    $height = 200;
    $ratio = $imgSize[0] / $imgSize[1];

    if ($width / $height > $ratio) {
        $width = $height * $ratio;
     } else {
        $height = $width / $ratio;
     }

     $mini = imagecreatetruecolor($width, $height);
     imagecopyresampled($mini, $im, 0, 0, 0, 0, $width, $height, $imgSize[0], $imgSize[1]);


    // Проверяем на размер и обрезаем, если он больше

    if ($imgSize[0] > 320 || $imgSize[1] > 320) {
        if ($imgSize[0] < $imgSize[1]) {
            $im = imagecrop($im, ['x' => 0, 'y' => 0, 'width' => $imgSize[0], 'height' => 320]);
        }
        else {
            $im = imagecrop($im, ['x' => 0, 'y' => 0, 'width' => 320, 'height' => $imgSize[1]]);
        }
    }

    //Сохраняем изображение и миниатюру

    $uploadPath = $_SERVER['DOCUMENT_ROOT'] . "/uploads/";
    $uploadfile = $uploadPath . basename($_FILES['userfile']['name']);

    $imName = explode(".", $_FILES['userfile']['name']);
    $miniName = implode("",array_slice($imName, 0, count($imName)-1)) . "_mini." . implode("",array_slice($imName, count($imName)-1, count($imName)));
    $uploadMiniFile = $uploadPath . $miniName;

    switch ($imgType) {
        case "png":
            imagepng($im, $uploadfile);
            imagepng($mini, $uploadMiniFile);
            break;

        case "jpeg":
            imagejpeg($im, $uploadfile);
            imagejpeg($mini, $uploadMiniFile);
    }

    //Сохраняем имя в БД

    require_once('db_connection.php');

    $insertQuery = "INSERT INTO gallery (`image_name`, `image_mini` ,`image_count`) VALUES ('".$_FILES['userfile']['name']."', '".$miniName."', 0)";
    mysqli_query($connection, $insertQuery);

    //Выводим галерею

    $select = "SELECT * FROM gallery";
    $selectResult = mysqli_query($connection, $select);

    while ($row = mysqli_fetch_assoc($selectResult)) {
        $filePath = "http://" . $_SERVER['SERVER_NAME'] . "/uploads/" . $row['image_name'];
        echo "<img src = $filePath> <br>";

        //Обновляем просмотры

        $updateQuery = "UPDATE gallery SET `image_count` = '".++$row['image_count']."' WHERE `image_name` = '".$row['image_name']."'";
        mysqli_query($connection, $updateQuery);

    }

    //Закрываем таблицу
    mysqli_close($connection);
}





