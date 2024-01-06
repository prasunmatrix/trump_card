<div class="page-content">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4 class="font-size-18">Add Subcategory</h4>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master Data</a></li>
                        <li class="breadcrumb-item active">Add Subcategory</li>
                    </ol>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="float-right d-none d-md-block">
                    <button type="button" data-toggle="modal" data-target="#player" class="btn btn-success waves-effect waves-light">Upload Excel</button>
                </div>
                <div class="float-right d-none d-md-block mr-2">
                    <a href="<?=base_url()?>Subcategory"><button type="button" class="btn btn-success waves-effect waves-light">Sub Category Lists</button></a>
                </div>
            </div>
        </div>     

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                      <div align="center">
                        <?php echo $this->session->flashdata('msg'); ?>  
                      </div>
                        <form class="custom-validation" method="post" action="<?php echo site_url(); ?>Subcategory/addsubcategory" enctype="multipart/form-data" autocomplete="off">
                            <div class="form-group">
                              <label>Select Category</label>
                              <select required class="form-control" name="category_id" id="category_id">
                                <option value="">Select Category</option>
                                <?php
                                  if(!empty($all_category_name))
                                  {
                                    foreach ($all_category_name as  $value) {    
                                ?>
                                <option value="<?php echo $value['categoryid']; ?>"><?php echo $value['category_name']; ?></option>
                                <?php
                                    }
                                  }
                                ?>
                              </select>
                            </div>
                            <div class="subcategory_list">
                              <div class="form-group">
                                <label>Sub Category Name</label>
                                <input type="text" class="form-control" required name="subcategory_name[]" id="subcategory_name" placeholder="Sub Category Name"/>
                              </div>
                              <div class="form-group">
                                <label>Sub Category Banner Image</label>
                                <input type="file" class="filestyle" required name="sub_category_banner_image[]" id="sub_category_banner_image" placeholder="Sub Category Banner Image"/>
                                <p class="note">NOTE : Image size maximum 2MB and dimentions ( 100 X 100 ) PX</p>
                              </div>
                              <div class="form-group">
                                <label>Meta Keyword</label>
                                <input type="text" class="form-control"  name="meta_keyword[]" id="meta_keyword" placeholder="Meta Keyword"/>
                              </div>
                              <div class="form-group">
                                <label>Meta Description</label>
                                <textarea name="meta_description[]" id="meta_description" class="form-control" placeholder="Meta Description"></textarea>
                              </div>  
                              <!-- <div class="form-group">
                                  <label>Criteria</label><br>
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="checkbox" id="inlineCheckbox12" value="option1">
                                      <label class="form-check-label mr-1" for="inlineCheckbox12">Custom Checkbox</label>
                                  </div>
                              </div> -->
                              <!-- <div class="form-group">
                                <label>Status</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="active" name="status[0]" class="custom-control-input" required="required">
                                  <label class="custom-control-label" for="active">Active</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="inactive" name="status[0]" class="custom-control-input" required="required">
                                  <label class="custom-control-label" for="inactive">Inactive</label>
                                </div>
                              </div> -->
                            </div>  
                            <div align="right">
                              <button type="button" id="add_more" class="btn btn-primary waves-effect waves-light mr-1">Add More</button>
                            </div> 
                            <div class="form-group mb-0">
                                <div>
                                    <input type="submit" class="btn btn-success waves-effect waves-light mr-1" name="addsubcategory" id="addsubcategory" value="Add Details">
                                    <!-- <button type="submit" class="btn btn-success waves-effect waves-light mr-1">
                                        Add Details
                                    </button> -->
                                    <button type="reset" class="btn btn-danger waves-effect">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>             

    </div>
</div>
<script>
jQuery(function(){
    var counter = 0;
    jQuery('#add_more').click(function(event){
      //alert("1");
      event.preventDefault();
      counter++;
      var newRow = jQuery('<div class="form-group"><label>Sub Category Name</label><input type="text" class="form-control" name="subcategory_name[]" id="subcategory_name'+counter+'" placeholder="Sub Category Name"/></div><div class="form-group"><label>Sub Category Banner Image</label><input type="file" class="filestyle"  name="sub_category_banner_image[]" id="sub_category_banner_image'+counter+'" placeholder="Sub Category Banner Image"/><p class="note">NOTE : Image size maximum 2MB and dimentions ( 100 X 100 ) PX</p></div><div class="form-group"><label>Meta Keyword</label><input type="text" class="form-control" name="meta_keyword[]" id="meta_keyword'+counter+'" placeholder="Meta Keyword"/></div><div class="form-group"><label>Meta Description</label><textarea name="meta_description[]" id="meta_description'+counter+'" class="form-control"  placeholder="Meta Description"></textarea></div>');
      jQuery('div.subcategory_list').append(newRow);
    });
});
</script>