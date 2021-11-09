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
                                    <h2>Panduan Deposit My Pay</h2>
                                    <p class="blog-meta">
                                        Beberapa modul yang bisa anda gunakan untuk isi saldo <br>Menggunakan Bank transfer, alfamart, indomaret, virtual account bank, QRis
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
            <div class="row justify-content-center">
                <?php foreach ($deposit as $d) : ?>
                <div class="col-lg-4">
                    <div class="col-sm-12 text-center m-3">
                        <img class="mb-3" src="/img/<?= $d['img_bank'] ?>" alt="">
                        <h5><?= $d['nama_bank'] ?></h5>
                    </div>
                    <p class="text-center">Nomor rekening : <?= $d['nomor_rekening'] ?> <br> Nama rekening : <?= $d['nama_rekening'] ?></p>
                </div>
                <?php endforeach; ?>  
            </div>
            <hr class="mt-5">
        </div>
        <div class="container mb-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="about-content-table">
                        <div class="about-content-table-sell">
                            <div class="about-heading blog-details-heading">
                                <h2>Panduan Transaksi di My Pay</h2>
                                <p class="blog-meta" style="text-align: center;">
                                    Format SMS berlaku sama pada modul center WhatsApp
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php foreach ($transaksi as $t) : ?>
                <div class="col-lg-4">
                    <p class="text-start"><i class="fas fa-check" style="color: green; margin-right: 35px;"></i><?= $t['judul_trx']; ?></p>
                    <p class="text-start" style="margin-left: 50px;">Ketik : <?= $t['format_trx']; ?><br>Contoh : <?= $t['contoh_trx']; ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        
    </section>

    <!--BRANDE AREA  END-->
<?= $this->endSection('content'); ?>