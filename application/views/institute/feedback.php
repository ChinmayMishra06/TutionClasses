<?php defined('BASEPATH') OR exit("No direct script access allowed."); ?>
<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="false">Feedbacks</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="timeline">
            <!-- The timeline -->
            <ul class="timeline timeline-inverse">
                <?php
                    if(isset($feedbacks) && is_array($feedbacks)){
                        foreach($feedbacks as $feedback){?>
                            <!-- timeline time label -->
                            <li class="time-label">
                                <span class="bg-red"><?php echo $feedback['course_name']; ?></span>
                            </li>
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <li>

                            <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i><?php echo date('d/m/y', strtotime($feedback['created_at'])); ?></span>
                                <h3 class="timeline-header"><a href="#"><?php echo $feedback['name']; ?></a> <span class="small">  sent by <?php echo $feedback['email']; ?></span></h3>
                                <div class="timeline-body"><?php echo $feedback['description']; ?></div>
                            </div>
                            </li>   
                            <!-- END timeline item -->
                        <?php
                        }
                    }else{
                        echo '<p class="text-danger text-center">No feedback avaiable yet.</p>';
                    }
                ?>
            </ul>
        </div>
    </div>
    <!-- /.tab-content -->
</div>