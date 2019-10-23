<?php defined('BASEPATH') OR exit("No direct script access allowed."); ?>
        <div class="nav-tabs-custom">            
          <ul class="nav nav-tabs">
            <li class="active"><a href="#profile" data-toggle="tab">Courses</a></li>
          </ul>          
          <div class="tab-content">
            <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
              <?php if($this->session->flashdata('message')){ ?>
                  <div class="col-sm-offset-2 alert alert-<?php echo $this->session->flashdata('status')?>" data-dismiss="alert">
                      <?php echo $this->session->flashdata('message'); ?>
                      <button class="close">&times;</button>
                  </div>
              <?php } ?>
              <div class="form-group">
                <label for="inputCategory" class="col-sm-2 control-label">Category</label>                
                <div class="col-sm-10">
                  <select name="inputCategory" id="inputCategory" class="form-control">
                      <option value="">Choose Category</option>
                      <?php foreach($categories as $category){ ?>
                        <?php if($category['category_name'] != $course[0]['category_name']){?>
                          <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?></option>
                        <?php
                        }else{?>
                          <option selected="selected" value="<?php echo $course[0]['category_id'];?>"><?php echo $course[0]['category_name'];?></option>
                        <?php }
                      } ?>
                  </select>
                  <?php if(validation_errors()) echo form_error('inputCategory'); ?>
               </div>
              </div>
              <div class="form-group" id="subCategory">
                <label for="inputSubCategory" class="col-sm-2 control-label">Sub Category</label>                
                <div class="col-sm-10">
                  <select name="inputSubCategory" id="inputSubCategory" class="form-control" disabled="disabled">
                    <option value="">Choose Sub Category</option></select>                  
                  <?php if(validation_errors()) echo form_error('inputSubCategory'); ?>
               </div>
              </div>
              <div class="form-group">
                <label for="inputMedium" class="col-sm-2 control-label">Medium</label>                
                <div class="col-sm-10">
                    <select name="inputMedium" id="inputMedium" class="form-control">
                        <option value="">Choose Medium</option>
                        <?php foreach($mediums as $medium){ ?>
                          <?php if($medium['category_id'] != $course[0]['medium']){?>
                            <option value="<?php echo $medium['category_id']; ?>"><?php echo $medium['category_name']; ?></option>
                        <?php
                        }else{?>
                            <option selected="selected" value="<?php echo $medium['category_id']; ?>"><?php echo $medium['category_name']; ?></option>
                        <?php }
                      } ?>
                    </select>
                    <?php if(validation_errors()) echo form_error('inputMedium'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputCourseName" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="inputCourseName" id="inputCourseName" value="<?php echo $course[0]['course_name']; ?>">
                  <?php if(validation_errors()) echo form_error('inputCourseName'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputDescription" class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="inputDescription" id="inputDescription"><?php echo $course[0]['description']; ?></textarea>
                  <i class="text-green" id="allow_word_message">* Only <span id="word_count">0</span>/ <span id="total_char">500</span> characters are allowed.</i>
                </div>
              </div>
              <div class="form-group">
                <label for="inputTiming" class="col-sm-2 control-label">Timing</label>
                <div class="col-sm-6">
                  <div class="row">                    
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="col-sm-12">
                          <label for="inputStartDate" class="control-label">Start Joining Date</label>
                        </div>     
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <input type="date" name="inputStartDate" id="inputStartDate" class="form-control" value="<?php echo $course[0]['start_date']; ?>">
                          <?php if(validation_errors()) echo form_error('inputStartDate'); ?>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="col-sm-12">
                          <label for="inputEndDate" class="control-label">Last Joining Date</label>
                        </div>     
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <input type="date" name="inputEndDate" id="inputEndDate" class="form-control" value="<?php echo $course[0]['end_date']; ?>">
                          <?php if(validation_errors()) echo form_error('inputEndDate'); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="row">                    
                    <div class="col-sm-7">
                      <div class="row">
                        <div class="col-sm-12">
                          <label for="inputTimingTerm" class="control-label">Term (per)</label>
                        </div>     
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <select name="inputTimingTerm" id="inputTimingTerm" class="form-control">
                            <?php foreach($terms as $term){?>
                              <?php if($term['category_id'] != $course[0]['duration_unit']){?>
                                <option value="<?php echo $term['category_id']; ?>"><?php echo $term['category_name']; ?></option>
                              <?php
                              }else{?>
                                <option selected="selected" value="<?php echo $term['category_id'];?>"><?php echo $term['category_name'];?></option>
                              <?php }
                            } ?>
                          </select>
                          <?php if(validation_errors()) echo form_error('inputDurationTerm'); ?>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="row">
                        <div class="col-sm-12">
                          <label for="inputTime" class="control-label">Time</label>
                        </div>     
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <input type="number" name="inputTime" id="inputTime" class="form-control" value="<?php echo $course[0]['duration']; ?>">
                          <?php if(validation_errors()) echo form_error('inputTime'); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="inputDuration" class="col-sm-2 control-label">Fees</label>
                <div class="col-sm-6">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="col-sm-12">
                          <label for="inputFeesTerm" class="control-label">Term (per)</label>
                        </div>     
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <select name="inputFeesTerm" id="inputFeesTerm" class="form-control">                              
                              <?php
                                if($course[0]['fees_unit'] == 0){ ?>
                                  <option value="0" selected="selected">Free</option>
                                <?php } else{ ?>
                                  <option value="0">Free</option>
                                <?php }

                                foreach($terms as $term){                                
                                  if($term['category_id'] != $course[0]['fees_unit']){?>
                                    <option value="<?php echo $term['category_id']; ?>"><?php echo $term['category_name']; ?></option>
                                  <?php
                                  }else{?>
                                    <option selected="selected" value="<?php echo $term['category_id'];?>"><?php echo $term['category_name'];?></option>
                                  <?php }
                                } ?>
                          </select>                          
                          <?php if(validation_errors()) echo form_error('inputFeesTerm'); ?>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="col-sm-12">
                          <label for="inputAmount" class="control-label">Amount</label>
                        </div>     
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <input type="text" name="inputAmount" id="inputAmount" class="form-control" value="<?php echo $course[0]['fees']; ?>">
                          <?php if(validation_errors()) echo form_error('inputAmount'); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="inputLogoImage" class="col-sm-2 control-label">Logo Image</label>
                <div class="col-sm-8">
                  <div id="view_logo_img" style="display:none;" class="pull-right">
                     <img src="<?php echo base_url('public/uploads/institute/images/'.$course[0]['logo_image']);?>" height="80px" width="80px">
                  </div>
                  <input type="file" class="form-control" name="inputLogoImage" id="inputLogoImage">
                </div>
                <div class="col-sm-2">
                  <button type="button" class="btn btn-primary pull-right" id="logo_img">View Image</button>
                </div>
              </div>
              <div class="form-group">
                <label for="inputBannerImage" class="col-sm-2 control-label">Banner Image</label>
                <div class="col-sm-8">
                  <div id="view_banner_img" style="display:none;" class="pull-right">
                     <img src="<?php echo base_url('public/uploads/institute/images/'.$course[0]['banner_image']);?>" height="80px" width="180px">
                  </div> 
                  <input type="file" class="form-control" name="inputBannerImage" id="inputBannerImage">
                </div>
                <div class="col-sm-2">
                  <button type="button" class="btn btn-primary pull-right" id="banner_img">View Image</button>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary" name="btnCourseUpdate">Update</button>
                </div>
              </div>
            </form>
          </div>
          <!-- /.nav-tabs-custom -->
        </div>

        <script type="text/javascript">
          'use script';
          
          document.getElementById('inputFeesTerm').addEventListener('change', function(){
            if(document.getElementById('inputFeesTerm').value == "0"){
              document.getElementById('inputAmount').value = 0;
            }else{
              document.getElementById('inputAmount').value = "";              
            }
          });

          function subCategory(){
            if(document.getElementById('inputCategory').value != ""){              
              let parentCategory = document.getElementById('inputCategory').value;
              document.getElementById('inputSubCategory').innerHTML = "";

              let xhr = new XMLHttpRequest();
              xhr.open('POST', "<?php echo base_url('api/v1/getCategory'); ?>", true);
              xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
              
              xhr.send(JSON.stringify({"parentCategory" : parentCategory, "categoryType" : "0" }));
              xhr.onreadystatechange = function(){
                if((xhr.readyState == 4) && (xhr.status == 200)){
                  let response = JSON.parse(xhr.responseText);
                  
                  if(response.status == true){
                    let elmOption = document.createElement('option');
                    document.getElementById('inputSubCategory').appendChild(elmOption);
                    document.getElementById('inputSubCategory').removeAttribute("disabled");
                    elmOption.value = "";
                    elmOption.textContent = "Choose Sub Category";
                  
                    for(let i=0; i<response.data.list.length; i++){                    
                      let elmOption = document.createElement('option');
                      elmOption.value = response.data.list[i].category_id;
                      elmOption.textContent = response.data.list[i].category_name;
                      document.getElementById('inputSubCategory').appendChild(elmOption);
                    }
                  }else{
                    let elmOption = document.createElement('option');
                    elmOption.value = "";
                    elmOption.textContent = "Choose Sub Category";
                    document.getElementById('inputSubCategory').appendChild(elmOption);
                    document.getElementById('inputSubCategory').setAttribute("disabled", "disabled");
                  }
                }
              }
            }else{
              let elmOption = document.createElement('option');
              elmOption.value = "";
              elmOption.textContent = "Choose Sub Category";
              document.getElementById('inputSubCategory').appendChild(elmOption);
              document.getElementById('inputSubCategory').setAttribute("disabled", "disabled");
            }
          }

          document.getElementById('inputCategory').addEventListener('change', function(){
              subCategory();
          });

          window.addEventListener('load', function(){
            subCategory();
          });

          document.getElementById('banner_img').addEventListener('mouseover', function(){
            document.getElementById('view_banner_img').style.display="block";
          });

          document.getElementById('banner_img').addEventListener('mouseout', function(){
            document.getElementById('view_banner_img').style.display="none";
          });

          document.getElementById('logo_img').addEventListener('mouseover', function(){
            document.getElementById('view_logo_img').style.display="block";
          });

          document.getElementById('logo_img').addEventListener('mouseout', function(){
            document.getElementById('view_logo_img').style.display="none";
          });

          let description = document.getElementById('inputDescription');
          description.addEventListener('keyup', function(){
            let word_count = document.getElementById('word_count');
            let total_char = document.getElementById('total_char').textContent;
            word_count.textContent = description.value.length;

            if(parseInt(total_char) < description.value.length){
              document.getElementById('allow_word_message').className = "text-red";
            }else{
              document.getElementById('allow_word_message').className = "text-green";
            }
          });

          window.addEventListener('load', function(){
            let word_count = document.getElementById('word_count');
            word_count.textContent = description.value.length;

            if(parseInt(total_char) < description.value.length){
              document.getElementById('allow_word_message').className = "text-red";
            }else{
              document.getElementById('allow_word_message').className = "text-green";
            }
          });
        </script>