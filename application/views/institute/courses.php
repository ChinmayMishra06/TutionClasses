<?php defined('BASEPATH') OR exit("No direct script access allowed."); ?>
<div class="nav-tabs-custom">
    <a class="btn btn-primary pull-right" style="margin:10px;" href="<?php echo base_url('institute/courses/add'); ?>">Add New Course</a>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="false">Courses</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="timeline">
            <!-- The timeline -->
            <ul class="timeline timeline-inverse">
                <!-- timeline time label -->
                <li class="time-label">
                    <span class="bg-red">
                        10 Feb. 2014
                    </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>

                <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                    <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                    <div class="timeline-body">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                    weebly ning heekya handango imeem plugg dopplr jibjab, movity
                    jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                    quora plaxo ideeli hulu weebly balihoo...
                    </div>
                    <div class="timeline-footer">
                    <a class="btn btn-primary btn-xs" href="<?php echo base_url('institute/courses/edit'); ?>">Edit</a>
                    <a class="btn btn-danger btn-xs" href="<?php echo base_url('institute/courses/delete'); ?>">Delete</a>
                    </div>
                </div>
                </li>
                <!-- END timeline item -->
            </ul>
        </div>
    </div>
    <!-- /.tab-content -->
</div>