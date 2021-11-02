<?= $this->extend('website/layout/main-layout'); ?>

<?= $this->section('content'); ?>
  <!-- Form contact Css -->
  <link rel="stylesheet" href="css/contact.css">
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
                                    <h2>Feel Free Contact with us</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
  
    <!-- ABOUT UA AREA END -->
  
      <!--ADDRESS AREA  -->
      <div class="container-contact">
        <span class="big-circle"></span>
        <img src="img/shape.png" class="square" alt="" />
        <div class="form">
          <div class="contact-info-form">
            <h3 class="title">Let's get in touch</h3>
            <p class="text">
                Untuk pertanyaan terkait layanan atau informasi tambahan silahkan hubungi kami melalui contact dibawah ini. Data pribadi anda di jamin kerahasiaan nya.
            </p>
  
            <div class="info">
              <div class="information">
                <img src="img/location.png" class="icon" alt="" />
                <p>Jl. Mulawarman GG. Koni No. 26 Tenggarong<br>Kutai KartanegaraKalimantan Timur</p>
              </div>
              <div class="information">
                <img src="img/email.png" class="icon" alt="" />
                <p>mycellpertama@gmail.com</p>
              </div>
              <div class="information">
                <img src="img/phone.png" class="icon" alt="" />
                <p>+6282352513472</p>
              </div>
            </div>
  
            <!-- <div class="social-media">
              <p>Connect with us :</p>
              <div class="social-icons">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
                <a href="#">
                  <i class="fab fa-instagram"></i>
                </a>
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </div>
            </div> -->
          </div>
  
          <div class="contact-form">
            <span class="circle one"></span>
            <span class="circle two"></span>
  
            <form id="digita-contact-form" action="asset/php/contact-mail.php" method="POST">
              <h3 class="title">Contact us</h3>
              <div class="input-container">
                <input type="text" name="name" class="input" />
                <label for="">Username</label>
                <span>Username</span>
              </div>
              <div class="input-container">
                <input type="email" name="email" class="input" />
                <label for="">Email</label>
                <span>Email</span>
              </div>
              <div class="input-container">
                <input type="tel" name="phone" class="input" />
                <label for="">Phone</label>
                <span>Phone</span>
              </div>
              <div class="input-container textarea">
                <textarea name="message" class="input"></textarea>
                <label for="">Message</label>
                <span>Message</span>
              </div>
              <div class="submit-button">
                <button type="submit" class="btn">SEND MESSAGE</button>
                <p class="contact-send-message"></p>
            </div>
            </form>
          </div>
        </div>
      </div>
<?= $this->endSection('content'); ?>