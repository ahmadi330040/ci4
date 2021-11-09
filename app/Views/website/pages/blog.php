<?= $this->extend('website/layout/main-layout'); ?>

<?= $this->section('content'); ?>

</head>
        <body>
<!-- ABOUT UA AREA -->
<section class="about-area ">
            <div class="clouds">
                <img src="asset/img/cloud/b-cloud-1.png" alt="cloud" class="cloud1">
                <img src="asset/img/cloud/b-cloud-2.png" alt="cloud" class="cloud3">
                <img src="asset/img/cloud/b-cloud-3.png" alt="cloud" class="cloud4">
                <img src="asset/img/cloud/b-cloud-4.png" alt="cloud" class="cloud5">
                <img src="asset/img/cloud/b-cloud-5.png" alt="cloud" class="cloud2">
                <img src="asset/img/cloud/b-cloud-1.png" alt="cloud" class="cloud6">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="about-content-table">
                            <div class="about-content-table-sell">
                                <div class="about-heading blog-details-heading">
                                    <h2>My Pay Blogs</h2>
                                    <p class="blog-meta">
                                    Tutorial Teknis Operasional Aplikasi
                                    Untuk lebih dalam belajar aplikasi My Pay, silahkan baca dengan seksama artikel berikut :
                                    </p>
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

    <section class="latest-blog-area blog-section-area">
        <div class="container">
            <div class="row">
               <?php foreach($blog as $b) :  ?>
               <div class="col-md-6 col-sm-12">
                  <div class="single-blog mb-60">
                     <div class="single-blog-image">
                        <a href="#">
                        <img src="/img/<?= $b['imgpath'] ?>" alt="blog-img">
                        </a>
                     </div>
                     <div class="blog-box-content">
                        <ul class="post-meta">
                           <li>
                              <span class="meta-wrap author-meta">
                              By:
                              <a href="#"><?= $b['author'] ?></a>
                              </span>
                           </li>
                           <li>
                              <span class="meta-wrap">
                              <a href="#"><?= $b['date'] ?> </a>
                              </span>
                           </li>
                        </ul>
                        <a href="#">
                           <h3><?= $b['judul']; ?></h3>
                        </a>
                        <div class="blog-excerpt">
                            <p><?= $b['deskripsi_display'] ?></p>
                        </div>
                        <div class="post-permalink">
                           <a class="read-more-btn" href="/blog-detail/<?= $b['slug']; ?>">Read more</a>
                        </div>
                     </div>
                  </div>
               </div>
               <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!--BRANDE AREA  END-->
    
    <?= $this->endSection('content'); ?>