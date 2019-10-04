<?php defined('BASEPATH') OR exit("No direct script access allowed."); ?>
        <div class="nav-tabs-custom">            
          <ul class="nav nav-tabs">
            <li class="active"><a href="#profile" data-toggle="tab">Courses</a></li>
          </ul>          
          <div class="tab-content">
            <form class="form-horizontal">
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Name</label>

                <div class="col-sm-10">
                  <input type="email" class="form-control" id="inputName" placeholder="Name" value="<?php if(!empty($profile['name'])) echo $profile['name']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="inputStartDate" class="col-sm-2 control-label">Start Date</label>

                <div class="col-sm-10">
                  <input type="date" class="form-control" id="inputStartDate" value="<?php if(!empty($profile['email'])) echo $profile['email']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="inputDuration" class="col-sm-2 control-label">Duration</label>
                
                <div class="col-sm-10">
                    <select name="inputCategory" id="inputCategory" class="form-control">
                        <option value="">Choose Duration</option>
                        <option value="weakly">Weekly</option>
                        <option value="monthly">Monthly</option>
                        <option value="quartarly">Quartarly</option>
                        <option value="Half">Half-Yearly</option>
                        <option value="yearly">Yearly</option>
                    </select>
                </div>
              </div>
              <div class="form-group">
                <label for="inputMedium" class="col-sm-2 control-label">Medium</label>
                
                <div class="col-sm-10">
                    <select name="inputMedium" id="inputMedium" class="form-control">
                        <option value="">Choose Medium</option>
                        <option value="hindi">Hindi</option>
                        <option value="english">English</option>
                        <option value="gujarati">Gujarati</option>
                        <option value="bhojpuri">Bhojpuri</option>
                    </select>
                </div>
              </div>
              <div class="form-group">
                <label for="inputCategory" class="col-sm-2 control-label">Category</label>
                
                <div class="col-sm-10">
                    <select name="inputCategory" id="inputCategory" class="form-control">
                        <option value="">Choose Category</option>
                        <option value="java">Java</option>
                        <option value="php">Php</option>
                    </select>
                </div>
              </div>
              <div class="form-group">
                <label for="inputFees" class="col-sm-2 control-label">Fees</label>

                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputFees" placeholder="Fees" value="<?php if(!empty($profile['name'])) echo $profile['name']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="inputDescription" class="col-sm-2 control-label">Description</label>

                <div class="col-sm-10">
                  <textarea class="form-control" id="inputDescription" placeholder="Write a short note about your course.   " value="<?php if(!empty($profile['contact'])) echo $profile['contact']; ?>"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="inputLogoImage" class="col-sm-2 control-label">Logo Image</label>

                <div class="col-sm-10">
                  <input type="file" class="form-control" id="inputLogoImage" value="<?php if(!empty($profile['city'])) echo $profile['city']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="inputBannerImage" class="col-sm-2 control-label">Banner Image</label>

                <div class="col-sm-10">
                  <input type="file" class="form-control" id="inputBannerImage" value="<?php if(!empty($profile['city'])) echo $profile['city']; ?>">
                </div>
              </div>
             <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-danger">Submit</button>
                </div>
              </div>
            </form>
          </div>
          <!-- /.nav-tabs-custom -->
        </div>