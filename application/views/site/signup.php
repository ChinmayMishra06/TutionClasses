<?php defined('BASEPATH') OR exit("No direct script access allowed."); ?>    
<section class="contact-section section_padding">
    <div class="container">
      <div class="row">
        <div class="offset-lg-3 col-6">
          <div class="card">
            <div class="card-header" style="background-image: linear-gradient(to left, #ee390f 0%, #f9b700 51%, #ee390f 100%);">
              <h2 class="contact-title m-1 text-center">Signup</h2>
            </div>
            <div class="card-body">
              <?php if($this->session->flashdata('message')){ ?>
                  <div class="alert alert-<?php echo $this->session->flashdata('status'); ?>" data-dismiss="alert">
                      <?php echo $this->session->flashdata('message'); ?>
                      <button class="close">&times;</button>
                  </div>
              <?php } ?>
              <form action="<?php echo base_url('site/signup'); ?>" method="post">
                  <div class="form-group">
                      <label class="col">Name</label>
                      <div class="col">
                          <input type="text" name="username" id="username" class="form-control" placeholder="Enter your name...">
                          <?php if(validation_errors()) echo form_error('username'); ?>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col">Email</label>
                      <div class="col">
                          <input type="text" name="email" id="email" class="form-control" placeholder="Enter your email...">
                          <?php if(validation_errors()) echo form_error('email'); ?>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col">Password</label>
                      <div class="col">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password...">
                        <?php
                          if(validation_errors()) echo form_error('password');
                          else echo '<p class="text-danger">* 6 characters long.<p>';
                        ?>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col">Confirm Password</label>
                      <div class="col">
                          <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Enter your confirm password...">
                          <?php if(validation_errors()) echo form_error('confirmPassword'); ?>
                      </div>
                  </div>
                  <input type="submit" href="#" class="btn_1" id="btnLogin" name="signup_student" value="Signup">
                  <a href="<?php echo base_url('site/login'); ?>" class="btn_2">Login</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>