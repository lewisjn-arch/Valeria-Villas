<?php

require_once('../includes/db.php');

$perPage = 9;

$page = isset($_GET['page'])
    ? (int)$_GET['page']
    : 1;

if($page < 1){
    $page = 1;
}

$offset = ($page - 1) * $perPage;

$stmt = $pdo->prepare("
    SELECT *
    FROM articles
    WHERE status = 'published'
    ORDER BY created_at DESC
    LIMIT $perPage OFFSET $offset
");

$stmt->execute();

$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

$totalStmt = $pdo->query("
    SELECT COUNT(*)
    FROM articles
    WHERE status='published'
");

$totalArticles = $totalStmt->fetchColumn();

$totalPages = ceil(
    $totalArticles / $perPage
);

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>All Articles</title>
        <link rel="shortcut icon" href="/img/favicon.png">
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="stylesheet" href="../../css/plugins.css">
        <link rel="stylesheet" href="../assets/css/blog.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css">
    </head>

    <body class="blog-page">
        <!-- Google Tag Manager (noscript) -->
        <noscript>
            <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NSRKBCMF"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
        </noscript>
        <!-- End Google Tag Manager (noscript) -->

        <!-- Progress scroll totop -->
        <div class="progress-wrap cursor-pointer">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg">
            <!-- Logo -->
            <div class="logo-wrapper valign">
                <div class="logo">
                    <a href="index.html">
                        <img src="../../img/logo2.png" class="logo-scroll" alt="Valeria Villas">
                        <img src="../../img/logo.webp" class="logo-img" alt="Valeria Villas Logo">
                    </a>
                </div>
            </div>
            <!-- Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
                aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <div class="navbar-toggler-icon">
                    <span class="bar1"></span>
                    <span class="bar2"></span>
                    <span class="bar3"></span>
                </div>
            </button>
            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/index.html#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/index.html#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="/index.html#gallery">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="/index.html#services">Amenities</a></li>
                    <li class="nav-item"><a class="nav-link" href="/index.html#links">Links</a></li>
                    <li class="nav-item"><a class="nav-link active" href="/admin/blog/blog.php">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="/index.html#contact">Contacts</a></li>
                </ul>
            </div>
        </nav>
        <div class="content-wrapper">
            <section class="articles-hero">
                <div class="container">
                    <span class="category">VALERIA VILLAS BLOG</span>
                    <h1>ALL ARTICLES</h1>
                </div>
            </section>

            <section class="articles-controls">
                <input type="text" id="articleSearch" class="blog-search" placeholder="Search Articles...">
                <div class="articles-topbar">
                    <div class="blog-filters">
                        <button class="active" data-category="all">All</button>
                        <button data-category="investment">Investment</button>
                        <button data-category="design">Design</button>
                        <button data-category="construction">Construction</button>
                        <button data-category="finance">Finance</button>
                    </div>
                    <div class="view-toggle">
                        <button id="gridViewBtn" class="active">Grid</button>
                        <button id="listViewBtn">List</button>
                    </div>
                </div>
            </section>

            <section id="articlesContainer" class="blog-grid">
                <?php foreach($articles as $article): ?>
                <div class="blog-card">
                    <img src="<?php echo htmlspecialchars($article['featured_image']); ?>">
                    <div class="blog-card-content">
                        <span class="category"><?php echo htmlspecialchars($article['category']); ?></span>
                        <h3>
                            <?php echo htmlspecialchars($article['title']); ?>
                        </h3>
                        <p>
                            <?php echo htmlspecialchars($article['meta_description']); ?>
                        </p>
                        <a href="article.php?slug=<?php echo urlencode($article['slug']); ?>">
                            Read More
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </section>

            <div class="pagination">
                <?php if($page > 1): ?>
                <a href="?page=<?php echo $page - 1; ?>">
                    Previous
                </a>
                <?php endif; ?>
                <?php for($i = 1; $i <= $totalPages; $i++): ?>
                <a
                    href="?page=<?php echo $i; ?>"
                    class="<?php echo ($i == $page) ? 'active' : ''; ?>">
                    <?php echo $i; ?>
                </a>
                <?php endfor; ?>
                <?php if($page < $totalPages): ?>
                <a href="?page=<?php echo $page + 1; ?>">
                    Next
                </a>
                <?php endif; ?>
            </div>
        </div>
        <!-- Footer -->
        <footer class="main-footer dark">
            <div class="container">
                <div class=" footer-contacts">
                    <div class="col-md-4 mb-30">
                        <div class="item fotcont">
                            <div class="fothead">
                                <p>Phone</p>
                            </div>
                            <p class="fothead"><a href="https://wa.me/+254706254026"> +254706254026</a><br>
                            <a href="https://wa.me/+254706254043">+254706254043</a></p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-30">
                        <div class="item fotcont">
                            <div class="fothead">
                                <p>Email</p>
                            </div>
                            <p class="fothead"><a href="mailto:sales@valeriavillas.com">sales@valeriavillas.com</a><br>
                            <a href="mailto:admin@valeriavillas.com">admin@valeriavillas.com</a></p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-30">
                        <div class="item fotcont">
                            <div class="fothead">
                                <p>Our Address:</p>
                            </div>
                            <p>The Triple Two Address,</p>
                            <p >First Floor, Room A1</p>
                            <p>Eastern Bypass, Ruiru.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sub-footer">
                <div class="container">
                    <div class="row footer-icons">
                        <div class="col-md-6 abot">
                            <div class="social-icon">
                                <a href="https://wa.me/+254706254026" target="_blank" aria-label="Chat with Valeria Villas on Whatsapp"><i class="fa-brands fa-whatsapp"></i></a>
                                <a href="https://www.instagram.com/valeria_villas_kenya/" aria-label="Visit Valeria Villas'  instagram page"><i class="fa-brands fa-instagram"></i></a>
                                <a href="https://x.com/ValeriaVillasKE" aria-label="Banter with Valeria Villas on twitter"><i class="fa-brands fa-x-twitter"></i></a>
                                <a href="https://www.youtube.com/channel/UCDm1dakKg1krNrRLODVB7hA" aria-label="Check out our latest videos on YouTube"><i class="fa-brands fa-youtube"></i></a>
                                <a href="https://www.linkedin.com/company/valeria-villas/" aria-label="Connect with us professionally on LinkedIn"><i class="fa-brands fa-linkedin"></i></a>
                                <a href="https://www.tiktok.com/@valeria_villas_ruiru" aria-label="Check out our latest shorts on Tiktok"><i class="fa-brands fa-tiktok"></i></a>
                                <a href="https://www.facebook.com/ValeriaVillasKenya" aria-label="Be part of our family on facebook"><i class="fa-brands fa-facebook"></i></a>
                            </div>                            
                        </div>
                        <div class="footer-terms">
                            <div class="text-left">
                                <p>© 2026 All rights reserved.</p>                                
                            </div>
                            <a href="/admin/login.php" class="admin-access">
                                <i class="fas fa-cog"></i>
                            </a>
                            <p class="right"><a href="terms&conditions.html">Terms &amp; Conditions</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <script>
            const gridBtn = document.getElementById('gridViewBtn');
            const listBtn = document.getElementById('listViewBtn');
            const container = document.getElementById('articlesContainer');

            gridBtn.addEventListener('click', function(){
                container.classList.remove('list-view');
                gridBtn.classList.add('active');
                listBtn.classList.remove('active');
            });

            listBtn.addEventListener('click', function(){
                container.classList.add('list-view');
                listBtn.classList.add('active');
                gridBtn.classList.remove('active');
            });

        </script>    
    </body>
</html>