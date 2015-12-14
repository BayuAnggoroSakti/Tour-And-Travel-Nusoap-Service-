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

<?php

if (isset($_POST['hapus_id_promo'])) {

    $id_promo = $_POST['hapus_id_promo'];

    require_once('../lib/nusoap.php');
    $client = new nusoap_client('http://localhost/prak_sit_travel/service/service_promo.php');
    // proses call method 'search' dengan parameter key di script server.php yang ada di server A
    $result = $client->call('hapus_promo', array('id_promo' => $id_promo));

    if ($result == true)
    {

        echo '<script> alert("Record has been successfully deleted"); window.location.replace("promo.php");</script>';

    } else {

        echo '<script> alert("Failed, record has not been deleted"); window.location.replace("");</script>';

    }

/*header("Location: {$_SERVER['HTTP_REFERER']}");*/

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
                            <li class="new-ads" ><a href="promo.php" class="btn btn-ads btn-block">Promo</a></li>
                            <li><a href="booking.php">Booking</a></li>
                            <li><a href="testimonial.php">Testimonial</a></li>
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
                                    <h3>Promo</h3>
                                </div>
                           
                                <div class="widget-header">
                                </div>           
                                
                                <div class="panel-body">

                                    <form>
                                        
                                    
                                        <div class="col-sm-12 login-form">
                                         <div class="before-table">
                                                <div class="row">
                                                    <div class="col-xs-9">
                                                        <a href="tambah_promo.php" class="btn btn-custom">ADD DATA</a>
                                                    </div>
                                                   
                                                </div>
                                         </div>
                                        <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th><center>Nama promo</center></th>
                                                <th><center>Isi promo</center></th>
                                                <th><center>Tanggal Mulai</center></th>
                                                <th><center>Tanggal Selesai</center></th>
                                                <th><center>Gambar</center></th>
                                                <th><center>Action</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php
                                                    require_once('../lib/nusoap.php');
                                                    $client = new nusoap_client('http://localhost/prak_sit_travel/service/service_promo.php');
                                                 

                                                        $result = $client->call('promo', array());

                                                    if (is_array($result))
                                                    {
                                                        
                                                        foreach($result as $data)
                                                        {

                                                            //echo "".$data['nama_stasiun'];
                                                            $id_promo = $data['id_promo'];
                                                            $nama = $data['nama'];
                                                            $disi = $data['isi'];
                                                            $isi = substr($disi, 0, 50);
                                                            $tanggal_awal = $data['tanggal_awal'];
                                                            $tanggal_akhir = $data['tanggal_akhir'];
                                                            $gambar = $data['gambar'];
                                                        
        

                                                ?>

                                            <tr>
                                                <td>
                                                    <div class="item-title"><a  target="_blank"><strong><?php echo $nama; ?></strong></a></div>
                                                </td>
                                                <td><center><?php echo $isi; ?></center></td>
                                                <td><center><?php echo $tanggal_awal; ?></center></td>
                                                <td><center><?php echo $tanggal_akhir; ?></center></td>
                                             <td><center><img src="images/<?php echo $gambar; ?>" width="100px" height="100px"></center></td>
                                                <td>
                                                    <div class="row">
                                                    <center>
                                                        <div class="col-xs-12">
                                                            <form action='edit_promo.php' method='post'>
                                                                <button id='submit' type='submit' name="id_promo" value="<?php echo $id_promo; ?>" class="btn btn-block label-warning"><font color="white">edit</font></button>
                                                            </form>
                                                            <form action='' method='post'>
                                                                <button id='submit' type='submit' name="hapus_id_promo" value="<?php echo $id_promo; ?>" class="btn btn-block label-danger" onclick="return confirm('Delete this item?')"><font color="white">delete</font></button>
                                                            </form>
                                                     
                                                    </center>
                                                    </div>
                                                </td>
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
