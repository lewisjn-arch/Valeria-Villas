<?php

require_once 'includes/db.php';

if(!isset($_GET['id']))
{
    header("Location: dashboard.php");
    exit;
}

$id = (int)$_GET['id'];

$stmt = $pdo->prepare("
    DELETE FROM articles
    WHERE id=?
");

$stmt->execute([$id]);

header("Location: dashboard.php?deleted=1");
exit;