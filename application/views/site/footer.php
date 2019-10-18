<?php defined('BASEPATH') OR exit("No direct script access allowed."); ?>
        <footer class="footer-area">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-sm-6 col-md-4 col-xl-3">
                        <div class="single-footer-widget footer_1">
                            <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>public/site/img/footer-logo.png" alt="" style="margin-top:-10px; margin-bottom:10px;"> </a>
                            <p>Our goal is that every student satisfy with us.</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-xl-4">
                        <div class="single-footer-widget footer_2">
                            <h4>Newsletter</h4>
                            <p>Stay updated with our latest courses and news with TutionClasses.</p>
                            <!-- < ?php if(isset($subscribed)){ ?>
                                <form action="< ?php echo base_url('unsubscribe'); ?>" method="POST">
                                    < ?php if($this->session->flashdata('message')){ ?>
                                        <div class="alert alert-< ?php echo $this->session->flashdata('status'); ?>" data-dismiss="alert">
                                            < ?php echo $this->session->flashdata('message'); ?>
                                            <button class="close">&times;</button>
                                        </div>
                                    < ?php } ?>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
                                            <div class="input-group-append">
                                                <button class="btn btn_1" name="btnUnsubscribe" type="submit" style="width:85px;">Unsubscribe</button>
                                            </div>
                                        </div>
                                        < ?php if(validation_errors()) echo form_error('email'); ?>
                                    </div>
                                </form>
                            < ?php } else{ ?> -->
                                <form action="<?php echo base_url('subscribe'); ?>" method="POST">
                                    <?php if($this->session->flashdata('footer_message')){ ?>
                                        <div class="alert alert-<?php echo $this->session->flashdata('footer_status'); ?>" data-dismiss="alert">
                                            <?php echo $this->session->flashdata('footer_message'); ?>
                                            <button class="close">&times;</button>
                                        </div>
                                    <?php } ?>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
                                            <div class="input-group-append">
                                                <button class="btn btn_1" name="btnSubscribe" type="submit" style="width:85px;">Subscribe</button>
                                            </div>
                                        </div>
                                        <?php if(validation_errors()) echo form_error('email'); ?>
                                    </div>
                                </form>
                            <!-- < ?php } ?> -->
                            <div class="social_icon">
                                <a href="#"> <i class="ti-facebook"></i> </a>
                                <a href="#"> <i class="ti-twitter-alt"></i> </a>
                                <a href="#"> <i class="ti-instagram"></i> </a>
                                <a href="#"> <i class="ti-skype"></i> </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-md-4">
                        <div class="single-footer-widget footer_2">
                            <h4>Contact us</h4>
                            <div class="contact_info">
                                <p><span> Email : </span>info@tutionclasses.com </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">.
                        <div class="copyright_part_text text-center">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright ©<script>document.write(new Date().getFullYear());</script>-2020 All rights reserved by <i class="ti-book" aria-hidden="true"></i> <a href="<?php echo base_url(); ?>">TutionClasses.com</a>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
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
        <!-- <script src="< ?php echo base_url(); ?>public/site/js/jquery.nice-select.min.js"></script> -->
        <!-- swiper js -->
        <script src="<?php echo base_url(); ?>public/site/js/slick.min.js"></script>
        <script src="<?php echo base_url(); ?>public/site/js/jquery.counterup.min.js"></script>
        <script src="<?php echo base_url(); ?>public/site/js/waypoints.min.js"></script>
        <!-- custom js -->
        <!-- <script src="< ?php echo base_url(); ?>public/site/js/custom.js"></script> -->
    </body>
</html>