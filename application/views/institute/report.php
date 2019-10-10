<?php defined('BASEPATH') OR exit("No direct script access allowed."); ?>
<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="false">Reports</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="timeline">
            <!-- The timeline -->
            <ul class="timeline timeline-inverse">
                <?php foreach($reports as $report){?>
                    <!-- timeline time label -->
                    <li class="time-label"><span class="bg-red"><?php echo $report['category_name']; ?></span></li>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li>
                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i><?php echo date('d/m/y', strtotime($report['created_at'])); ?></span>
                            <h3 class="timeline-header"><span class="text-primary lead"><?php echo $report['title']; ?></span></h3>
                            <div class="timeline-body"><?php echo $report['description']; ?></div>
                            <div class="timeline-footer">
                                <span class="pull-right small">By <?php echo $report['victim_name']; ?></span><br>
                                <span class="pull-right"><?php echo $report['email']; ?></span><br>
                            </div>
                        </div>
                    </li>   
                    <li></li>
                    <!-- END timeline item -->
                <?php } ?>
            </ul>
        </div>
    </div>
    <!-- /.tab-content -->
</div>