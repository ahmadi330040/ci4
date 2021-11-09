<!doctype html>
<html lang="en">
   <head>
      <!-- BASIC META-->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title><?= $title ?></title>
      <!-- FAVICON -->
      <link rel="apple-touch-icon" href="../../asset/img/favicon/mypay-logo.png">
      <link rel="icon" href="../../asset/img/favicon/mypay-logo.ico">
      <!-- WEB FONTS  -->
      <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
      <!-- BOOTSTRAP MIN CSS -->
      <link href="../../asset/css/bootstrap.min.css" rel="stylesheet">
      <!-- MC Scroll CSS -->
      <link href="../../asset/css/jquery.mCustomScrollbar.min.css" rel="stylesheet">
      <!-- ALL PLUGINS CSS -->
      <link href="../../asset/css/elements.css" rel="stylesheet">
      <!-- THEME STYLE CSS -->
      <link href="../../css/style.css" rel="stylesheet">
      <!-- RESPONSIVE CSS -->
      <link href="css/responsive.css" rel="stylesheet">
      <!-- Font Awesome Css -->
      <link rel="stylesheet" href="../../asset/fontawesome/css/all.css">
      <!--Start of Tawk.to Script-->
      <script type="text/javascript">
         var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
         (function(){
         var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
         s1.async=true;
         s1.src='https://embed.tawk.to/60b1f35f6699c7280da98dcd/1f6rhtbhf';
         s1.charset='UTF-8';
         s1.setAttribute('crossorigin','*');
         s0.parentNode.insertBefore(s1,s0);
         })();
      </script>
      <!--End of Tawk.to Script-->
   

        <?= $this->include('website/layout/navbar') ?>

        <?= $this->renderSection('content'); ?>

        <?= $this->include('website/layout/footer') ?>

      <script src="../../asset/js/jquery.min.js"></script>
      <script src="../../asset/js/bootstrap.min.js"></script>
      <script src="../../asset/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="../../asset/js/plugins.js"></script>
      <script src="../../asset/js/main.js"></script>
      <script src="../../asset/js/ajax-mail.js"></script>
      <script src="../../asset/js/ajax-subscribe.js"></script>
   </body>
</html>