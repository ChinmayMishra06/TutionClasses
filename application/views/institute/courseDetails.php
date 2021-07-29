<?php defined('BASEPATH') OR exit("No direct script access allowed."); ?>
        <div class="nav-tabs-custom">            
          <ul class="nav nav-tabs">
            <li class="active"><a href="#profile" data-toggle="tab"><?php echo $course[0]['course_name'];?> Details</a></li>
            <a class="btn btn-primary pull-right" style="margin:10px;" href="<?php echo base_url('institute/courses/add'); ?>">Add New Course</a>
          </ul>          
          <div class="tab-content">
            <!-- <img src="< ?php echo base_url('public/uploads/institute/images/'. $course[0]['logo_image']); ?>" alt="Logo Image" id="logo-image"> -->
            <table class="table borderless">
              <tr><th>Category</th><td><?php echo $course[0]['category_name']; ?></td></tr>
              <tr><th>Medium</th><td><?php echo $course[0]['medium_name']; ?></td></tr>
              <tr><th>Course Name</th><td><?php echo $course[0]['course_name']; ?></td></tr>
              <tr><th>Description</th><td><?php echo $course[0]['description']; ?></td></tr>
              <tr>
                <th>Fees</th>
                <td>
                  <?php
                    echo $course[0]['fees'] . ' per '. $course[0]['fees_name'];
                  ?>
                </td>
              </tr>
              <tr>
                <th>Timing</th>
                <td>
                  <table class="table">
                    <tr><th width="40%">Start Joining Date</th><td><?php echo $course[0]['start_date']; ?></td></tr>
                    <tr><th>End Joining Date</th><td><?php echo $course[0]['end_date']; ?></td></tr>
                    <tr>
                      <th>Term</th>
                      <td>
                        <?php
                          if($course[0]['duration'] > 1)
                            echo $course[0]['duration'] . ' ' . $course[0]['duration_name'] . 's';
                          else
                            echo $course[0]['duration'] . ' ' . $course[0]['duration_name'];
                        ?>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <th></th>
                <td><a class="btn btn-primary pull-right" href="<?php echo base_url('institute/courses/edit/'. $course[0]['course_id']); ?>">Edit</a></td>
              </tr>
            </table>
          </div>
          <!-- /.nav-tabs-custom -->
        </div>