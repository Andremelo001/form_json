<?php

require_once 'database.php';

try {
    $connPdo = new \PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    die("Não foi possível se conectar ao banco de dados $dbname :" . $e->getMessage());
}