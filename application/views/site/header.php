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

        <style>
            .myTextBox:focus{
                outline:none;
                border-color:#ee390f;
                box-shadow:0 0 10px #ee390f;
            }
        </style>
    </head>
    <body>
        <header class="main_menu <?php echo $className; ?>">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand" href="index.html"> <img src="<?php echo base_url(); ?>public/site/img/TutionClasses.png" alt="logo" style="border-radius:50px;"> </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse main-menu-item justify-content-end" id="navbarSupportedContent">
                                <ul class="navbar-nav align-items-center">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="<?php echo base_url('site/home');?>">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('site/courses');?>">Courses</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('site/contact');?>">Contact</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('site/about');?>">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('site/login');?>">Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <form action="#">
                                            <div class="input-group pt-1">
                                                <input type="text" class="form-control myTextBox" placeholder="Search here..." aria-label="Search here..." aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                    <button type="button" class="input-group-text" style="background-color:#ee390f;" id="basic-addon2"><i class="fa fa-search text-white"></i></button type="button">
                                                </div>
                                            </div>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
   