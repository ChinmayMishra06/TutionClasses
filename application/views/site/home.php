<?php defined('BASEPATH') OR exit("No direct script access allowed."); ?>    
    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-xl-6">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h5>Best teaching, decides your future.</h5>
                            <h1>Get your desire education with TutionClasses</h1>
                            <p>With <b><a href="<?php echo base_url();?>">TuitionClasses</a></b> you can get a best teacher near your home place.
                                And you can make your future bright.
                                All the Best.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->

    <!-- feature_part start-->
    <section class="feature_part">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xl-3 align-self-center">
                    <div class="single_feature_text ">
                        <h2>Awesome <br> Feature</h2>
                        <p>Set have great you male grass yielding an yielding first their you're
                            have called the abundantly fruit were man </p>
                        <a href="#" class="btn_1">Read More</a>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-layers"></i></span>
                            <h4>Better Future</h4>
                            <p>Set have great you male grasses yielding yielding first their to
                                called deep abundantly Set have great you male</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-new-window"></i></span>
                            <h4>Qualified Trainers</h4>
                            <p>Set have great you male grasses yielding yielding first their to called
                                deep abundantly Set have great you male</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part single_feature_part_2">
                            <span class="single_service_icon style_icon"><i class="ti-light-bulb"></i></span>
                            <h4>Job Oppurtunity</h4>
                            <p>Set have great you male grasses yielding yielding first their to called deep
                                abundantly Set have great you male</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- upcoming_event part start-->

    <!-- learning part start-->
    <section class="learning_part">
        <div class="container">
            <div class="row align-items-sm-center align-items-lg-stretch">
                <div class="col-md-7 col-lg-7">
                    <div class="learning_img">
                        <img src="<?php echo base_url(); ?>public/site/img/learning_img.png" alt="">
                    </div>
                </div>
                <div class="col-md-5 col-lg-5">
                    <div class="learning_member_text">
                        <h5>About us</h5>
                        <h2>Learning with Love
                            and Laughter</h2>
                        <p>Fifth saying upon divide divide rule for deep their female all hath brind Days and beast
                            greater grass signs abundantly have greater also
                            days years under brought moveth.</p>
                        <ul>
                            <li><span class="ti-pencil-alt"></span>Him lights given i heaven second yielding seas
                                gathered wear</li>
                            <li><span class="ti-ruler-pencil"></span>Fly female them whales fly them day deep given
                                night.</li>
                        </ul>
                        <a href="#" class="btn_1">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- learning part end-->

    <!-- member_counter counter start -->
    <section class="member_counter">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single_member_counter">
                        <span class="counter"><?php echo $allTeachers; ?></span>
                        <h4>Teachers/Institutes</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_member_counter">
                        <span class="counter"><?php echo $allStudents; ?></span>
                        <h4>Students</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_member_counter">
                        <span class="counter"><?php echo $allCourses; ?></span>
                        <h4>Courses</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_member_counter">
                        <span class="counter"><?php echo  $allSubscribers; ?></span>
                        <h4>Subscribers</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- member_counter counter end -->

    <!--::review_part start::-->
    <section class="special_cource padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <p>popular courses</p>
                        <h2>Special Courses</h2>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-bottom: 5%;">
                <div class="col-sm-12">
                    <div class="controls text-center">
                        <a href="" class="filter btn btn_1">All</a>
                        <a href="" class="filter btn btn_1">Category</a>
                        <a href="" class="filter btn btn_1">Duration</a>
                        <a href="" class="filter btn btn_1">Price</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach($courses as $course){ ?>
                    <div class="col-sm-6 col-lg-4 mt-4">
                        <div class="single_special_cource">
                            <img src="<?php echo base_url('public/uploads/institute/images/'. $course['banner_image']); ?>" height="100px;" width="400px;" class="special_img" alt="<?php echo $course['banner_image']; ?>">
                            <img src="<?php echo base_url('public/uploads/institute/images/'. $course['logo_image']); ?>" class="home-circle" alt="<?php echo $course['logo_image']; ?>">
                            <div class="special_cource_text">
                                <a href="<?php echo base_url('courseDetails/'. $course['course_id']);?>" class="btn_4"><?php echo $course['category_name']; ?></a>
                                <h4><?php echo $course['fees']; ?></h4>
                                <a href="<?php echo base_url('courseDetails/'. $course['course_id']);?>"><h3><?php echo $course['course_name']; ?></h3></a>
                                <p><?php echo substr($course['description'], 0, 40); ?></p>
                                <a href="<?php echo base_url('courseDetails/' . $course['course_id']); ?>">(Read more...)</a>
                                <div class="author_info">
                                    <div>
                                        <img src="<?php echo base_url('public/uploads/institute/images/'. $course['image']); ?>" alt="<?php echo $course['image']; ?>" height="50px;" width="50px;" style="border-radius:50%;">
                                        <div class="author_info_text">
                                            <p>Conduct by:</p>
                                            <h5><a class="text-primary"><?php echo $course['name']; ?></a></h5>
                                        </div>
                                    </div>
                                    <div class="author_rating">
                                        <div class="rating">
                                            <a href="#"><img src="<?php echo base_url(); ?>public/site/img/icon/color_star.svg" alt=""></a>
                                            <a href="#"><img src="<?php echo base_url(); ?>public/site/img/icon/color_star.svg" alt=""></a>
                                            <a href="#"><img src="<?php echo base_url(); ?>public/site/img/icon/color_star.svg" alt=""></a>
                                            <a href="#"><img src="<?php echo base_url(); ?>public/site/img/icon/color_star.svg" alt=""></a>
                                            <a href="#"><img src="<?php echo base_url(); ?>public/site/img/icon/star.svg" alt=""></a>
                                        </div>
                                        <p>3.8 Ratings</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php echo $this->pagination->create_links();?>
        </div>
    </section>
    <!--::blog_part end::-->

    <!-- learning part start-->
    <section class="advance_feature learning_part">
        <div class="container">
            <div class="row align-items-sm-center align-items-xl-stretch">
                <div class="col-md-6 col-lg-6">
                    <div class="learning_member_text">
                        <h5>Advance feature</h5>
                        <h2>Our Advance Educator
                            Learning System</h2>
                        <p>Fifth saying upon divide divide rule for deep their female all hath brind mid Days
                            and beast greater grass signs abundantly have greater also use over face earth
                            days years under brought moveth she star</p>
                        <div class="row">
                            <div class="col-sm-6 col-md-12 col-lg-6">
                                <div class="learning_member_text_iner">
                                    <span class="ti-pencil-alt"></span>
                                    <h4>Learn Anywhere</h4>
                                    <p>There earth face earth behold she star so made void two given and also our</p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-12 col-lg-6">
                                <div class="learning_member_text_iner">
                                    <span class="ti-stamp"></span>
                                    <h4>Expert Teacher</h4>
                                    <p>There earth face earth behold she star so made void two given and also our</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="learning_img">
                        <img src="<?php echo base_url(); ?>public/site/img/advance_feature_img.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- learning part end-->

    <!--::review_part start::-->
    <?php if(isset($happyFeedbacks) && is_array($happyFeedbacks)){ ?>
        <section class="testimonial_part section_padding">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-5">
                        <div class="section_tittle text-center">
                            <h2>Happy Students</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="textimonial_iner owl-carousel">
                        <?php
                            $count = 0;
                            for($i=0; $i<count($happyFeedbacks); $i++){ ?>
                            <div class="testimonial_slider">
                                <div class="row">
                                    <?php for($j=0; $j<2; $j++){
                                        $count = $i + $j;
                                        if($count == count($happyFeedbacks))
                                            $count = 0; 
                                    ?>
                                    <div class="col-lg-8 col-xl-4 col-sm-8 align-self-center">
                                        <div class="testimonial_slider_text">
                                            <p><?php echo $happyFeedbacks[$count]['description']; ?></p>
                                            <h4><?php echo $happyFeedbacks[$count]['name']; ?></h4>
                                            <h5><?php echo $happyFeedbacks[$count]['course_name']; ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-xl-2 col-sm-4">
                                        <div class="testimonial_slider_img">
                                            <img src="<?php echo base_url('public/uploads/institute/images/'. $happyFeedbacks[$count]['image']); ?>" alt="<?php echo $happyFeedbacks[$count]['image']; ?>">
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
    <!--::blog_part end::-->

    <!--::blog_part start::-->
    <section class="blog_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <p>Our Blog</p>
                        <h2>Students Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-4 col-xl-4">
                    <div class="single-home-blog">
                        <div class="card">
                            <img src="<?php echo base_url(); ?>public/site/img/blog/blog_1.png" class="card-img-top" alt="blog">
                            <div class="card-body">
                                <a href="#" class="btn_4">Design</a>
                                <a href="blog.html">
                                    <h5 class="card-title">Dry beginning sea over tree</h5>
                                </a>
                                <p>Which whose darkness saying were life unto fish wherein all fish of together called</p>
                                <ul>
                                    <li> <span class="ti-comments"></span>2 Comments</li>
                                    <li> <span class="ti-heart"></span>2k Like</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-4">
                    <div class="single-home-blog">
                        <div class="card">
                            <img src="<?php echo base_url(); ?>public/site/img/blog/blog_2.png" class="card-img-top" alt="blog">
                            <div class="card-body">
                                <a href="#" class="btn_4">Developing</a>
                                <a href="blog.html">
                                    <h5 class="card-title">All beginning air two likeness</h5>
                                </a>
                                <p>Which whose darkness saying were life unto fish wherein all fish of together called</p>
                                <ul>
                                    <li> <span class="ti-comments"></span>2 Comments</li>
                                    <li> <span class="ti-heart"></span>2k Like</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-4">
                    <div class="single-home-blog">
                        <div class="card">
                            <img src="<?php echo base_url(); ?>public/site/img/blog/blog_3.png" class="card-img-top" alt="blog">
                            <div class="card-body">
                                <a href="#" class="btn_4">Design</a>
                                <a href="blog.html">
                                    <h5 class="card-title">Form day seasons sea hand</h5>
                                </a>
                                <p>Which whose darkness saying were life unto fish wherein all fish of together called</p>
                                <ul>
                                    <li> <span class="ti-comments"></span>2 Comments</li>
                                    <li> <span class="ti-heart"></span>2k Like</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::blog_part end::-->