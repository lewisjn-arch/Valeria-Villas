<?php

require_once 'includes/db.php';

$publishedCount = $pdo->query("
    SELECT COUNT(*)
    FROM articles
    WHERE status='published'
")->fetchColumn();

$draftCount = $pdo->query("
    SELECT COUNT(*)
    FROM articles
    WHERE status='draft'
")->fetchColumn();

$commentsCount = $pdo->query("
    SELECT COUNT(*)
    FROM comments
")->fetchColumn();

$drafts = $pdo->query("
    SELECT *
    FROM articles
    WHERE status='draft'
    ORDER BY updated_at DESC
");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="/img/favicon.png">
    <link rel="stylesheet" href="../css/plugins.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="assets/css/blog.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css">
</head>

<body class="admin-page">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="logo-wrapper valign">
            <div class="sidebar-logo">
                <a href="/index.html">
                    <img src="../img/logo.webp" class="logo-img" alt="Valeria Villas Logo">
                </a>
            </div>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><span class="nav-link active">Logged in as Admin</span></li>
                <li class="nav-item"><a class="nav-link logout-link" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="dashboard">
        <aside class="sidebar">
            <ul>
                <li>Dashboard</li>
                <li><a href="new-article.php">New Article</a></li>
                <li>Articles</li>
                <li>Comments</li>
                <li>Replies</li>
                <li>Users</li>
                <li>Analytics</li>
            </ul>
        </aside>

        <main class="dashboard-content">
            <div class="editor-header">
                <span>Content Management System</span>
                <h1>Dashboard</h1>
                <p>
                    Manage drafts, published articles,
                    comments and content performance.
                </p>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <h3><?= $publishedCount ?></h3>
                    <p>Published Articles</p>
                </div>

                <div class="stat-card">
                    <h3><?= $draftCount ?></h3>
                    <p>Draft Articles</p>
                </div>

                <div class="stat-card">
                    <h3><?= $commentsCount ?></h3>
                    <p>Comments</p>
                </div>

                <div class="stat-card">
                    <h3>-</h3>
                    <p>Analytics Coming Soon</p>
                </div>
            </div>

            <a href="new-article.php"class="new-article-btn">Create New Article</a>

            <div class="drafts-section">
                <h2>Recent Drafts</h2>
                <table class="draft-table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Last Updated</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while($row = $drafts->fetch(PDO::FETCH_ASSOC)): ?>
                            <tr>
                                <td>
                                    <?= htmlspecialchars($row['title']) ?>
                                </td>
                                <td>
                                    <?= ucfirst($row['status']) ?>
                                </td>
                                <td>
                                    <?= $row['updated_at'] ?>
                                </td>
                                <td>
                                    <a href="new-article.php?id=<?= $row['id'] ?>" class="edit-link">Continue Editing</a>
                                    <a href="delete-article.php?id=<?=$draft['id']?>" class="delete-link"onclick="return confirm('Delete this draft permanently?')">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>