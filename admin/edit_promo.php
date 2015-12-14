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
    // proses pencarian data
    if (isset($_POST['id_promo']) )
    {
        //if ($_GET['op'] == 'search')
        //{
            $id_promo = $_POST['id_promo'];
            require_once('../lib/nusoap.php');
            $client = new nusoap_client('http://localhost/prak_sit_travel/service/service_promo.php');
            // proses call method 'search' dengan parameter key di script server.php yang ada di server A
            $result = $client->call('detail_promo', array('id_promo' => $id_promo));
            // jika data hasil pencarian ($result) ada, maka tampilkan
            if (is_array($result))
            {

                foreach($result as $data)
                {
                    $id_promo = $data['id_promo'];
                    $nama = $data['nama'];
                    $isi = $data['isi'];
                    $tanggal_awal = $data['tanggal_awal'];
                    $tanggal_akhir = $data['tanggal_akhir'];
                    $gambar = $data['gambar'];
                }
              

            } 
            else {

                    $id_pw = "";
                    $nama = "";
                    $tujuan = "";
                    $durasi = "";
                    $harga = "";
                    $isi = "";
                    $gambar = "";
        
                echo "<p>Data tidak ditemukan</p>";
            }

            //}
    } 
    elseif (isset($_POST['hapus_id_pw'])) {
        # code...
    }
    else {

                    $idjadwal = "";
                    $idkereta = "";
                    $stasiunasal = "";
                    $stasiuntujuan = "";
                    $idstasiunasal = "";
                    $idstasiuntujuan = "";
                    $jamberangkat = "";
                    $jamtiba = "";
                    $tarif = "";



    }

?>




<?php

    require_once('../lib/nusoap.php');
    $client = new nusoap_client('http://localhost/prak_sit_travel/service/service_promo.php');
    // proses call method 'search' dengan parameter key di script server.php yang ada di server A
    if (isset($_POST['submit']))
    {
    	$id_promo = $_POST['id_promo'];
        $nama = $_POST['nama'];
        $tanggal_akhir = $_POST['tanggal_akhir'];
        $tanggal_awal = $_POST['tanggal_awal'];
        $isi = $_POST['isi'];

        $file = $_FILES['gambar']['name'];
        $file_loc = $_FILES['gambar']['tmp_name']; //nama temporrary
        $file_size = $_FILES['gambar']['size'];
        $file_type = $_FILES['gambar']['type'];
        $folder="images/";

        $result = $client->call('edit_promo', array('id_promo' => $id_promo, 'nama' => $nama, 'isi' => $isi, 'tanggal_awal' => $tanggal_awal, 'tanggal_akhir' => $tanggal_akhir, 'gambar' => $file));

        if ($result == true){

            move_uploaded_file($file_loc,$folder.$file);
            echo '<script> alert("Data telah disimpan."); window.location.replace("promo.php");</script>';

        } else {

            echo '<script> alert("Data gagal tersimpan."); window.location.replace("data-kereta.php");</script>';

        }

    } 





?>



<!DOCTYPE html>
<!-- saved from url=(0044)http://themes.gie-art.com/dlapak/signup.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="index, follow">
        <title>Edit Promo Wisata - Travel</title>
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
        <script async="" src="js/analytics.js"></script><script src="js/jquery.js"></script>
        <script async="" src="ckeditor/ckeditor.js"></script>

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
                            <li  class="new-ads"><a href="promo.php" class="btn btn-ads btn-block">Promo</a></li>
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
                        



                        <section class="main no-padding">
                
                <div class="container">

                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            <div class="widget">
                                <div class="widget-header">
                                    <h3>Tambah</h3>
                                </div>
                                <div class="widget-body">
                                      <ul class="author-menus">
                                        <li ><a href="tambah_paket.php" >Tambah Paket</a></li>
                                        <li class="new-ads" ><a href="tambah_promo.php" class="btn btn-ads btn-block" style="color:white">Tambah Promo</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-9">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"> <a href="#collapseB1" data-toggle="collapse"> Edit Promo Wisata </a> </h4>
                                </div>

                                <form action="" accept-charset="utf-8" method="post" enctype="multipart/form-data" id="UserProfileForm" class="form-horizontal">
                                     <div class="form-group" style="display: none;">
                                            <label class="col-sm-3 control-label">ID Kereta</label>
                                            <div class="col-sm-9">
                                                <input type="text" required="required" name="id_promo" value="<?php echo $id_promo; ?>" class="form-control"> </div>           
                                        </div>
                                    <div class="panel-body" > 
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Nama Promo</label>
                                            <div class="col-sm-9">
                                                <input name="nama" type="text" required="required" value="<?php echo $nama; ?>" class="form-control">                                
                                            </div>
                                        </div>   

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Isi Paket </label>
                                            <div class="col-sm-9">
                                                <textarea id="editor1" name="isi">
                                                    <?php echo $isi; ?>
                                                </textarea>
                                                 <script>
                                                    // Replace the <textarea id="editor1"> with a CKEditor
                                                    // instance, using default configuration.
                                                    CKEDITOR.replace( 'editor1' );
                                                </script>
                                            </div>
                                            </label>
                                        </div>  
                                         <div class="form-group">
                                            <label class="col-sm-3 control-label">Tanggal Mulai</label>
                                            <div class="col-sm-9">
                                                <input name="tanggal_awal" type="date" required="required" value="<?php echo $tanggal_awal; ?>" class="form-control">                                
                                            </div>
                                        </div>  
                                         <div class="form-group">
                                            <label class="col-sm-3 control-label">Tanggal Akhir</label>
                                            <div class="col-sm-9">
                                                <input name="tanggal_akhir" type="date" required="required" value="<?php echo $tanggal_akhir; ?>" class="form-control">                                
                                            </div>
                                        </div> 
                                        
                                         <div class="form-group">
                                            <label class="col-sm-3 control-label">Gambar</label>
                                            <div class="col-sm-9">
                                               <img src="images/<?php echo $gambar; ?>" width="100px" height="100px">                               
                                            </div>
                                        </div>    
                                         <div class="form-group">
                                            <label class="col-sm-3 control-label">Upload Gambar Baru</label>
                                            <div class="col-sm-9">
                                              <input type="file" name="gambar" class="form-group" />                             
                                            </div>
                                        </div>          
                                       
                                       
                                            
                                    </div>
                                    <div class="panel-footer">
                                        <div class="row">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button type="submit" name="submit" class="btn btn-custom"><i class="fa fa-save"></i> Save</button>
                                                <button name="cancel" class="btn btn-default"><i class="fa fa-close"></i> Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form> 
                            </div>
                        </div>  
                    </div>
                </div>
            </section>





                    </div>
                </div>
            </section>
            <br/>
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