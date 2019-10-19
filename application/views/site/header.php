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

            .home-circle{
                width: 50px;
                height: 50px;
                border-radius: 50%;
                border: 7px solid white;
                box-shadow: 2px 2px 5px gray;
                margin-top: -10%;
                margin-left: 3%;
            }

            .detail-circle{
                width: 80px;
                height: 80px;
                border-radius: 50%;
                border: 7px solid white;
                box-shadow: 2px 2px 5px gray;
                margin-top: -6%;
            }

            /* cover the body. */
            .cover{
                background-color: rgba(0, 0, 0, 0.4);
                z-index: 1;
                height: 100%;
                width: 100%;
            }

            .login_panel{ z-index: 3; }

            /*button style*/
            .hide_btn{
                float: right;
                background: #f0ad4e;
                border: none;
                font-size: 20px;
                color: white;
            }

            .star{
                cursor:pointer;
            }

        </style>
    </head>
    <body>
        <header class="main_menu home_menu">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand" href="<?php echo base_url(); ?>"> <img src="<?php echo base_url(); ?>public/site/img/TutionClasses.png" alt="logo" style="border-radius:50px;"> </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse main-menu-item justify-content-end" id="navbarSupportedContent">
                                <ul class="navbar-nav align-items-center">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="<?php echo base_url();?>">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('courses');?>">Courses</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('contact');?>">Contact</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('about');?>">About</a>
                                    </li>
                                    <?php if(!$this->session->userdata('student_login')){ ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo base_url('login'); ?>">Login</a>
                                        </li>                                    
                                    <?php } else{  ?>                                    
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('student_login'); ?></a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">                                            
                                                <a class="dropdown-item" href="<?php echo base_url('profile');?>">Profile</a>
                                                <a class="dropdown-item" href="<?php echo base_url('logout');?>">Logout</a>
                                            </div>
                                        </li>
                                    <?php } ?>
                                    <li class="nav-item">
                                        <form action="<?php echo base_url(); ?>home" method="post">
                                            <div class="input-group pt-1">
                                                <input type="text" class="form-control myTextBox" name="searchItem" id="searchItem" placeholder="Search here..." aria-label="Search here..." aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                    <button type="submit" class="input-group-text" style="background-color:#ee390f;" id="btnSearch" name="btnSearch"><i class="fa fa-search text-white"></i></button>
                                                </div>
                                            </div>
                                            <?php if(validation_errors()) echo form_error('searchItem'); ?>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>