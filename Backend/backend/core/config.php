<?php
$config = [
    "db_host" => "localhost:3306",
    "db_name" => "ciposhop",
    "db_user" => "root",
    "db_pass" => ""
];

function logMessage($level, $message){
    //w: újraírja, a: hozzáfűzi
    //$file: erőforrás típusú változó
    $file = fopen("application.log", "a");
    //PHP_EOL: új sor az oprendszerben
    fwrite($file, "[$level] $message".PHP_EOL);
    //fájl lezásrása
    fclose($file);
}


?>