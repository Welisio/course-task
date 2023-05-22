<?php
try {
    $dsn = "mysql:host=localhost;dbname=coursedb;charset=utf8mb4";
    $pdo = new PDO($dsn,'root','');
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Failed to connect to the database: ' . $e->getMessage();
}
?>