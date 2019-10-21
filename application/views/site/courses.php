<?php defined('BASEPATH') OR exit("No direct script access allowed."); ?>    
    <?php if(isset($courses) && is_array($courses)){ ?>
        <!--::review_part start::-->
        <section class="special_cource padding_top">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5">
                        <div class="section_tittle text-center">
                            <p>All courses</p>
                            <h2>All Courses</h2>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 3%; margin-top:-25px;">
                    <div class="col-sm-12">                    
                        <form action="<?php echo base_url('filter'); ?>" method="GET">
                            <ul class="text-center">
                            <?php if(isset($categories) && is_array($categories)){ ?>
                                <li class="btn col-md-3 col-lg-2">
                                    <select id="category_list" class="form-control" name="category">
                                        <option value="">Category</option>
                                        <?php foreach($categories as $category){ ?>
                                            <option value="<?php echo $category['category_id'] ?>" ><?php echo $category['category_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </li>
                            <?php } ?>
                            <?php if(isset($durations) && is_array($durations)){ ?>
                                <li class="btn col-md-3 col-lg-2">
                                    <select class="form-control" name="duration">
                                        <option value="">Duration</option> 
                                        <?php foreach($durations as $duration){ ?>
                                            <option value="<?php echo $duration['category_id'] ?>" ><?php echo $duration['category_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </li>
                            <?php } ?>
                                <li class="btn col-md-3 col-lg-2">
                                    <input type="text" class="form-control" name="price" id="price" placeholder="Price">
                                </li>
                                <button class="btn_1" type="submit" name="btnApply">Apply</button>
                            </ul>
                        </form>
                    </div>
                </div>
                
                <div class="row">
                    <?php foreach($courses as $course){ ?>
                        <div class="col-sm-6 col-lg-4  all_course" style="margin-top: 28px;">
                            <div class="single_special_cource">
                                <img src="<?php echo base_url('public/uploads/institute/images/'. $course['banner_image']); ?>" height="100px;" width="400px;" class="special_img" alt="<?php echo $course['banner_image']; ?>">
                                <img src="<?php echo base_url('public/uploads/institute/images/'. $course['logo_image']); ?>" class="home-circle" alt="<?php echo $course['logo_image']; ?>">
                                <div class="special_cource_text">
                                    <a href="<?php echo base_url('courseDetails/'. $course['course_id']);?>" class="btn_4 card_click"><?php echo $course['category_name']; ?></a>
                                    <h4><?php echo $course['fees']; ?></h4>
                                    <a href="<?php echo base_url('courseDetails/'. $course['course_id']);?>"><h3><?php echo $course['course_name']; ?></h3></a>
                                    <p class="text-justify" style="min-height:80px; overflow:hidden;"><?php echo substr($course['description'], 0, 120); ?></p>
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
                                                <?php 
                                                    for($j=1; $j<=$course['avg_rating']; $j++){ ?>
                                                        <a><img src="<?php echo base_url(); ?>public/site/img/icon/color_star.svg" alt=""></a>
                                                    <?php }
                                                    for($j=1; $j<=(5-$course['avg_rating']); $j++){ ?>
                                                        <a><img src="<?php echo base_url(); ?>public/site/img/icon/star.svg" alt=""></a>
                                                <?php } ?>
                                            </div>
                                            <p>
                                                <?php
                                                    if($course['avg_rating'] > 1){ echo $course['avg_rating'] . " Ratings"; }
                                                    else{ echo $course['avg_rating'] . " Rating"; }
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div><br>
                <?php echo $this->pagination->create_links();?>
            </div>
        </section>
        <!--::blog_part end::-->
    <?php } ?>

    <!--::review_part start::-->.    
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
                                for($i=0; $i<count($happyFeedbacks); $i++){
                            ?>
                                <div class="testimonial_slider">
                                    <div class="row">
                                        <?php
                                            for($j=0; $j<2; $j++){
                                                $count = $i + $j;
                                                if($count == count($happyFeedbacks)){
                                                    $count = 0;
                                                }                                                     
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

    <script type="text/javascript">
        'use strict';
        let allCourse = document.getElementsByClassName('all_course');
        for(let i=0; i<allCourse.length; i++){
            allCourse[i].addEventListener('click', function(){
                document.getElementsByClassName('card_click')[i].click();
            });
        }
    </script>