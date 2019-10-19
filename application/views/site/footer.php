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
                                <form id="subscribeForm">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
                                            <div class="input-group-append">
                                                <button class="btn btn_1" name="btnSubscribe" type="submit" style="width:85px;">Subscribe</button>
                                            </div>
                                        </div>
                                        <?php if(validation_errors()) echo form_error('email'); ?>
                                    </div>
                                    <div id="status_message"></div>
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
                                <p><span> Email : <a href="mailto:info@tutionclasses.com" target="_top"><span>( info@tutionclasses.com )</span></a></p>
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
        <script src="<?php echo base_url(); ?>public/site/js/custom.js"></script>
        <script>
            "use strict";
            let subscribeForm = document.getElementById("subscribeForm");
            subscribeForm.addEventListener("submit", function(e){
                e.preventDefault();
                // // Creating object
                let req = new XMLHttpRequest();

                console.log(new FormData(subscribeForm));
                // Creating ajax request
                req.open("post", "<?php echo base_url()?>subscribe");
                req.send(new FormData(subscribeForm));

                // Getting response
                req.onreadystatechange = function(){
                    if((req.readyState == 4) && (req.status == 200)){
                        let response = JSON.parse(req.responseText);
                        console.log(response);
                        
                        let message_print = document.getElementById("status_message");
                        
                        message_print.innerHTML = "";
                        if(response.footer_message != undefined){
                            let div_message = document.createElement('div');                    
                            let close_button = document.createElement('button');

                            close_button.className = "close";
                            close_button.setAttribute("data-dismiss", "alert");
                            close_button.innerHTML="&times;";
                            div_message.insertAdjacentText('afterbegin', response.footer_message);
                            div_message.appendChild(close_button);
                            if(response.footer_status == "success"){                   
                                div_message.className = "alert alert-success";
                                message_print.appendChild(div_message);
                                contactForm.name.value = "";
                                contactForm.email.value = "";
                                contactForm.message.value = "";
                            }else{
                                div_message.className = "alert alert-danger";
                                message_print.appendChild(div_message);
                            }
                        }
                        if(response.validation_errors != undefined){
                            message_print.innerHTML = response.validation_errors;
                        }
                    }
                }      
            });
        </script>
    </body>
</html>