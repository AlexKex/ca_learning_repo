<?php

$imgName = $_FILES['userfile']['name'];
$fileType = explode("/", $_FILES['userfile']['type'])[0];
$imgType = explode("/", $_FILES['userfile']['type'])[1];
$imgTmpName =  $_FILES['userfile']['tmp_name'];
$imgSize = getimagesize($imgTmpName);

//Отсеивание не изображений

if ($fileType != "image") {
    echo "Недопустимый формат файла";
}

else {
    
    //Создаем GD изображение
    $img = createGD ($imgTmpName, $imgType);

    //Создаем миниатюру    
    $imgMini = createMini($img, $imgSize);

    //Даем название миниатюре
    $imgMiniName = getMiniName($imgName);

    //Проверяем размер изображения и обрезаем при необходимости
    $img = imgCut($img, $imgSize);

    //Сохраняем изображение в папку "uploads"
    imgSave($img, $imgName, $imgType);

    //Сохраняем миниатюру в папку "uploads"
    imgSave($imgMini, $imgMiniName, $imgType);

    //Открываем БД
    require_once('db_connection.php');

    //Сохраняем имя изображения и миниатюры в БД
    imgSaveDB($connection, $imgName, $imgMiniName);

    //Выводим галерею
    showGallery($connection);

    //Обновляем просмотры
    updateViews($connection);

    //Закрываем БД
    mysqli_close($connection); 
}

function createGD(string $tmpName, string $imgType): object {

    switch ($imgType) {
        case "png":
            $im = imagecreatefrompng($tmpName);
            return $im;
            break;

        case "jpeg":
            $im = imagecreatefromjpeg($tmpName);
            return $im;
            break;
    }
}

function createMini(object $img, array $imgSize): object {
    
    $width = 200;
    $height = 200;
    $ratio = $imgSize[0] / $imgSize[1];

    if ($width / $height > $ratio) {
        $width = $height * $ratio;
     } else {
        $height = $width / $ratio;
     }

     $imgMini = imagecreatetruecolor($width, $height);
     imagecopyresampled($imgMini, $img, 0, 0, 0, 0, $width, $height, $imgSize[0], $imgSize[1]);
     return $imgMini;
}

function getMiniName(string $imgName): string {

    $NameList = explode(".", $imgName);
    $miniName = implode("",array_slice($NameList, 0, count($NameList)-1)) . "_mini." . implode("",array_slice($NameList, count($NameList)-1, count($NameList)));
    return $miniName;
}

function imgCut(object $img, array $imgSize): object {

    if ($imgSize[0] > 320 || $imgSize[1] > 320) {
        if ($imgSize[0] < $imgSize[1]) {
            $img = imagecrop($img, ['x' => 0, 'y' => 0, 'width' => $imgSize[0], 'height' => 320]);
        }
        else {
            $img = imagecrop($img, ['x' => 0, 'y' => 0, 'width' => 320, 'height' => $imgSize[1]]);
        }
    }
    return $img;
}

function imgSave(object $img, string $imgName, string $imgType): void {

    $uploadPath = $_SERVER['DOCUMENT_ROOT'] . "/uploads/";
    $uploadfile = $uploadPath . basename($imgName);

    switch ($imgType) {
        case "png":
            imagepng($img, $uploadfile);
            break;

        case "jpeg":
            imagejpeg($img, $uploadfile);
            break;
    }
}

function imgSaveDB(object $connectionDB, string $imgName, string $imgMiniName): void {

    $insertQuery = "INSERT INTO gallery (`image_name`, `image_mini` ,`image_count`) VALUES ('".$imgName."', '".$imgMiniName."', 0)";
    mysqli_query($connectionDB, $insertQuery);
}

function showGallery(object $connectionDB): void {
    $select = "SELECT * FROM gallery";
    $selectResult = mysqli_query($connectionDB, $select);

    while ($row = mysqli_fetch_assoc($selectResult)) {
        $filePath = "http://" . $_SERVER['SERVER_NAME'] . "/uploads/" . $row['image_name'];
        echo "<img src = $filePath> <br>";
    }
}

function updateViews(object $connectionDB): void {
    $select = "SELECT * FROM gallery";
    $selectResult = mysqli_query($connectionDB, $select);

    while ($row = mysqli_fetch_assoc($selectResult)) {
        $updateQuery = "UPDATE gallery SET `image_count` = '".++$row['image_count']."' WHERE `image_name` = '".$row['image_name']."'";
        mysqli_query($connectionDB, $updateQuery);
    }
}





