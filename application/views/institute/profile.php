<?php defined('BASEPATH') OR exit("No direct script access allowed."); ?>
        <div class="nav-tabs-custom">            
          <ul class="nav nav-tabs">
            <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
          </ul>          
          <div class="tab-content">
            <?php if($this->session->flashdata('message')){ ?>
                <div class=" col-sm-offset-2 text-center alert alert-<?php echo $this->session->flashdata('status')?>" data-dismiss="alert">
                    <?php echo $this->session->flashdata('message'); ?>
                    <button class="close">&times;</button>
                </div>
            <?php } ?>
            <form action="<?php echo base_url('institute/profiles'); ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name" value="<?php echo $profileData->name; ?>">
                  <?php if(validation_errors()) echo form_error('inputName'); ?>

                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" value="<?php echo $profileData->email; ?>">
                  <?php if(validation_errors()) echo form_error('inputEmail'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputContact" class="col-sm-2 control-label">Contact</label>

                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputContact" name="inputContact" placeholder="Contact" value="<?php echo $profileData->contact; ?>">
                  <?php if(validation_errors()) echo form_error('inputContact'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputCity" class="col-sm-2 control-label">City</label>

                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputCity" name="inputCity" placeholder="City" value="<?php echo $profileData->address; ?>">
                  <?php if(validation_errors()) echo form_error('inputCity'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputDOB" class="col-sm-2 control-label">DOB</label>

                <div class="col-sm-10">
                  <input type="date" class="form-control" id="inputDOB" name="inputDOB" placeholder="Date of Birth" value="<?php echo $profileData->dob; ?>">
                  <?php if(validation_errors()) echo form_error('inputDOB'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputProfileImage" class="col-sm-2 control-label">Upload Image</label>

                <div class="col-sm-10">
                  <input type="file" class="form-control" id="inputProfileImage"name="inputProfileImage">
                  <?php if(validation_errors()) echo form_error('inputProfileImage'); ?>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-danger" name="profileSubmit">Submit</button>
                </div>
              </div>
            </form>
          </div>
          <!-- /.nav-tabs-custom -->
        </div>