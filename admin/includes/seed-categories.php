<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/db.php';

try {

    $sql = "
        INSERT INTO categories (name)
        VALUES
        ('Investment'),
        ('Design'),
        ('Construction'),
        ('Finance'),
        ('Lifestyle')
    ";

    $pdo->exec($sql);

    echo "Categories inserted successfully!";

} catch(PDOException $e){

    echo "Error: " . $e->getMessage();

}