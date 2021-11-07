<?php
$name = $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];
$type = $_FILES['image']['type'];
$size = $_FILES['image']['size'];

if($size > 500000){
    echo "Неподходящий размер файла";
    return;
}

if($type != 'image/jpeg'){
    echo "Неподходящий тип файла";
}
else{
    move_uploaded_file($tmp_name, "uploads/" . $name);
    echo "Файл загружен!";
}


