<?php
try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=netflux',
        'root',
        '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
         PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
    ); 
}
catch( PDOException $e ) {
    echo "Erreur SQL :", $e->getMessage();
}
