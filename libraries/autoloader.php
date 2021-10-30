<?php
$libDir = scandir("./libraries");
$libDir = array_diff($libDir,["..", "."]);
//var_dump($libDir) ;

define('__ROOT__', (dirname(__FILE__)));
 
foreach ($libDir as $file) {
  if(substr($file, -8) == ".lib.php") {
    $link = (__ROOT__ ."/" . $file);
    if (file_exists($link)) {
      //echo "Файл $link существует". "<br>";
      require_once $link;
      } else {
        echo "Файл $link не существует";
    }
  }
}
echo "Автолоудер подключен";

?>