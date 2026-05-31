<?php

require_once __DIR__ . '/db.php';

$stmt = $pdo->query("SELECT * FROM categories");

echo "<h2>Categories</h2>";

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

    echo $row['id'] . " - " . $row['name'] . "<br>";

}