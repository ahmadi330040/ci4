<?= $this->extend('website/layout/main-layout'); ?>

<?= $this->section('content'); ?>

</head>
        <body>
<!-- ABOUT UA AREA -->
<section class="about-area ">
            <div class="clouds">
                <img src="../../asset/img/cloud/b-cloud-1.png" alt="cloud" class="cloud1">
                <img src="../../asset/img/cloud/b-cloud-2.png" alt="cloud" class="cloud3">
                <img src="../../asset/img/cloud/b-cloud-3.png" alt="cloud" class="cloud4">
                <img src="../../asset/img/cloud/b-cloud-4.png" alt="cloud" class="cloud5">
                <img src="../../asset/img/cloud/b-cloud-5.png" alt="cloud" class="cloud2">
                <img src="../../asset/img/cloud/b-cloud-1.png" alt="cloud" class="cloud6">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="about-content-table">
                            <div class="about-content-table-sell">
                                <div class="about-heading blog-details-heading">
                                    <h2><?= $blog['judul']; ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
  
    <!-- ABOUT UA AREA END -->
     <!-- blog AREA  -->

     <section class="blog-details latest-blog-area wow fadeUpIn" data-wow-duration="2s" data-wow-delay="0.2s">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="single-blog-box">
                        <img src="../../img/<?= $blog['imgpath']; ?>" alt="details-page-bg">
                        <div class="blog-box-content">
                            <p class="blog-meta">
                                <a href="#">By: <?= $blog['author']; ?></a>
                                <a href="#"> <?= $blog['date']; ?></a>
                            </p>
                            <?= $blog['content'] ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="blog-right-search-button">
                        <div class="search-button">
                            <input type="text" placeholder="Enter Your Keyword">
                            <button><img src="../../asset/img/icons/search-icon.png" alt="search icon"></button>
                        </div>
                    </div>
                    <div class="blog-detail blog-recent-post">
                        <h3>Recent Post</h3>
                        <div class="blog-recent-post-list">
                        <?php foreach($blogall as $ba) : ?>
                        <div class="row">
                            <div class="col-md-5 col-sm-5">
                                <div class="blog-recent-post-image-1">
                                    <a href="/blog-detail/<?= $ba['slug']; ?>"><img src="../../img/<?= $ba['imgpath'] ?>" alt="recent-post-bg-1"></a>
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-7">
                                <div class="blog-recent-post-content">
                                    <a href="/blog-detail/<?= $ba['slug']; ?>">
                                        <h2><?= $ba['judul'] ?></h2>
                                    </a>
                                    <p><?= $ba['date'] ?></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--BRANDE AREA  END-->
    
    <?= $this->endSection('content'); ?>