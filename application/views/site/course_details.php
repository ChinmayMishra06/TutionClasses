<?php defined('BASEPATH') OR exit("No direct script access allowed."); ?>
    <!--================ Start Course Details Area =================-->
    <section class="course_details_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 course_details_left">
                    <h2><?php echo $course[0]['course_name']; ?></h2>
                    <div class="main_image">
                        <img class="img-thumbnail" src="<?php echo base_url('public/uploads/institute/images/'.$course[0]['banner_image']); ?>" alt="<?php echo $course[0]['banner_image']; ?>" width="400%;">
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
                                    <span><?php echo $course[0]['fees'] . ' per ' . $course[0]['fees_name']; ?></span>
                                </a>
                            </li>
                            <li>
                                <a class="justify-content-between d-flex">
                                    <p>Schedule </p>
                                    <span>
                                        <?php
                                            if($course[0]['duration'] > 1){
                                                echo $course[0]['duration'] . ' ' . $course[0]['duration_name'] . 's';
                                            }else{                                                
                                                echo $course[0]['duration'] . ' ' . $course[0]['duration_name'];
                                            }
                                        ?>
                                    </span>
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
                        <form action="<?php echo base_url('enquiry'); ?>" method="post">
                            <input type="hidden" name="course_id" value="<?php echo $course[0]['course_id']; ?>">
                            <div class="btn_1 d-block"><input type="submit" class="btn text-white" value="I am interested"></div>
                        </form>
                    </div>

                    <!-- <h4 class="title">Feedback</h4> --><br>
                        <?php if($this->session->flashdata('message')){ ?>
                            <div class="alert alert-<?php echo $this->session->flashdata('status'); ?>" data-dismiss="alert">
                                <?php echo $this->session->flashdata('message'); ?>
                                <button class="close">&times;</button>
                            </div>
                        <?php } ?> 
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#feedback" data-toggle="tab">Feedback</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#report" data-toggle="tab">Report</a>
                            </li>
                        </ul>
                        <div class="mt-2">
                            <div class="tab-content">
                                <div id="feedback" class="tab-pane active">
                                    <h3>Feedback</h3>
                                    <form action="" method="post">
                                        <div class="content">
                                            <div class="review-top row pt-40">
                                                <div class="col-lg-12">
                                                    <h6 class="mb-15">Provide Your Rating</h6>
                                                    <div class="d-flex flex-row reviews justify-content-between">
                                                        <span>Quality</span>
                                                        <?php if(($this->session->userdata('student_login')) && is_array($userFeedbacks)){ ?>
                                                            <input type="hidden" name="rating" value="<?php echo $userFeedbacks[0]['rating']; ?>" id="rating">
                                                        <?php } else{ ?>
                                                            <input type="hidden" name="rating" value="0" id="rating">
                                                        <?php } ?>
                                                        <div class="rating">
                                                            <?php if(($this->session->userdata('student_login')) && isset($userFeedbacks)){ ?>
                                                                <?php
                                                                    $feedbackArray = array("Poor", "Fair", "Average", "Good", "Excellent");
                                                                    $count = 0; 
                                                                    for($i=0; $i<$userFeedbacks[0]['rating']; $i++){ ?>
                                                                        <a class="star" id="<?php echo $count+1; ?>" data="<?php echo $feedbackArray[$count]; ?>"><img src="<?php echo base_url(); ?>public/site/img/icon/color_star.svg" alt=""></a>
                                                                    <?php $count++; }
                                                                    for($j=0; $j<(5-$userFeedbacks[0]['rating']); $j++){ ?>
                                                                        <a class="star" id="<?php echo $count+1; ?>" data="<?php echo $feedbackArray[$count]; ?>"><img src="<?php echo base_url(); ?>public/site/img/icon/star.svg" alt=""></a>
                                                                    <?php $count++; } ?>    
                                                            <?php } else{ ?>
                                                                <a class="star" id="1" data="Poor"><img src="<?php echo base_url(); ?>public/site/img/icon/star.svg" alt=""></a>
                                                                <a class="star" id="2" data="Fair"><img src="<?php echo base_url(); ?>public/site/img/icon/star.svg" alt=""></a>
                                                                <a class="star" id="3" data="Average"><img src="<?php echo base_url(); ?>public/site/img/icon/star.svg" alt=""></a>
                                                                <a class="star" id="4" data="Good"><img src="<?php echo base_url(); ?>public/site/img/icon/star.svg" alt=""></a>
                                                                <a class="star" id="5" data="Excellent"><img src="<?php echo base_url(); ?>public/site/img/icon/star.svg" alt=""></a>                                                
                                                            <?php } ?>
                                                        </div>
                                                        <span id="remark">
                                                            <?php if(($this->session->userdata('student_login')) && isset($userFeedbacks) && is_array($userFeedbacks)){
                                                                    if($userFeedbacks[0]['rating'] != 0){
                                                                        echo $feedbackArray[$userFeedbacks[0]['rating']-1];
                                                                    }
                                                            }else{
                                                                echo "Give rating";
                                                            } ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <div class="feedeback mb-4">
                                                <h6>Feedback message</h6>
                                                <textarea name="description" class="form-control" cols="10" rows="10"><?php if(($this->session->userdata('student_login')) && isset($userFeedbacks)){
                                                        echo $userFeedbacks[0]['description']; } ?></textarea>
                                                <div class="mt-10 text-right">
                                                    <input type="submit" class="btn_1" value="Send" name="btnFeedbackAdd">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id="report" class="tab-pane">
                                    <h3>Report</h3>
                                    <form action="" method="post">
                                        <div class="content">
                                            <div class="review-top row pt-40">
                                                <div class="col-lg-12">
                                                    <h6 class="mb-15">Make Report</h6>
                                                </div>
                                            </div>
                                        
                                            <div class="feedeback mb-2">
                                                <h6>Title</h6>
                                                <input type="hidden" name="course_id" value="<?php echo $course[0]['course_id']; ?>">
                                                <input type="text" class="form-control" name="report_title">
                                                <?php if(validation_errors()) echo form_error('title'); ?>

                                                <h6 class="mt-4">Feedback message</h6>
                                                <textarea name="description" class="form-control" cols="10" rows="10"></textarea>
                                                <?php if(validation_errors()) echo form_error('description'); ?>

                                                <div class="mt-6 text-right">
                                                    <input type="submit" class="btn_1" value="Send" name="btnReportAdd">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>                            
                            <h4 class="title">Recent Feedbacks</h4>
                            <?php
                                    if(isset($feedbacks) && is_array($feedbacks)){
                                        $count = 0;
                                        for($i=0; $i<count($feedbacks); $i++){
                                            $count += $feedbacks[$i]['rating'];
                                        }
                                        $count = round(($count/count($feedbacks)), 0); ?>
                                        <p>Overall rating</p>
                                        <?php for($j=1; $j<=$count; $j++){ ?>
                                            <a><img src="<?php echo base_url(); ?>public/site/img/icon/color_star.svg" alt=""></a>
                                        <?php }
                                        for($j=1; $j<=(5-$count); $j++){ ?>
                                            <a><img src="<?php echo base_url(); ?>public/site/img/icon/star.svg" alt=""></a>
                                        <?php } ?> <br><br>
                                <div style="max-height:300px; overflow: auto;">
                                    <?php foreach($feedbacks as $feedback){ ?>
                                    <div class="mt-2 border-bottom">
                                        <div class="comment-list">
                                            <div class="single-comment single-reviews justify-content-between d-flex">
                                                <div class="user justify-content-between d-flex">
                                                    <div class="desc">
                                                        <h5><a href="#"><?php echo $feedback['name']; ?></a></h5>
                                                        <div class="rating">
                                                            <?php
                                                                for($i=1; $i<=$feedback['rating']; $i++){ ?>
                                                                    <a><img src="<?php echo base_url(); ?>public/site/img/icon/color_star.svg" alt=""></a>
                                                                <?php }
                                                                for($j=1; $j<=(5-$feedback['rating']); $j++){ ?>
                                                                    <a><img src="<?php echo base_url(); ?>public/site/img/icon/star.svg" alt=""></a>
                                                                <?php }
                                                            ?>
                                                        </div>
                                                        <p class="comment"><?php echo $feedback['description']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <?php
                                    }else{
                                        echo '<p class="text-info">
                                            If you are satisfy with this course, please provide your feedback to encourage our teacher.
                                        </p>';
                                    }
                                ?>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </section>
    <!--================ End Course Details Area =================-->

    <script type="text/javascript">
        'use strict';
        let allStar = document.getElementsByClassName('star');
        for(let i=0; i<allStar.length; i++){
            document.getElementsByClassName('star')[i].addEventListener('click', function(){
                let j;
                
                document.getElementById('remark').textContent = this.getAttribute('data');
                
                for(j=0; j<parseInt(this.id); j++){
                    document.getElementsByClassName('rating')[0].children[j].children[0].setAttribute('src', '<?php echo base_url(); ?>public/site/img/icon/color_star.svg');
                    document.getElementById('rating').value = this.id;
                }

                for(let k=j; k<allStar.length; k++){
                    document.getElementsByClassName('rating')[0].children[k].children[0].setAttribute('src', '<?php echo base_url(); ?>public/site/img/icon/star.svg');
                }
            });                
        }
    </script>