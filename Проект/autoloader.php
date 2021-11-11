<?php

$libDir = scandir(".");
$libDir = array_diff($libDir, [".", ".."]);

foreach ($libDir as $file) {
    if (substr($file, -8) == ".lib.php") {
        require_once ("./" . $file);
    }
}