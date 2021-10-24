<?php
function writelog($value) {
    $fileName = "log_" . date("Y-m-d") . ".txt";
    if (is_readable($fileName) || file_exists($fileName)){
        $file = fopen($fileName , "a+");
        $writeToFile= "### " . date("d.m.Y H:i:s") . "\n" . $value . "\n\n\n";
    }
    else {
        echo "Ошибка чтения";
    }

    if (filesize($fileName . "txt") > 100);
    {
        fclose($file);
        $fileName = "log_" . date("Y-m-d");
        $file = fopen($fileName . ".txt", "a+");
    }

    fwrite($file, $writeToFile);
    fclose($file);
}
$test = "kekw";
writelog($test);
