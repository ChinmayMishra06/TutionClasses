<?php defined('BASEPATH') OR exit("No direct script access allowed."); ?>
<div class="nav-tabs-custom">
    <a class="btn btn-primary pull-right" style="margin:10px;" href="<?php echo base_url('institute/courses/add'); ?>">Add New Course</a>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="false">Courses</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="timeline">
            <?php 
                if(isset($courses) && is_array($courses)){
                    foreach($courses as $course){
            ?>
                        <!-- The timeline -->
                        <ul class="timeline timeline-inverse">
                            <!-- timeline time label -->
                            <li class="time-label">                                
                                <?php
                                    $currentDate = date('Y-m-d');

                                    if(strtoupper($course['duration_name']) == "WEEK"){
                                        $end_date = date('Y-m-d', strtotime($course['end_date'] . '+ ' . $course['duration'] .' weeks'));
                                    }elseif(strtoupper($course['duration_name']) == "DAY"){
                                        $end_date = date('Y-m-d', strtotime($course['end_date'] . '+ ' . $course['duration'] .' days'));
                                    }elseif(strtoupper($course['duration_name']) == "MONTH"){
                                        $end_date = date('Y-m-d', strtotime($course['end_date'] . '+ ' . $course['duration'] .' months'));
                                    }elseif(strtoupper($course['duration_name']) == "YEAR"){
                                        $end_date = date('Y-m-d', strtotime($course['end_date'] . '+ ' . $course['duration'] .' years'));
                                    }

                                    if(($currentDate >= $course['start_date']) && ($currentDate <= $course['end_date'])){
                                        echo '<span class="bg-blue">Addmission Open</span>';
                                    }elseif($currentDate < $course['start_date']){
                                        echo '<span class="bg-yellow">Upcoming</span>';
                                    }elseif($currentDate > $end_date){
                                        echo '<span class="bg-red">Completed</span>';
                                    }elseif(($currentDate > $course['end_date']) && ($currentDate <= $end_date)){
                                        echo '<span class="bg-green">Running</span>';
                                    }
                                ?>                                
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
                                        <?php if($course['status'] == "0"){ ?>
                                            <a class="btn btn-primary btn-xs active_deactive" href="" id="<?php echo $course['course_id']; ?>" value="<?php echo $course['status']; ?>">Active</a>
                                        <?php }else{ ?>
                                            <a class="btn btn-primary btn-xs active_deactive" href="" id="<?php echo $course['course_id']; ?>" value="<?php echo $course['status']; ?>">Deactive</a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </li>
                            <!-- END timeline item -->
                        </ul>
            <?php
                    }
                }else{
                    echo '<p class="text-danger text-center">No course avaiable yet.</p>';
                }
            ?>
        </div>
    </div>
    <!-- /.tab-content -->
</div>

<script>
    "use strict";

    let allBtnActiveDeactive = document.getElementsByClassName('active_deactive');
    
    for(let i=0; i<allBtnActiveDeactive.length; i++){
        allBtnActiveDeactive[i].addEventListener('click', function(e){
            e.preventDefault();
            let data = {"course_id" : this.id, "status":this.getAttribute('value')};
            data = JSON.stringify(data);

            // // Creating object
            let req = new XMLHttpRequest();

            // Creating ajax request
            req.open("post", "<?php echo base_url()?>institute/active-deactive");
            req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            req.send("data="+data);

            // Getting response
            req.onreadystatechange = function(){
                if((req.readyState == 4) && (req.status == 200)){
                    let response = JSON.parse(req.responseText);

                    if(response.status == true){
                        let currentObject = document.getElementById(response.course_id);
                        
                        if(currentObject.getAttribute('value') == '1'){
                            currentObject.setAttribute('value', '0');
                            currentObject.textContent = 'Active';
                        }else{
                            currentObject.setAttribute('value', '1');
                            currentObject.textContent = 'Deactive';
                        }                        
                    }
                }
            } 
        });
    }
</script>