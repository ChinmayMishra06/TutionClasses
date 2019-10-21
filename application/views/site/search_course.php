<?php defined('BASEPATH') OR exit("No direct script access allowed."); ?>
    <?php //echo "<pre>"; print_r($courses); die(); 
    if(isset($courses) && is_array($courses)){ ?>
        <!--::review_part start::-->
        <section class="special_cource padding_top" id="search_course">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5">
                        <div class="section_tittle text-center">
                            <h2>Your searched result</h2>
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
                                            <?php if($category['category_id'] != $this->input->get('category')){?>
                                                <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?></option>
                                            <?php
                                            }else{?>
                                                <option selected value="<?php echo $category['category_id'] ?>" ><?php echo $category['category_name'] ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                                </li>
                            <?php } ?>
                            <?php if(isset($durations) && is_array($durations)){ ?>
                                <li class="btn col-md-3 col-lg-2">
                                    <select class="form-control" name="duration">
                                        <option value="">Duration</option> 
                                        <?php foreach($durations as $category){ ?>
                                            <?php if($category['category_id'] != $this->input->get('duration')){?>
                                                <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?></option>
                                            <?php
                                            }else{?>
                                                <option selected value="<?php echo $category['category_id'] ?>" ><?php echo $category['category_name'] ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                                </li>
                            <?php } ?>
                                <li class="btn col-md-3 col-lg-2">
                                    <?php if(!empty($this->input->get('price'))){?>
                                        <input type="text" class="form-control" name="price" id="price" placeholder="Price" value="<?php echo $this->input->get('price'); ?>">
                                    <?php }else{?>
                                        <input type="text" class="form-control" name="price" id="price" placeholder="Price">
                                    <?php } ?>
                                </li>
                                <button class="btn_1" type="submit" name="btnApply">Apply</button>
                            </ul>
                        </form>
                    </div>
                </div>                
                <div class="row">
                    <?php foreach($courses as $course){ ?>
                        <div class="col-sm-6 col-lg-4 all_course" style="margin-top: 28px;">
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
    <?php }else{ ?>
        <section class="special_cource padding_top" id="search_course">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5">
                        <div class="section_tittle text-center">
                            <h2>Your searched result</h2>
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
                                            <?php if($category['category_id'] != $this->input->get('category')){?>
                                                <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?></option>
                                            <?php
                                            }else{?>
                                                <option selected value="<?php echo $category['category_id'] ?>" ><?php echo $category['category_name'] ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                                </li>
                            <?php } ?>
                            <?php if(isset($durations) && is_array($durations)){ ?>
                                <li class="btn col-md-3 col-lg-2">
                                    <select class="form-control" name="duration">
                                        <option value="">Duration</option> 
                                        <?php foreach($durations as $category){ ?>
                                            <?php if($category['category_id'] != $this->input->get('duration')){?>
                                                <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?></option>
                                            <?php
                                            }else{?>
                                                <option selected value="<?php echo $category['category_id'] ?>" ><?php echo $category['category_name']; ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                                </li>
                            <?php } ?>
                                <li class="btn col-md-3 col-lg-2">
                                    <?php if(!empty($this->input->get('price'))){?>
                                        <input type="text" class="form-control" name="price" id="price" placeholder="Price" value="<?php echo $this->input->get('price'); ?>">
                                    <?php }else{?>
                                        <input type="text" class="form-control" name="price" id="price" placeholder="Price">
                                    <?php } ?>
                                </li>
                                <button class="btn_1" type="submit" name="btnApply">Apply</button>
                            </ul>
                        </form>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-5">
                        <div class="section_tittle text-center">
                            <h2>No data found</h2>
                        </div>
                    </div>
                </div>
            </div><br>
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