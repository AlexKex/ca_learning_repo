<?php
$fileAddress = "test.csv";
function findSubstringInCsv ( $fileAddress, $needle){
    if(file_exists($fileAddress) || is_readable($fileAddress)){
        $fileAddress = fopen($fileAddress, "r");
    }
    else{
        echo "Ошибка открытия файла";
    }
    if(($fileAddress = fopen($fileAddress, "r")) !==FALSE){
        while (($data = fgetcsv($fileAddress, 1000 , ";")) !==FALSE){
            foreach ($data as $element){
                if(str_contains($element , $needle)){
                    echo implode(";" , $needle) . "<br>";
                }
            }
        }
    }
    fclose($fileAddress);
}
$test = "1";
findSubstringInCsv ($test);
