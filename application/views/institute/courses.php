<?php defined('BASEPATH') OR exit("No direct script access allowed."); ?>
<div class="nav-tabs-custom">
    <a class="btn btn-primary pull-right" style="margin:10px;" href="<?php echo base_url('institute/courses/add'); ?>">Add New Course</a>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="false">Courses</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="timeline">
            <?php foreach($courses as $course){ ?>
            <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                    <!-- timeline time label -->
                    <li class="time-label">
                        <span class="bg-red">
                            <?php
                                $currentDate = date('Y-m-d');
                                if($currentDate <= $course['end_date']){
                                    echo "Upcoming";
                                }else{
                                    echo "Active";
                                }
                            ?>
                        </span>
                    </li>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li>

                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> <?php echo date('d/m/Y', strtotime($course['created_at'])); ?> </span>
                        <h3 class="timeline-header">
                        <a href="<?php echo base_url('institute/courses/details/'.$course['course_id']); ?>" class="lead"><?php echo $course['course_name']?></a> <span class="small"> <?php echo " by ". $course['name']; ?></span></h3>
                        <div class="timeline-body"><?php echo $course['description']; ?></div>
                        <div class="timeline-footer">
                            <a class="btn btn-primary btn-xs" href="<?php echo base_url('institute/courses/edit/'.$course['course_id']); ?>">Edit</a>
                        </div>
                    </div>
                    </li>
                    <!-- END timeline item -->
                </ul>
            <?php } ?>
        </div>
    </div>
    <!-- /.tab-content -->
</div>