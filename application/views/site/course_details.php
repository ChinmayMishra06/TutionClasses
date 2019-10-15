<?php defined('BASEPATH') OR exit("No direct script access allowed."); ?>
    <!--================ Start Course Details Area =================-->
    <section class="course_details_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 course_details_left">
                    <h2><?php echo $course[0]['course_name']; ?></h2>
                    <div class="main_image">
                        <img class="img-thumbnail" src="<?php echo base_url('public/uploads/institute/images/'.$course[0]['banner_image']); ?>" alt="<?php echo $course[0]['banner_image']; ?>">
                        <img src="<?php echo base_url('public/uploads/institute/images/'. $course[0]['logo_image']); ?>" class="detail-circle" alt="<?php echo $course[0]['logo_image']; ?>">
                    </div>
                    <div class="content_wrapper">
                        <h4 class="title_top">Description</h4>
                        <div class="content"><?php echo $course[0]['description']; ?></div>
                    </div>
                </div>


                <div class="col-lg-4 right-contents">
                    <div class="sidebar_top">
                        <ul>
                            <li>
                                <a class="justify-content-between d-flex">
                                    <p>Trainer’s Name</p>
                                    <span><?php echo $course[0]['name']; ?></span>
                                </a>
                            </li>
                            <li>
                                <a class="justify-content-between d-flex">
                                    <p>Course Fee </p>
                                    <span><?php echo $course[0]['fees'] . ' per ' . $course[0]['fees_unit']; ?></span>
                                </a>
                            </li>
                            <li>
                                <a class="justify-content-between d-flex">
                                    <p>Schedule </p>
                                    <span><?php echo $course[0]['duration'] . ' ' . $course[0]['duration_unit']; ?></span>
                                </a>
                            </li>
                            <li>
                                <a class="justify-content-between d-flex">
                                    <p>Start joining date</p>
                                    <span><?php echo  date('d/m/Y', strtotime($course[0]['start_date'])); ?></span>
                                </a>
                            </li>
                            <li>
                                <a class="justify-content-between d-flex">
                                    <p>End joining date</p>
                                    <span><?php echo date('d/m/Y', strtotime($course[0]['end_date'])); ?></span>
                                </a>
                            </li>
                        </ul>
                        <a href="#" class="btn_1 d-block">I am interested</a>
                    </div>

                    <h4 class="title">Reviews</h4>
                    <div class="content">
                        <div class="review-top row pt-40">
                            <div class="col-lg-12">
                                <h6 class="mb-15">Provide Your Rating</h6>
                                <div class="d-flex flex-row reviews justify-content-between">
                                    <span>Quality</span>
                                    <div class="rating">
                                            <a href="#"><img src="<?php echo base_url(); ?>public/site/img/icon/color_star.svg" alt=""></a>
                                            <a href="#"><img src="<?php echo base_url(); ?>public/site/img/icon/color_star.svg" alt=""></a>
                                            <a href="#"><img src="<?php echo base_url(); ?>public/site/img/icon/color_star.svg" alt=""></a>
                                            <a href="#"><img src="<?php echo base_url(); ?>public/site/img/icon/color_star.svg" alt=""></a>
                                            <a href="#"><img src="<?php echo base_url(); ?>public/site/img/icon/star.svg" alt=""></a>
                                        </div>
                                    <span>Outstanding</span>
                                </div>
                                <div class="d-flex flex-row reviews justify-content-between">
                                    <span>Puncuality</span>
                                    <div class="rating">
                                            <a href="#"><img src="<?php echo base_url(); ?>public/site/img/icon/color_star.svg" alt=""></a>
                                            <a href="#"><img src="<?php echo base_url(); ?>public/site/img/icon/color_star.svg" alt=""></a>
                                            <a href="#"><img src="<?php echo base_url(); ?>public/site/img/icon/color_star.svg" alt=""></a>
                                            <a href="#"><img src="<?php echo base_url(); ?>public/site/img/icon/color_star.svg" alt=""></a>
                                            <a href="#"><img src="<?php echo base_url(); ?>public/site/img/icon/star.svg" alt=""></a>
                                        </div>
                                    <span>Outstanding</span>
                                </div>
                                <div class="d-flex flex-row reviews justify-content-between">
                                    <span>Quality</span>
                                    <div class="rating">
                                            <a href="#"><img src="<?php echo base_url(); ?>public/site/img/icon/color_star.svg" alt=""></a>
                                            <a href="#"><img src="<?php echo base_url(); ?>public/site/img/icon/color_star.svg" alt=""></a>
                                            <a href="#"><img src="<?php echo base_url(); ?>public/site/img/icon/color_star.svg" alt=""></a>
                                            <a href="#"><img src="<?php echo base_url(); ?>public/site/img/icon/color_star.svg" alt=""></a>
                                            <a href="#"><img src="<?php echo base_url(); ?>public/site/img/icon/star.svg" alt=""></a>
                                        </div>
                                    <span>Outstanding</span>
                                </div>

                            </div>
                        </div>
                        <div class="feedeback">
                            <h6>Your Feedback</h6>
                            <textarea name="feedback" class="form-control" cols="10" rows="10"></textarea>
                            <div class="mt-10 text-right">
                                <a href="#" class="btn_1">Read more</a>
                            </div>
                        </div>
                        <div class="comments-area mb-30">
                            <div class="comment-list">
                                <div class="single-comment single-reviews justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="<?php echo base_url(); ?>public/site/img/cource/cource_1.png" alt="">
                                        </div>
                                        <div class="desc">
                                            <h5><a href="#">Emilly Blunt</a>
                                            </h5>
                                            <div class="rating">
                                                <a href="#"><img src="<?php echo base_url(); ?>public/site/img/icon/color_star.svg" alt=""></a>
                                                <a href="#"><img src="<?php echo base_url(); ?>public/site/img/icon/color_star.svg" alt=""></a>
                                                <a href="#"><img src="<?php echo base_url(); ?>public/site/img/icon/color_star.svg" alt=""></a>
                                                <a href="#"><img src="<?php echo base_url(); ?>public/site/img/icon/color_star.svg" alt=""></a>
                                                <a href="#"><img src="<?php echo base_url(); ?>public/site/img/icon/star.svg" alt=""></a>
                                            </div>
                                            <p class="comment">
                                                Blessed made of meat doesn't lights doesn't was dominion and sea earth
                                                form
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="comment-list">
                                <div class="single-comment single-reviews justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="<?php echo base_url(); ?>public/site/img/cource/cource_2.png" alt="">
                                        </div>
                                        <div class="desc">
                                            <h5><a href="#">Elsie Cunningham</a>
                                            </h5>
                                            <div class="rating">
                                                <a href="#"><img src="<?php echo base_url(); ?>public/site/img/icon/color_star.svg" alt=""></a>
                                                <a href="#"><img src="<?php echo base_url(); ?>public/site/img/icon/color_star.svg" alt=""></a>
                                                <a href="#"><img src="<?php echo base_url(); ?>public/site/img/icon/color_star.svg" alt=""></a>
                                                <a href="#"><img src="<?php echo base_url(); ?>public/site/img/icon/color_star.svg" alt=""></a>
                                                <a href="#"><img src="<?php echo base_url(); ?>public/site/img/icon/star.svg" alt=""></a>
                                            </div>
                                            <p class="comment">
                                                Blessed made of meat doesn't lights doesn't was dominion and sea earth
                                                form
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="comment-list">
                                <div class="single-comment single-reviews justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="<?php echo base_url(); ?>public/site/img/cource/cource_3.png" alt="">
                                        </div>
                                        <div class="desc">
                                            <h5><a href="#">Maria Luna</a>
                                            </h5>
                                            <div class="rating">
                                                <a href="#"><img src="<?php echo base_url(); ?>public/site/img/icon/color_star.svg" alt=""></a>
                                                <a href="#"><img src="<?php echo base_url(); ?>public/site/img/icon/color_star.svg" alt=""></a>
                                                <a href="#"><img src="<?php echo base_url(); ?>public/site/img/icon/color_star.svg" alt=""></a>
                                                <a href="#"><img src="<?php echo base_url(); ?>public/site/img/icon/color_star.svg" alt=""></a>
                                                <a href="#"><img src="<?php echo base_url(); ?>public/site/img/icon/star.svg" alt=""></a>
                                            </div>
                                            <p class="comment">
                                                Blessed made of meat doesn't lights doesn't was dominion and sea earth
                                                form
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Course Details Area =================-->