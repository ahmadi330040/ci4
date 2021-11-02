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
                                    <h2>Berikut Produk Unggulan My Pay</h2>
                                    <p class="blog-meta">
                                       Menjadi agen My Pay anda bisa menjual banyak produk digital <br>
                                       Diantaranya adalah produk-produk dibawah ini :
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

    <section class="blog-details latest-blog-area wow fadeUpIn" data-wow-duration="2s" data-wow-delay="0.2s">
        <div class="container">
            <div class="row">
               <iframe class="col-md-12" src="https://report.mypay.co.id/product/list" style="border:1px solid #c5c5c5; margin-bottom: 150px; border-radius: 20px;" width="100%" height="800"></iframe>
            </div>
        </div>
    </section>

    <!--BRANDE AREA  END-->
    
    <?= $this->endSection('content'); ?>