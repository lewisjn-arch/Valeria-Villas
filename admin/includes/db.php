<?php

$host = "173.252.167.30";
$dbname = "talkklif_valeria";
$username = "talkklif_valuser";
$password = "1N&^PIIJ_h;D";

try {

    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
    );

    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

} catch(PDOException $e){

    die("Database Error: " . $e->getMessage());

}