<?php defined('BASEPATH') OR exit("No direct script access allowed."); ?>
<section class="contact-section section_padding">
    <div class="container">
      <div class="row">
        <div class="offset-md-3 offset-lg-3 offset-xl-3 col-md-6 col-lg-6 col-xl-6">
          <div class="card">
            <div class="card-header" style="background-image: linear-gradient(to left, #ee390f 0%, #f9b700 51%, #ee390f 100%);">
              <h2 class="contact-title m-1 text-center">Login</h2>
            </div>
            <div class="card-body">
              <?php if($this->session->flashdata('message')){ ?>
                  <div class="alert alert-<?php echo $this->session->flashdata('status'); ?>" data-dismiss="alert">
                      <?php echo $this->session->flashdata('message'); ?>
                      <button class="close">&times;</button>
                  </div>
              <?php } ?>
              <form action="<?php echo base_url('login'); ?>" method="post">
                  <div class="form-group">
                      <label class="col">Username</label>
                      <div class="col">
                          <input type="text" name="email" id="email" class="form-control" placeholder="Enter your username...">
                          <?php if(validation_errors()) echo form_error('email'); ?>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col">Password</label>
                      <div class="col">
                          <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password...">
                          <?php if(validation_errors()) echo form_error('password'); ?>
                      </div>
                  </div>
                  <input type="submit" class="btn_1" value="Login" name="btnLogin">
                  <a href="<?php echo base_url('signup'); ?>" class="btn_2" id="btnSingup">Signup</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>