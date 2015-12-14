<?php
session_start();
if (empty($_SESSION['username'])) {

} else {

    header("location:admin/index.php");
}

?>


<?php

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    require_once('lib/nusoap.php');
    $client = new nusoap_client('http://localhost/prak_sit_travel/service/service_login.php');
    // proses call method 'search' dengan parameter key di script server.php yang ada di server A
    $result = $client->call('login', array('username' => $username, 'password' => $password));

    if ($result > 0)
    {

        //echo '<script> alert("Login success !"); window.location.replace("");</script>';
        session_start(); // memulai fungsi session
        $_SESSION['username'] = $username;
        header("location:admin/index.php"); // jika berhasil login, maka masuk ke file home.php

    } else {

        echo '<script> alert("Login failed, Username or password inncorrect !"); window.location.replace("");</script>';

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
        <link rel="stylesheet" href="admin/signup_files/css" type="text/css">
        <!-- Essential styles -->
        <link rel="stylesheet" href="admin/signup_files/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="admin/signup_files/font-awesome.css" type="text/css"> 

        <!-- Dlapak styles -->
        <link id="theme_style" type="text/css" href="admin/signup_files/style1.css" rel="stylesheet" media="screen">


        <!-- Favicon -->
        <link href="http://themes.gie-art.com/dlapak/assets/img/favicon.png" rel="icon" type="image/png">

        <!-- Assets -->
        <link rel="stylesheet" href="admin/signup_files/owl.carousel.css">
        <link rel="stylesheet" href="admin/signup_files/owl.theme.css">

        <!-- JS Library -->
        <script async="" src="admin/signup_files/analytics.js"></script>
        <script src="admin/signup_files/jquery.js"></script>




    </head>
    <body background="arya.png">
        <div class="wrapper">
            
            <section class="main">
                <div class="container">
                    <div class="row">
                        <div class="panel-intro text-center">
                            <!-- <h3 >Sistem Informasi</h3>
                            <h3 >Penjadwalan Kereta Api Travel</h3> -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5 login-form">
                            <div class="panel panel-default">
                                <div class="panel-intro text-center">
                                    <!--<h1 class="logo">Info Jadwal Kereta Api Travel</h1>-->
                                    <!-- <h3>Login</h3> -->
                                    <h3 >Sistem Travel</h3>
                            <h3>Paket Wisata Jogja dan Sekitarnya</h3>
                                </div>
                                <div class="panel-body">
                                    <form action=""  method="post" >
                                        
                                        <div class="form-group">
                                            <h5>Username</h5>
                                        </div>

                                        <div class="form-group">
                                            <input name="username" type="text" placeholder="Username or email" required="required" class="form-control input-login">                                            
                                        </div>

                                        <div class="form-group">
                                            <h5>Password</h5>
                                        </div>

                                        <div class="form-group">
                                            <input name="password" type="password" placeholder="Password" required="required" class="form-control input-login">                                            
                                        </div>

                                        <!--
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label for="terms" class="string optional">
                                                    <input type="checkbox" style="" id="terms">
                                                    I Agree with Term and Conditions
                                                </label>
                                            </div>
                                        </div>
                                        -->
                                        <div class="form-group">
                                            <button id='submit' type='submit' name="submit" class="btn btn-block btn-custom">Login</button>
                                        </div>
                                    </form>
                                 

                                </div>

                                <!--
                                <div class="panel-footer">
                                    <p class="text-center pull-right"> <a href="http://themes.gie-art.com/dlapak/login.html"> Have an account? </a> </p>
                                    <div style=" clear:both"></div>
                                </div>
                                -->

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
        </div>
        <!-- Essentials -->
        <script src="./signup_files/bootstrap.min.js"></script>
        <script src="./signup_files/owl.carousel.js"></script>
        <script src="./signup_files/jquery.countTo.js"></script>
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