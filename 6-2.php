<?php
$fileAddress = "test.csv";
function findSubstringInCsv ( string $fileAddress, string $needle){
    if(file_exists($fileAddress) || is_readable($fileAddress)){
        $fileAddress = fopen($fileAddress, "r");
    }
    else{
        echo "Ошибка открытия файла"; // Проверка на доступность и читабельности файла
    }
    if(($fileAddress = fopen($fileAddress, "r")) !==FALSE){
        while (($data = fgetcsv($fileAddress, 1000 , ";")) !==FALSE){
            $string = implode(";", $data);
            if(str_contains($string, $needle)){
                echo $string . "<br>";
                break;
            }
        }
    }
    fclose($fileAddress);
}
findSubstringInCsv ("test.csv", "1");

