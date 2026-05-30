<?php
$pageTitle = "Valeria Villas Blog";
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?php echo $pageTitle; ?></title>

<link rel="stylesheet" href="../../css/style.css">
<link rel="stylesheet" href="../assets/css/blog.css">

</head>

<body>

<section class="blog-hero">

    <div class="featured-article">

        <img src="../assets/images/smart-off-plan-investments-kenya.jpeg" alt="Featured Article">

        <div class="featured-content">

            <span class="category">Investment</span>

            <h1>
                Why Ruiru Continues To Be One Of Kenya's Fastest Growing Property Markets
            </h1>

            <p>
                Explore the infrastructure, demand growth and long-term value driving real estate investment in Ruiru.
            </p>

            <a href="article.php" class="read-more">
                Read Article
            </a>

        </div>

    </div>

</section>

<section class="blog-controls">

    <input
        type="text"
        placeholder="Search articles..."
        class="blog-search"
    >

    <div class="blog-filters">

        <button class="active">All</button>
        <button>Investment</button>
        <button>Design</button>
        <button>Construction</button>
        <button>Finance</button>
        <button>Lifestyle</button>

    </div>

</section>

<section class="blog-grid">

<?php for($i=1;$i<=6;$i++): ?>

<div class="blog-card">

    <img src="../assets/images/smart-off-plan-investments-kenya.jpeg" alt="Article">

    <div class="blog-card-content">

        <span class="category">
            Design
        </span>

        <h3>
            Modern Design Trends For Luxury Homes In Kenya
        </h3>

        <p>
            Discover the latest design approaches being adopted by developers and homeowners.
        </p>

        <div class="article-meta">

            <span>♥ 25</span>

            <span>💬 5 Comments</span>

        </div>

        <a href="article.php">
            Read More
        </a>

    </div>

</div>

<?php endfor; ?>

</section>

<div class="load-more-container">

    <button class="load-more">
        Load More Articles
    </button>

</div>

</body>
</html>