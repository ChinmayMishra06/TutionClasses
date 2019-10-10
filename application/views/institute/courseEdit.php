<?php defined('BASEPATH') OR exit("No direct script access allowed."); ?>
        <div class="nav-tabs-custom">            
          <ul class="nav nav-tabs">
            <li class="active"><a href="#profile" data-toggle="tab">Courses</a></li>
          </ul>          
          <div class="tab-content">
            <form class="form-horizontal" action="<?php echo base_url('institute/course/edit/'. $course[0]['course_id']); ?>" method="POST" enctype="multipart/form-data">
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
                          <option selected value="<?php echo $course[0]['category_id'];?>"><?php echo $course[0]['category_name'];?></option>
                        <?php }
                      } ?>
                  </select>
                  <?php if(validation_errors()) echo form_error('inputCategory'); ?>
               </div>
              </div>
              <div class="form-group" id="subCategory" style="display:none;">
                <label for="inputSubCategory" class="col-sm-2 control-label">Sub Category</label>                
                <div class="col-sm-10">
                  <select name="inputSubCategory" id="inputSubCategory" class="form-control"></select>
                  <?php if(validation_errors()) echo form_error('inputSubCategory'); ?>
               </div>
              </div>
              <div class="form-group">
                <label for="inputMedium" class="col-sm-2 control-label">Medium</label>                
                <div class="col-sm-10">
                    <select name="inputMedium" id="inputMedium" class="form-control">
                        <option value="">Choose Medium</option>
                        <?php foreach($mediums as $medium){ ?>
                          <?php if($medium['category_name'] != $course[0]['medium']){?>
                            <option value="<?php echo $medium['category_id']; ?>"><?php echo $medium['category_name']; ?></option>
                        <?php
                        }else{?>
                            <option selected value="<?php echo $medium['category_id']; ?>"><?php echo $medium['category_name']; ?></option>
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
                  <?php
                    if(validation_errors()) echo form_error('inputDescription');
                    else echo '<i class="text-danger">* Only 200 characters are allowed.</i>';
                  ?>
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
                          <label for="inputEndDate" class="control-label">End Joining Date</label>
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
                          <label for="inputTimingTerm" class="control-label">Term</label>
                        </div>     
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <select name="inputTimingTerm" id="inputTimingTerm" class="form-control">
                            <?php foreach($terms as $term){?>
                              <?php if($term['category_id'] != $course[0]['duration']){?>
                                <option value="<?php echo $term['category_id']; ?>"><?php echo $term['category_name']; ?></option>
                              <?php
                              }else{?>
                                <option selected value="<?php echo $term['category_id'];?>"><?php echo $term['category_name'];?></option>
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
                          <input type="number" name="inputTime" id="inputTime" class="form-control" value="<?php echo $course[0]['time']; ?>">
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
                          <label for="inputFeesTerm" class="control-label">Term</label>
                        </div>     
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <select name="inputFeesTerm" id="inputFeesTerm" class="form-control">                              
                              <?php
                                if($course[0]['fees'] == '0'){ ?>
                                  <option value="0" selected>Free</option>
                                <?php } else{ ?>
                                  <option value="0">Free</option>
                                <?php }

                                foreach($terms as $term){                                
                                  if($term['category_id'] != $course[0]['fees']){?>
                                    <option value="<?php echo $term['category_id']; ?>"><?php echo $term['category_name']; ?></option>
                                  <?php
                                  }else{?>
                                    <option selected value="<?php echo $term['category_id'];?>"><?php echo $term['category_name'];?></option>
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
                          <input type="text" name="inputAmount" id="inputAmount" class="form-control" value="<?php echo $course[0]['amount']; ?>">
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
                  <input type="file" class="form-control" name="inputLogoImage" id="inputLogoImage">
                </div>
                <div class="col-sm-2">
                  <a href="<?php echo base_url('public/uploads/institute/images/'.$course[0]['logo_image']);?>" target="_blank" class="btn btn-primary pull-right">View Image</a>
                </div>
              </div>
              <div class="form-group">
                <label for="inputBannerImage" class="col-sm-2 control-label">Banner Image</label>
                <div class="col-sm-8">
                  <input type="file" class="form-control" name="inputBannerImage" id="inputBannerImage">
                </div>
                <div class="col-sm-2">
                  <a href="<?php echo base_url('public/uploads/institute/images/'.$course[0]['banner_image']);?>" target="_blank" class="btn btn-primary pull-right">View Image</a>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-danger" name="btnCourseUpdate">Update</button>
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
                    document.getElementById('subCategory').style.display = "block";
                    let elmOption = document.createElement('option');
                    elmOption.value = "";
                    elmOption.textContent = "Choose Sub Category";
                    document.getElementById('inputSubCategory').appendChild(elmOption);
                  
                    for(let i=0; i<response.data.list.length; i++){                    
                      let elmOption = document.createElement('option');
                      elmOption.value = response.data.list[i].category_id;
                      elmOption.textContent = response.data.list[i].category_name;
                      document.getElementById('inputSubCategory').appendChild(elmOption);
                    }
                  }else{
                    document.getElementById('subCategory').style.display = "none";
                  }
                }
              }
            }else{
              document.getElementById('subCategory').style.display = "none";
            }
          }

          document.getElementById('inputCategory').addEventListener('change', function(){
              subCategory();
          });

          window.addEventListener('load', function(){
            subCategory();
          });
        </script>