<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>DETAIL PAKET - Travel</title>
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
                                    <li><a href="index.php">Home</a></li>
                                    <li class="active"><a href="paket.php">Paket Wisata</a></li>
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
                <div class="row">
                    <div class="col-md-12 visible-sm visible-xs">
                        <div class="menu-responsive">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li class="active"><a href="services.html">Services</a></li>
                                <li><a href="events.html">Events</a></li>
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div> <!-- /.menu-responsive -->
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.site-header -->

        <div class="page-top" id="templatemo_services">
        </div> <!-- /.page-header -->

        <div class="middle-content">
            <div class="container">
                <div class="row">
                   <?php
    if (isset($_GET['id_pw']) )
    {
        //if ($_GET['op'] == 'search')
        //{
            $id_pw = $_GET['id_pw'];
            require_once('lib/nusoap.php');
            $client = new nusoap_client('http://localhost/prak_sit_travel/service/service_paket.php');
            // proses call method 'search' dengan parameter key di script server.php yang ada di server A
            $result = $client->call('detail_paket', array('id_pw' => $id_pw));
            // jika data hasil pencarian ($result) ada, maka tampilkan
            if (is_array($result))
            {

                foreach($result as $data)
                {
                    $id_pw = $data['id_pw'];
                    $nama = $data['nama'];
                    $tujuan = $data['tujuan'];
                    $durasi = $data['durasi'];
                    $harga = $data['harga'];
                    $isi = $data['isi'];
                    $gambar = $data['gambar'];
                }
              

            } 
            else
            {
                echo "data tidak ada";
            }
    } 
    else {
        header('location : index.php');
    }

?>
                    <div class="col-md-8">
                        <div class="widget-item">
                            <h3 class="widget-title"><?php echo $nama; ?></h3>
                            <div class="sample-thumb">
                                <img src="admin/images/<?php echo $gambar; ?>" alt="">
                            </div> <!-- /.sample-thumb -->
                            <h4 class="consult-title">Paket Wisata</h4>
                            <b><?php echo $isi; ?></b>
                        </div> <!-- /.widget-item -->
                    </div> <!-- /.col-md-4 -->
                    <div class="col-md-4">
                        <div class="widget-item">
                            <h3 class="widget-title">Our Services</h3>
                            <div class="service-item">
                                <div class="service-icon">
                                    <i class="fa fa-bell-o"></i>
                                </div> <!-- /.service-icon -->
                                <div class="service-content">
                                    <h4>Alamat </h4>
                                    <p><strong><?php echo $tujuan;?></strong></p>
                                </div> <!-- /.service-content -->
                            </div> <!-- /.service-item -->
                            <div class="service-item">
                                <div class="service-icon">
                                    <i class="fa fa-cogs"></i>
                                </div> <!-- /.service-icon -->
                                <div class="service-content">
                                    <h4>Durasi</h4>
                                    <p><strong><?php echo $durasi." Hari" ?></strong></p>
                                </div> <!-- /.service-content -->
                            </div> <!-- /.service-item -->
                            <div class="service-item">
                                <div class="service-icon">
                                    <i class="fa fa-pencil"></i>
                                </div> <!-- /.service-icon -->
                                <div class="service-content">
                                    <h4>Harga</h4>
                                    <p><strong><?php echo "Rp.".$harga ?></strong></p>
                                </div> <!-- /.service-content -->
                            </div> <!-- /.service-item -->
                        </div> <!-- /.widget-item -->
                    </div> <!-- /.col-md-4 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.middle-content -->

        <div class="row">
            <div class="col-md-1">
<?php

    require_once('lib/nusoap.php');
    $client = new nusoap_client('http://localhost/prak_sit_travel/service/service_booking.php');
    // proses call method 'search' dengan parameter key di script server.php yang ada di server A
    if (isset($_POST['submit']))
    {
       
        $id_pw = $_POST['id_pw'];
        $nama_lengkap = $_POST['nama_lengkap'];
        $alamat = $_POST['alamat'];
        $nomer_hp = $_POST['nomer_hp'];
        $banyak = $_POST['banyak'];
        $tanggal_book = date("Y-m-d H:i:s");
        $tanggal_berangkat = $_POST['tanggal_berangkat'];
        

        //$fotokereta = $_POST['fotokereta'];

        $result = $client->call('tambah_booking', array('id_pw' => $id_pw, 'nama_lengkap' => $nama_lengkap, 'alamat' => $alamat, 'nomer_hp' => $nomer_hp, 'banyak' => $banyak, 'tanggal_book' => $tanggal_book, 'tanggal_berangkat' => $tanggal_berangkat));

        if ($result == true){
            echo '<script> alert("Selamat anda telah berhasil melakukan boking wisata."); window.location.replace("index.php");</script>';
        } else {

            mysql_error($result);
    

        }

    } 

?>
            </div> <!-- /.widget-item -->
             <div class="col-md-6">
                  <h3 class="widget-title">Booking Paket</h3>
                        <div class="contact-form">
                            <form name="contactform" id="contactform" action="" method="post">
                                <p>
                                    <input name="nama_lengkap" required type="text" id="name" placeholder="Nama Lengkap Anda">
                                    <input name="id_pw" type="hidden" id="text" value="<?php echo $id_pw; ?>">
                                </p>
                                <p>
                                    <input name="nomer_hp" required type="text" id="email" placeholder="Nomer handphone yang bisa dihubungi"> 
                                </p>
                                <p>
                                    <input name="banyak" type="number" required id="subject" placeholder="Jumlah"> 
                                </p>
                                 <p>
                                    <input name="tanggal_berangkat" required type="date"> 
                                </p>
                                <p>
                                    <textarea required name="alamat" id="message" placeholder="alamat lengkap anda"></textarea>    
                                </p>
                                <input type="submit" class="mainBtn" id="submit" name="submit" value="Send Booking">
                            </form>
                        </div> <!-- /.contact-form -->
            </div> <!-- /.widget-item -->
             <div class="col-md-3">

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
                            <span>Copyright &copy; 2015 <a href="#">Bayu Anggoro Sakti</a></span>
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
        
        <!-- Google Map -->
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="js/vendor/jquery.gmap3.min.js"></script>
        
        <!-- Google Map Init-->
        <script type="text/javascript">
            jQuery(function($){
                $('.first-map').gmap3({
                    marker:{
                        address: '16.8496189,96.1288854' 
                    },
                        map:{
                        options:{
                        zoom: 16,
                        scrollwheel: false,
                        streetViewControl : true
                        }
                    }
                });
            });
        </script>
        <!-- templatemo 409 travel -->
    </body>
</html>