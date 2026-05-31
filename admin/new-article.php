<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>New Article</title>
        <link rel="shortcut icon" href="/img/favicon.png">
        <link rel="stylesheet" href="assets/css/blog.css">
    </head>
    <body  class="blog-page">
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
                    <li class="nav-item"><a class="nav-link active" href="/index.html#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/index.html#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="/index.html#gallery">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="/index.html#services">Amenities</a></li>
                    <li class="nav-item"><a class="nav-link" href="/index.html#links">Links</a></li>
                    <li class="nav-item"><a class="nav-link" href="/admin/blog/blog.php">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="/index.html#contact">Contacts</a></li>
                </ul>
            </div>
        </nav>
        <div class="dashboard">
            <aside class="sidebar">
                <ul>
                    <li>Dashboard</li>
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
                    <h1>Create New Article</h1>
                    <p>Draft, preview and publish articles directly to the Valeria Villas blog.</p>
                </div>
                <div class="editor-layout">
                    <form class="article-editor">
                        <div class="editor-group">
                            <label>Featured Image</label>
                            <input type="file" id="featuredImage" accept="image/*">
                            <div class="image-preview">
                                <img id="previewImage" style="display:none;">
                                <span id="previewText">No Image Selected</span>
                            </div>
                        </div>
                        <div class="editor-group">
                            <label>Article Title</label>
                            <input type="text" id="articleTitle" maxlength="120" placeholder="Enter article title">
                        </div>

                        <div class="editor-group">
                            <label>Category</label>
                            <select id="articleCategory">
                                <option>Investment</option>
                                <option>Architecture</option>
                                <option>Construction</option>
                                <option>Luxury Living</option>
                                <option>Real Estate News</option>
                            </select>
                        </div>

                        <div class="editor-group">
                            <div class="seo-header">
                                <label>SEO Meta Title</label>
                                <span id="seoTitleCount">0 / 60</span>
                            </div>
                            <input type="text" maxlength="60" placeholder="Maximum 60 characters">
                        </div>

                        <div class="editor-group">
                            <div class="seo-header">
                                <label>SEO Meta Description</label>
                                <span id="seoDescriptionCount">0 / 160</span>
                            </div>
                            <textarea maxlength="160" placeholder="Maximum 160 characters"></textarea>
                        </div>

                        <div class="editor-group">
                            <label>Article Content</label>
                            <div class="editor-toolbar">
                                <button type="button" id="insertH2">H2</button>
                                <button type="button" id="insertH3">H3</button>
                                <button type="button" id="insertQuote">Quote</button>
                                <button type="button" id="insertList">List</button>
                                <button type="button" id="insertTable">Table</button>
                                <button type="button" id="insertImage">Image</button>
                            </div>
                            <div class="article-content-editor" id="articleContent" contenteditable="true"></div>
                        </div>

                        <div class="editor-actions">
                            <button type="button" class="draft-btn">Save Draft</button>
                            <button type="button" class="preview-btn">Preview</button>
                            <button type="submit" class="publish-btn">Publish</button>
                        </div>
                    </form>
                    <div class="live-preview">
                        <span class="preview-category">Investment</span>
                        <h1 id="previewTitle">Article Title Preview</h1>
                        <div id="previewContent">
                            Start writing your article to see a live preview...
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="tableModal" class="editor-modal">
            <div class="editor-modal-content">
                <h3>Insert Table</h3>
                <label>Rows</label>
                <input type="number" id="tableRows" value="3" min="1">
                <label>Columns</label>
                <input type="number" id="tableCols" value="3" min="1">
                <button id="generateTable">Insert Table</button>
            </div>
        </div>
    </body>
</html>