<?php

require_once __DIR__ . '/db.php';

$action = $_POST['action'];

$status = ($action == 'publish')
    ? 'published'
    : 'draft';

$title = $_POST['title'];
$content = $_POST['content'];
$seo_title = $_POST['seo_title'];
$seo_description = $_POST['seo_description'];
$category = $_POST['category'];

$slug = strtolower($title);
$slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
$slug = trim($slug, '-');

$article_id = intval($_POST['article_id']);

$category_stmt =
$pdo->prepare("SELECT id FROM categories WHERE name=?");

$category_stmt->execute([$category]);

$category_id =
$category_stmt->fetchColumn();

if(empty($article_id))
{

    $stmt = $pdo->prepare("
        INSERT INTO articles
        (
            title,
            slug,
            excerpt,
            content,
            category_id,
            status
        )
        VALUES
        (
            ?, ?, ?, ?, ?, ?
        )
    ");

    $stmt->execute([
        $title,
        $slug,
        $seo_description,
        $content,
        $category_id,
        $status
    ]);

    $article_id = $pdo->lastInsertId();

}
else
{

    $stmt = $pdo->prepare("
        UPDATE articles
        SET
            title=?,
            slug=?,
            excerpt=?,
            content=?,
            category_id=?,
            status=?
        WHERE id=?
    ");

    $stmt->execute([
        $title,
        $slug,
        $seo_description,
        $content,
        $category_id,
        $status,
        $article_id
    ]);

}

header(
"Location: ../new-article.php?id=".$article_id."&saved=1"
);

exit;