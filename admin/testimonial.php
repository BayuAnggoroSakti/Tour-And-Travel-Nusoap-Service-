<?php
session_start();
if (empty($_SESSION['username'])) {
header("location:../login.php"); // jika belum login, maka dikembalikan ke file form_login.php
}
?>

<?php

if (isset($_GET['logout'])) {

    session_start(); // memulai session
    session_destroy(); // menghapus session
    header("location:../login.php"); // mengambalikan ke form_login.php
}



?>



<!DOCTYPE html>
<!-- saved from url=(0044)http://themes.gie-art.com/dlapak/signup.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="index, follow">
         <title>Travel | Paket Wisata Jogja dan Sekitarnya</title>
        <link rel="stylesheet" href="css/css" type="text/css">
        <!-- Essential styles -->
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="css/font-awesome.css" type="text/css"> 

        <!-- Dlapak styles -->
        <link id="theme_style" type="text/css" href="css/style1.css" rel="stylesheet" media="screen">


        <!-- Favicon -->
        <link href="http://themes.gie-art.com/dlapak/assets/img/favicon.png" rel="icon" type="image/png">

        <!-- Assets -->
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/owl.theme.css">

        <!-- JS Library -->
        <script async="" src="js/analytics.js"></script><script src="../js/jquery.js"></script>

    </head>
    <body>



        <div class="wrapper">
            <header class="navbar navbar-default navbar-fixed-top  navbar-top">
                <div class="container">
                    <div class="navbar-header">
                        <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="index.php" class="navbar-brand"><span class="logo"><i class="fa fa-recycle"></i> Travel</span></a>
                    </div>

                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="index.php">Paket Wisata</a></li>
                            <li  ><a href="promo.php" >Promo</a></li>
                            <li><a href="booking.php">Booking</a></li>
                            <li class="new-ads"><a href="testimonial.php" class="btn btn-ads btn-block">Testimonial</a></li>
                            <li>
                                 <form action="">                       
                                    <CENTER><button type="submit" name="logout" class="btn btn-custom">LOG OUT</button></CENTER>
                                 </form>    
                            </li>  

                        </ul>
                    </div>
                </div>
            </header>
            <section class="main">
                <div class="container">
                  

                    <div class="row">
                        <div class="col-sm-12 login-form">
                            <div class="panel panel-default">
                                <div class="panel-intro text-center">
                                    <!--<h1 class="logo">Info Jadwal Kereta Api Travel</h1>-->
                                    <h3>Testimonial Pelanggan</h3>
                                </div>
                             
                                <div class="widget-header">
                                </div>

              
                                <div class="panel-body">

                                    <form>
                                        
                                       <div class="col-sm-12 login-form">
                                        <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th><center>Nama</center></th>
                                                <th><center>Email</center></th>
                                                <th><center>Isi</center></th>
                                                <th><center>Tanggal</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php
                                                    require_once('../lib/nusoap.php');
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

                                            <tr>
                                                <td>
                                                    <div class="item-title"><a  target="_blank"><strong><?php echo $nama; ?></strong></a></div>
                                                </td>
                                                <td><center><?php echo $email; ?></center></td>
                                                <td><center><?php echo $isi; ?></center></td>
                                                <td><center><?php echo $tanggal; ?></center></td>
                                              
                                            </tr>

                                            <?php

                                                        }
                                                                            }
                                                    
                
                                            
            ?>       



                                        </tbody>
                                    </table>
                                        </div>


                                        
                                         
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="footer">
                <div class="container">
                <ul class="pull-left footer-menu">
                   
                </ul>
                <ul class="pull-right footer-menu">
                    <li> © 2015 Travel </li>
                </ul>
                </div>
            </div>
        </div>
        <!-- Essentials -->
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/owl.carousel.js"></script>
        <script src="../js/jquery.countTo.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {

                // ===========Featured Owl Carousel============
                if ($(".owl-carousel-featured").length > 0) {
                    $(".owl-carousel-featured").owlCarousel({
                        items: 3,
                        lazyLoad: true,
                        pagination: true,
                        autoPlay: 5000,
                        stopOnHover: true
                    });
                }

                // ==================Counter====================
                $('.item-count').countTo({
                    formatter: function (value, options) {
                        return value.toFixed(options.decimals);
                    },
                    onUpdate: function (value) {
                        console.debug(this);
                    },
                    onComplete: function (value) {
                        console.debug(this);
                    }
                });
            });
        </script>
        <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-68907527-1', 'auto');
  ga('send', 'pageview');

</script>
    
 </body></html>
