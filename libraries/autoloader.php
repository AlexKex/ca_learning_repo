<?php
echo "auto";
$libDir = scandir(".");
$libDir = array_diff($libDir,["..", "."]);

foreach ($libDir as $file) {
    //echo "./" . $file . "<br>";
    if(substr($file, -8) == ".lib.php") {
        require_once ("./" . $file);
    }
}
?>