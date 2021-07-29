<?php defined('BASEPATH') OR exit("No direct script access allowed."); ?>
        <div class="nav-tabs-custom">            
          <ul class="nav nav-tabs">
            <li class="active"><a href="#profile" data-toggle="tab">Courses</a></li>
          </ul>          
          <div class="tab-content">
            <form class="form-horizontal">
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
                <label for="inputName" class="col-sm-2 control-label">Name</label>

                <div class="col-sm-10">
                  <input type="email" class="form-control" name="inputName" id="inputName" placeholder="Name">
                </div>
              </div>
              <div class="form-group">
                <label for="inputDescription" class="col-sm-2 control-label">Description</label>

                <div class="col-sm-10">
                  <textarea class="form-control" name="inputDescription" id="inputDescription" placeholder="Write hort note about your course..."></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="inputStartDate" class="col-sm-2 control-label">Start Date</label>

                <div class="col-sm-10">
                  <input type="date" class="form-control" name="inputStartDate" id="inputStartDate">
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
                <label for="inputFees" class="col-sm-2 control-label">Fees</label>

                <div class="col-sm-10">
                  <input type="text" class="form-control" name="inputFees" id="inputFees" placeholder="Fees">
                </div>
              </div>
              <div class="form-group">
                <label for="inputLogoImage" class="col-sm-2 control-label">Logo Image</label>

                <div class="col-sm-10">
                  <input type="file" class="form-control" name="inputLogoImage" id="inputLogoImage">
                </div>
           </div>
              <div class="form-group">
                <label for="inputBannerImage" class="col-sm-2 control-label">Banner Image</label>

                <div class="col-sm-10">
                  <input type="file" class="form-control" name="inputBannerImage" id="inputBannerImage">
                </div>
              </div>
             <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-danger" name="btnCourseAdd">Submit</button>
                </div>
              </div>
            </form>
          </div>
          <!-- /.nav-tabs-custom -->
        </div>