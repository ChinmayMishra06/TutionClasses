<?php defined('BASEPATH') OR exit("No direct script access allowed."); ?>
        <div class="nav-tabs-custom">            
          <ul class="nav nav-tabs">
            <li class="active"><a href="#profile" data-toggle="tab">Edit Category</a></li>
          </ul>          
          <div class="tab-content">
            <form class="form-horizontal" action="<?php echo base_url('institute/category/add'); ?>" method="POST">
              <?php if($this->session->flashdata('message')){ ?>
                  <div class="col-sm-offset-2 alert alert-<?php echo $this->session->flashdata('status')?>" data-dismiss="alert">
                      <?php echo $this->session->flashdata('message'); ?>
                      <button class="close">&times;</button>
                  </div>
              <?php } ?>
              <div class="form-group">
                <label for="inputCategoryName" class="col-sm-2 control-label">Category Name</label>
                <div class="col-sm-10">
                  <input type="text" list="category_name" class="form-control" name="inputCategoryName" id="inputCategoryName" placeholder="Category Name" value="<?= set_value('inputName'); ?>">
                  <datalist id="category_name"></datalist>
                  <?php if(validation_errors()) echo form_error('inputCategoryName'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputParentCategory" class="col-sm-2 control-label">Parent Category</label>                
                <div class="col-sm-10">
                    <select name="inputParentCategory" id="inputParentCategory" class="form-control" disabled="disabled">
                        <option value="0">None</option>
                        <?php foreach($categories as $category){ ?>
                            <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?></option>
                        <?php } ?>
                    </select>
                    <?php if(validation_errors()) echo form_error('inputParentCategory'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputCategoryType" class="col-sm-2 control-label">Category Type</label>
                <div class="col-sm-10">
                  <select name="inputCategoryType" id="inputCategoryType" class="form-control" disabled="disabled">
                      <option value="">Choose Category Type</option>
                      <option value="0">Language</option>
                      <option value="1">Medium</option>
                  </select>
                  <?php if(validation_errors()) echo form_error('inputCategoryType'); ?>
               </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary" name="btnEditCategory">Edit</button>
                </div>
              </div>
            </form>
          </div>
          <!-- /.nav-tabs-custom -->
        </div>

        <script type="text/javascript">
          'use strict';          
          document.getElementById('inputCategoryName').addEventListener('change', function(){
            if(document.getElementById('inputCategoryName').value !== ""){
              document.getElementById('inputParentCategory').removeAttribute('disabled');
              document.getElementById('inputCategoryType').removeAttribute('disabled');
            }else{
              document.getElementById('inputParentCategory').setAttribute('disabled', 'disabled');
              document.getElementById('inputCategoryType').setAttribute('disabled', 'disabled');
            }
          });

         let categoryName = document.getElementById('inputCategoryName');
         categoryName.addEventListener('keyup', function(){
           
           let xhr = new XMLHttpRequest();
           xhr.open('POST', "<?php echo base_url('institute/category'); ?>", true);
           xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
           xhr.send('category_name='+JSON.stringify(categoryName.value));
           xhr.onreadystatechange = function(){
            if((xhr.readyState==4) && (xhr.status==200)){
              let response = JSON.parse(xhr.responseText);
              if(response.status == true){
                document.getElementById('category_name').innerHTML = "";
                for(let i=0; i<response.data.list.length; i++){                  
                  let elmOption = document.createElement('option');
                  elmOption.value = response.data.list[i].category_id;
                  elmOption.textContent = response.data.list[i].category_name;
                  document.getElementById('category_name').appendChild(elmOption);
                }
              }
            }
           };
         });
        </script>