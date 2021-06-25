<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Photon &mdash; Colorlib Website Template</title>
    <style type="text/css">
      #logom
  {
    position: relative;
    top:10%;
    left: 0%;
    width: 100px;
    height: 50px;
  }
  .img-fluid:hover
  {
    cursor:pointer;
  }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/lightgallery.min.css">    
    
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    
    <link rel="stylesheet" href="css/swiper.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
  <div class="site-section"  data-aos="fade">
    <div class="container-fluid">
      
      <div class="row justify-content-center">
        
        <div class="col-md-7">
          <div class="row mb-5">
            <div class="col-12 ">
              <h2 class="site-section-heading text-center">
                <?php
                  error_reporting(0);
                  if($_GET['season']==2)
                    echo "CSPL 2.0 Gallery";
                  else
                  {
                    echo "CSPL 3.0 Gallery";
                  }
                ?>
            </div>
          </div>
        </div>
    
      </div>
<a href="../index.php"><img src="../home.svg" id="logom" style="transform: rotateZ(180deg);position: fixed;left:5%;"></a>  
      <div class='row' id='lightgallery'>
        <?php
          $conn = new mysqli ('localhost','root','','cspl3');
          $season=3;
          if($_GET['season']==2)
          {
            $season=2;
          }
          $query = "SELECT * FROM gallery WHERE season='$season'";
          $result = mysqli_query($conn,$query);
          $count=1;
          while($row = mysqli_fetch_array($result))
          {
              echo "<div class='col-sm-6 col-md-4 col-lg-3 col-xl-2 item' data-aos='fade' data-src='images/".$row['image']."'>
                <img src='images/".$row['image']."'  class='img-fluid'>
              </div>";
          }
        ?>
       
      </div>
     
     
    </div>
  </div>
    
  </div>
  <p align="center">Gallery Template By <a href="https://colorlib.com" target="_blank" >Colorlib</a></p>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/swiper.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/picturefill.min.js"></script>
  <script src="js/lightgallery-all.min.js"></script>
  <script src="js/jquery.mousewheel.min.js"></script>

  <script src="js/main.js"></script>
  
  <script>
    $(document).ready(function(){
      $('#lightgallery').lightGallery();
    });
  </script>
    
  </body>
</html>