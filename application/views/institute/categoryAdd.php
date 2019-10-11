<?php defined('BASEPATH') OR exit("No direct script access allowed."); ?>
        <div class="nav-tabs-custom">            
          <ul class="nav nav-tabs">
            <li class="active"><a href="#profile" data-toggle="tab">Category Add</a></li>
          </ul>          
          <div class="tab-content">
            <form class="form-horizontal" action="<?php echo base_url('institute/course/add'); ?>" method="POST" enctype="multipart/form-data">
              <?php if($this->session->flashdata('message')){ ?>
                  <div class="col-sm-offset-2 alert alert-<?php echo $this->session->flashdata('status')?>" data-dismiss="alert">
                      <?php echo $this->session->flashdata('message'); ?>
                      <button class="close">&times;</button>
                  </div>
              <?php } ?>
              <div class="form-group">
                <label for="inputCategory" class="col-sm-2 control-label">Category Type</label>                
                <div class="col-sm-10">
                  <select name="inputCategory" id="inputCategory" class="form-control">
                      <option value="">Choose Category Type</option>
                      <option value="0">Language</option>
                      <option value="1">Medium</option>
                  </select>
                  <?php if(validation_errors()) echo form_error('inputCategory'); ?>
               </div>
              </div>
              <div class="form-group">
                <label for="inputMedium" class="col-sm-2 control-label">Parent Category</label>                
                <div class="col-sm-10">
                    <select name="inputMedium" id="inputMedium" class="form-control">
                        <option value="">Choose Parent Category</option>
                        <?php foreach($categories as $category){ ?>
                            <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?></option>
                        <?php } ?>
                    </select>
                    <?php if(validation_errors()) echo form_error('inputMedium'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputCourseName" class="col-sm-2 control-label">Category Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="inputCourseName" id="inputCourseName" placeholder="Name" value="<?= set_value('inputName'); ?>">
                  <?php if(validation_errors()) echo form_error('inputCourseName'); ?>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary" name="btnCategoryAdd">Add</button>
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
        </script>