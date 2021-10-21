<?php
function writelog($value){
    $fileName = "log_" . date("Y-m-d");
    $file = fopen($fileName . ".txt", "a+");
    $writeToFile= "### " . date("d.m.Y H:i:s") . "\n" . $value . "\n\n\n";

    if (!$file){
        echo "Error";
    }
    else {
        if (filesize($fileName . "txt") > 100);
        {
            fclose($file);
            $fileName = "log_" . date("Y-m-d");
            $file = fopen($fileName . ".txt", "a+");
        }
    }
    fwrite($file, $writeToFile);
    fclose($file);
}
$test = "kekw";
writelog($test);
