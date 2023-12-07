<?php

require_once 'PDO.php';

try {
    $searchTerm = '%' . $_GET['searchTerm'] . '%';

    $sql = "SELECT id_movie, title, cast FROM movies_full WHERE title LIKE :searchTerm LIMIT 0,25";

    $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $json_data = json_encode($data);

    echo $json_data;
} catch (PDOException $e) {
    die("Erreur PDO : " . $e->getMessage());
}
