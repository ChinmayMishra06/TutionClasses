<?php defined('BASEPATH') OR exit("No direct script access allowed."); ?>    
    
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php echo isset($title)? $title : "Tution Classes" ; ?></title>
        <link rel="icon" href="<?php echo base_url(); ?>public/site/img/favicon.png">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/site/css/bootstrap.min.css">
        <!-- animate CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/site/css/animate.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/font-awesome.min.css">
        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/site/css/owl.carousel.min.css">
        <!-- themify CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/site/css/themify-icons.css">
        <!-- flaticon CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/site/css/flaticon.css">
        <!-- font awesome CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/site/css/magnific-popup.css">
        <!-- swiper CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/site/css/slick.css">
        <!-- style CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/site/css/style.css">
        
        <title>Enquriry</title>
        <style>
            body{
                height: 880px;
                position: relative;
                overflow: hidden;
                background-image: url(<?php echo base_url(); ?>public/site/img/enquiry.png);
                background-repeat: no-repeat;
                background-size: 68%;
                background-position: top right;
            }
        </style>
    </head>
    <body>
        <div class="row">
            <div class="offset-sm-3 col-sm-6">
                <h1 class="title text-center mt-5">
                    Your request has been sent to teacher. Related teacher will contact you soon.
                </h1>
            </div>
        </div>
        
        <!-- jquery plugins here-->
        <!-- jquery -->
        <script src="<?php echo base_url(); ?>public/site/js/jquery-1.12.1.min.js"></script>
        <!-- popper js -->
        <script src="<?php echo base_url(); ?>public/site/js/popper.min.js"></script>
        <!-- bootstrap js -->
        <script src="<?php echo base_url(); ?>public/site/js/bootstrap.min.js"></script>
        <!-- easing js -->
        <script src="<?php echo base_url(); ?>public/site/js/jquery.magnific-popup.js"></script>
        <!-- swiper js -->
        <script src="<?php echo base_url(); ?>public/site/js/swiper.min.js"></script>
        <!-- swiper js -->
        <script src="<?php echo base_url(); ?>public/site/js/masonry.pkgd.js"></script>
        <!-- particles js -->
        <script src="<?php echo base_url(); ?>public/site/js/owl.carousel.min.js"></script>
        <script src="<?php echo base_url(); ?>public/site/js/jquery.nice-select.min.js"></script>
        <!-- swiper js -->
        <script src="<?php echo base_url(); ?>public/site/js/slick.min.js"></script>
        <script src="<?php echo base_url(); ?>public/site/js/jquery.counterup.min.js"></script>
        <script src="<?php echo base_url(); ?>public/site/js/waypoints.min.js"></script>
        <!-- custom js -->
        <script src="<?php echo base_url(); ?>public/site/js/custom.js"></script>
        <script type="text/javascript">
             window.setTimeout(function(){
                window.location.href = "http://127.0.0.1/tutionclasses/home";
            }, 5000);
        </script>
    </body>
</html>