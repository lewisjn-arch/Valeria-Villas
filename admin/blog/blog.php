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
                        <img src="img/logo2.png" class="logo-scroll" alt="Valeria Villas">
                        <img src="img/logo.webp" class="logo-img" alt="Valeria Villas Logo">
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
                    <li class="nav-item"><a class="nav-link active" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#gallery">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#services">Amenities</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#links">Links</a></li>
                    <li class="nav-item"><a class="nav-link" href="/admin/blog/blog.php">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#contact">Contacts</a></li>
                </ul>
            </div>
        </nav>
        <!-- Left Panel -->
        <div class="left-panel">
            <ul class="social-left clearfix">
                <li><a href="https://wa.me/+254706254026" target="_blank" aria-label="Chat with Valeria Villas on Whatsapp"><i class="fa-brands fa-whatsapp"></i></a></li>
                <li><a href="https://www.instagram.com/valeria_villas_kenya/" aria-label="Visit Valeria Villas'  instagram page"><i class="fa-brands fa-instagram"></i></a></li>
                <li><a href="https://x.com/ValeriaVillasKE" aria-label="Banter with Valeria Villas on twitter"><i class="fa-brands fa-x-twitter"></i></a></li>
                <li><a href="https://www.youtube.com/channel/UCDm1dakKg1krNrRLODVB7hA" aria-label="Check out our latest videos on YouTube"><i class="fa-brands fa-youtube"></i></a></li>
                <li><a href="https://www.linkedin.com/company/valeria-villas/" aria-label="Connect with us professionally on LinkedIn"><i class="fa-brands fa-linkedin"></i></a></li>
                <li><a href="https://www.tiktok.com/@valeria_villas_ruiru" aria-label="Check out our latest shorts on Tiktok"><i class="fa-brands fa-tiktok"></i></a></li>
                <li><a href="https://www.facebook.com/ValeriaVillasKenya" aria-label="Be part of our family on facebook"><i class="fa-brands fa-facebook"></i></a></li>
            </ul>
        </div>
        <!-- Corner -->
        <div class="hero-corner"></div>
        <div class="hero-corner3"></div>
        
        <section class="blog-hero">
            <div class="featured-article">
                <img src="../assets/images/smart-off-plan-investments-kenya.jpeg" alt="Featured Article">
                <div class="featured-content">
                    <span class="category">Investment</span>
                    <h1> Why Ruiru Continues To Be One Of Kenya's Fastest Growing Property Markets</h1>
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
            <input type="text" placeholder="Search articles..." class="blog-search">
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
                    <span class="category">Design</span>
                    <h3>Modern Design Trends For Luxury Homes In Kenya</h3>
                    <p>
                        Discover the latest design approaches being adopted by developers and homeowners.
                    </p>
                    <div class="article-meta">
                        <span>♥ 25</span>
                        <span>💬 5 Comments</span>
                    </div>
                    <a href="article.php">Read More</a>
                </div>
            </div>
        <?php endfor; ?>
        </section>

        <div class="load-more-container">
            <button class="load-more">Load More Articles</button>
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
    </body>
</html>