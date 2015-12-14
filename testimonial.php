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
        <link rel="stylesheet" href="css/screen.css">
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
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="paket.php">Paket Wisata</a></li>
                                    <li><a href="promo.php">Promo Wisata</a></li>
                                    <li class="active"><a href="testimonial.php">Testimonial</a></li>
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


       

        
        
         <div class="page-top" id="templatemo_services">
        </div> <!-- /.page-header -->

        <div class="middle-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <div class="widget-item">
                            <h3 class="widget-title">Testimonial</h3>
<ul>
  <?php
                                                    require_once('lib/nusoap.php');
                                                    $client = new nusoap_client('http://localhost/prak_sit_travel/service/service_testimonial.php');
                                                  

                                                        $result = $client->call('testimonial', array());

                                                         if (is_array($result))
                                                    {
                                                        
                                                        foreach($result as $data)
                                                        {

                                                            //echo "".$data['nama_stasiun'];
                                                            $id_booking = $data['id_testimonial'];
                                                            $nama = $data['nama'];
                                                            $email = $data['email'];
                                                            $isi = $data['isi'];
                                                            $tanggal = $data['tanggal'];
                                                       
                                                        
                                                ?>
                                                 <li>
    <div id="block">

        <div class="photo">
            <img src="img/photo-bg.png" alt="" class="photo-bg"/>
            <img src="img/photo.jpg" alt="" class="photo" />
        </div>
        <p class="content"><span class="laquo">&nbsp;</span><?php echo $isi."."; ?><span class="raquo">&nbsp;</span></p>
        <div class="sign">
            <a href="#"><?php echo $nama; ?></a>
            <p><?php echo $email ?></p>
        </div>
    </div>
    </li>
    <hr>

                                           

                                            <?php

                                                        }
                                                                            }
                                                    
                
                                            
            ?>       

   
   
  </ul>
                          
                        </div> <!-- /.widget-item -->
                    </div> <!-- /.col-md-4 -->
               
                    
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.middle-content -->
<?php

    require_once('lib/nusoap.php');
    $client = new nusoap_client('http://localhost/prak_sit_travel/service/service_testimonial.php');
    // proses call method 'search' dengan parameter key di script server.php yang ada di server A
    if (isset($_POST['submit']))
    {
       
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $isi = $_POST['isi'];
        //$fotokereta = $_POST['fotokereta'];

        $result = $client->call('tambah_testimonial', array('nama' => $nama,'email' => $email, 'isi' => $isi));

        if ($result == true){
            echo '<script> alert("Testimoni berhasil di kirimkan"); window.location.replace("testimonial.php");</script>';
     

        } else {

            mysql_error($result);

        }

    } 

?>
<div class="row">
    <div class="col-md-1">
    </div>
    <div class="col-md-5">
                  <h3 class="widget-title">Tambahkan Testimoni Anda</h3>
                        <div class="contact-form">
                            <form name="contactform" id="contactform" action="" method="post">
                                <p>
                                    <input name="nama" required type="text" id="name" placeholder="Nama Lengkap Anda">
                                </p>
                                <p>
                                    <input name="email" required type="text" id="email" placeholder="Alamat Email Anda"> 
                                </p>
                                <p>
                                    <textarea name="isi" id="message" placeholder="isi Testimoni anda di sini"></textarea> 
                                </p>
                                <input type="submit" class="mainBtn" id="submit" name="submit" value="Kirim Testimoni">
                            </form>
                        </div> <!-- /.contact-form -->
            </div> <!-- /.widget-item -->
</div>
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