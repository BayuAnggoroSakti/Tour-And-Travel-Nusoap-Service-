<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Travel | Tour Jogja dan Sekitarnya</title>
        <meta name="description" content="">
<!-- 
Travel Template
http://www.templatemo.com/tm-409-travel
-->
        <meta name="viewport" content="width=device-width">
		<meta name="author" content="templatemo">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800,700,600,300' rel='stylesheet' type='text/css'>
        
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/templatemo_misc.css">
        <link rel="stylesheet" href="css/templatemo_style.css">

        <script src="js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->

        <div class="site-header">
            <div class="container">
                <div class="main-header">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-10">
                            <div class="logo">
                                <a href="#">
                                    <img src="images/logo.png" alt="Travel | Tour Jogja dan Sekitarnya" title="Travel | Tour Jogja dan Sekitarnya">
                                </a>
                            </div> <!-- /.logo -->
                        </div> <!-- /.col-md-4 -->
                        <div class="col-md-8 col-sm-6 col-xs-2">
                            <div class="main-menu">
                                <ul class="visible-lg visible-md">
                                    <li class="active"><a href="index.php">Home</a></li>
                                    <li><a href="paket.php">Paket Wisata</a></li>
                                    <li><a href="promo.php">Promo Wisata</a></li>
                                    <li><a href="testimonial.php">Testimonial</a></li>
                                    <li><a href="contact.php">Contact</a></li>
                                </ul>
                                <a href="#" class="toggle-menu visible-sm visible-xs">
                                    <i class="fa fa-bars"></i>
                                </a>
                            </div> <!-- /.main-menu -->
                        </div> <!-- /.col-md-8 -->
                    </div> <!-- /.row -->
                </div> <!-- /.main-header -->
               
            </div> <!-- /.container -->
        </div> <!-- /.site-header -->


        <div class="flexslider">
            <ul class="slides">
              <?php
                                                    require_once('lib/nusoap.php');
                                                    $client = new nusoap_client('http://localhost/prak_sit_travel/service/service_promo.php');
                                                    $result = $client->call('promo', array());
                                                    if (is_array($result))
                                                    {   $img = 1;
                                                        
                                                        foreach($result as $data)
                                                        {

                                                            //echo "".$data['nama_stasiun'];
                                                            $id_promo = $data['id_promo'];
                                                            $nama = $data['nama'];
                                                            $disi = $data['isi'];
                                                            $tanggal_awal = $data['tanggal_awal'];
                                                            $tanggal_akhir = $data['tanggal_akhir'];
                                                            $gambar = $data['gambar'];
                                                            $isi = substr($disi, 0, 100);
        

                                                ?>
                                                     <li>
                                                        <div class="overlay"></div>
                                                        <img src="images/slider/slider_<?php echo $img++; ?>.jpg" alt="Special 1">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-md-5 col-lg-4">
                                                                    <div class="flex-caption visible-lg">
                                                                        <span class="price">Promo</span>
                                                                        <br>
                                                                        <br>
                                                                        <!-- <h5>Waktu <?php echo " : ".$tanggal_awal." - ".$tanggal_akhir; ?></h5> -->
                                                                        <h3 class="title"><?php echo $nama; ?></h3>
                                                                        <p><?php echo $isi; ?></p>
                                                                        <a href="detail_promo.php?id_promo=<?php echo $id_promo; ?>" class="slider-btn">Detail Promo</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                <?php
                                                    }
                                                }
                                                ?>
               
            </ul>
        </div> <!-- /.flexslider -->

        
        
        <div class="container">
            <div class="row">
                <div class="our-listing owl-carousel">
                <?php
                                                    require_once('lib/nusoap.php');
                                                    $client = new nusoap_client('http://localhost/prak_sit_travel/service/service_paket.php');
                                                    $result = $client->call('paket', array());
                                                    if (is_array($result))
                                                    {
                                                        
                                                        foreach($result as $data)
                                                        {

                                                            //echo "".$data['nama_stasiun'];
                                                            $id_pw = $data['id_pw'];
                                                            $nama = $data['nama'];
                                                            $tujuan = $data['tujuan'];
                                                            $durasi = $data['durasi'];
                                                            $harga = $data['harga'];
                                                            $disi = $data['isi'];
                                                            $isi = substr($disi, 0, 50);
                                                            $gambar =$data['gambar'];
        

                                                ?>
                                                     <div class="list-item">
                                                        <div class="list-thumb">
                                                            <div class="title">
                                                                <h4><?php echo $nama ?></h4>
                                                            </div>
                                                            <img src="admin/images/<?php echo $gambar; ?>" alt="destination 1" width="120px" height="200px">
                                                        </div> <!-- /.list-thumb -->
                                                        <div class="list-content">
                                                            <h5><?php echo $tujuan; ?></h5>
                                                            <span>Durasi <?php echo " : ".$durasi." Hari"; ?></span>
                                                            <a href="detail_paket.php?id_pw=<?php echo $id_pw; ?>" class="price-btn">Rp<?php echo $harga; ?> Book Now</a>
                                                        </div> <!-- /.list-content -->
                                                    </div> <!-- /.list-item -->
                                                <?php
                                                    }
                                                }
                                                ?>
                   <!--  -->
                </div> <!-- /.our-listing -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->

		<div class="middle-content"></div>

        <div class="partner-list">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-4 col-xs-6">
                        <div class="partner-item">
                            <img src="images/partners/partner1.png" alt="">
                        </div> <!-- /.partner-item -->
                    </div> <!-- /.col-md-2 -->
                    <div class="col-md-2 col-sm-4 col-xs-6">
                        <div class="partner-item">
                            <img src="images/partners/partner2.png" alt="">
                        </div> <!-- /.partner-item -->
                    </div> <!-- /.col-md-2 -->
                    <div class="col-md-2 col-sm-4 col-xs-6">
                        <div class="partner-item">
                            <img src="images/partners/partner3.png" alt="">
                        </div> <!-- /.partner-item -->
                    </div> <!-- /.col-md-2 -->
                    <div class="col-md-2 col-sm-4 col-xs-6">
                        <div class="partner-item">
                            <img src="images/partners/partner1.png" alt="">
                        </div> <!-- /.partner-item -->
                    </div> <!-- /.col-md-2 -->
                    <div class="col-md-2 col-sm-4 col-xs-6">
                        <div class="partner-item">
                            <img src="images/partners/partner2.png" alt="">
                        </div> <!-- /.partner-item -->
                    </div> <!-- /.col-md-2 -->
                    <div class="col-md-2 col-sm-4 col-xs-6">
                        <div class="partner-item last">
                            <img src="images/partners/partner3.png" alt="">
                        </div> <!-- /.partner-item -->
                    </div> <!-- /.col-md-2 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.partner-list -->

		

        <div class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="footer-logo">
                            <a href="index.html">
                                <img src="images/logo.png" alt="">
                            </a>
                        </div>
                    </div> <!-- /.col-md-4 -->
                    <div class="col-md-4 col-sm-4">
                        <div class="copyright">
                            <span>
                            	
                                Copyright &copy; 2015 <a href="#">Bayu Anggoro Sakti</a>
                                
                            
                            
                            <!--
                            | Design: <a rel="nofollow" href="http://www.templatemo.com" target="_parent">templatemo</a>
                            -->
                            
                            </span>
                        </div>
                    </div> <!-- /.col-md-4 -->
                    <div class="col-md-4 col-sm-4">
                        <ul class="social-icons">
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-linkedin"></a></li>
                            <li><a href="#" class="fa fa-flickr"></a></li>
                            <li><a href="#" class="fa fa-rss"></a></li>
                        </ul>
                    </div> <!-- /.col-md-4 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.site-footer -->

        <script src="js/vendor/jquery-1.11.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
        <script src="js/bootstrap.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <!-- templatemo 409 travel -->  
    </body>
</html>