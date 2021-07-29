<?php defined('BASEPATH') OR exit("No direct script access allowed."); ?>    
<section class="contact-section section_padding">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="contact-title">Fill your profile</h2>
        </div>
        <div class="col-lg-8">
          <?php if($this->session->flashdata('message')){ ?>
              <div class="alert alert-<?php echo $this->session->flashdata('status'); ?>" data-dismiss="alert">
                  <?php echo $this->session->flashdata('message'); ?>
                  <button class="close">&times;</button>
              </div>
          <?php } ?>
          <form class="form-contact contact_form" action="<?php echo base_url(); ?>profile" method="post" entype="multipart/form-data">
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <input class="form-control" name="name" id="name" type="text" placeholder="Enter your name" value="<?php echo $profileData->name; ?>">
                  <?php if(validation_errors()) echo form_error('name'); ?>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="email" id="email" type="text" placeholder="Enter email" value="<?php echo $profileData->email; ?>">
                  <?php if(validation_errors()) echo form_error('email'); ?>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <input class="form-control" name="contact" id="contact" type="text" placeholder="Enter contact" value="<?php echo $profileData->contact; ?>">
                  <?php if(validation_errors()) echo form_error('contact'); ?>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <input class="form-control" name="city" id="city" type="text" placeholder="Enter city" value="<?php echo $profileData->address; ?>">
                  <?php if(validation_errors()) echo form_error('city'); ?>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <input class="form-control" name="dob" id="dob" type="date" value="<?php echo $profileData->dob; ?>">
                  <?php if(validation_errors()) echo form_error('dob'); ?>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <input class="form-control" name="userImage" id="userImage" type="file" placeholder='Enter Subject'">
                  <?php if(validation_errors()) echo form_error('userImage'); ?>
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <button type="submit" class="button button-contactForm btn_1" name="profileSubmit">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>