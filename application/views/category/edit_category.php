<div class="page-content">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4 class="font-size-18">Edit Category</h4>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master Data</a></li>
                        <li class="breadcrumb-item active">Edit Category</li>
                    </ol>
                </div>
            </div>

            <div class="col-sm-6">
                <!-- <div class="float-right d-none d-md-block">
                    <button type="button" data-toggle="modal" data-target="#player" class="btn btn-success waves-effect waves-light">Upload Excel</button>
                </div> -->
                <div class="float-right d-none d-md-block mr-2">
                    <a href="<?=base_url()?>Category"><button type="button" class="btn btn-success waves-effect waves-light">Category Lists</button></a>
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
                        <form class="custom-validation" method="post" action="" enctype="multipart/form-data" autocomplete="off">
                            <div class="form-group">
                              <label>Category Name</label>
                              <input type="text" class="form-control" required name="category_name" id="category_name" placeholder="Category Name" value="<?php echo $editcategory_data->category_name; ?>" />
                            </div>
                            <div class="form-group">
                              <label>Category Banner Image</label><br/>
                              <img src="<?php echo base_url()?>assets/uploads/category/<?php echo $editcategory_data->category_banner_image; ?>" style="width:90px;height:60px;" /><br/><br/>
                              <input type="file" class="filestyle"  name="category_banner_image" id="category_banner_image" placeholder="Category Banner Image"/>
                              <p class="note">NOTE : Image size maximum 2MB and dimentions ( 100 X 100 ) PX</p>
                              <input type="hidden" name="category_old_image" id="category_old_image" value="<?php echo $editcategory_data->category_banner_image; ?>" />
                            </div>
                            <div class="form-group">
                              <label>Meta Keyword</label>
                              <input type="text" class="form-control"  name="meta_keyword" id="meta_keyword" placeholder="Meta Keyword" value="<?php echo $editcategory_data->meta_keyword; ?>"/>
                            </div>
                            <div class="form-group">
                              <label>Meta Description</label>
                              <textarea name="meta_description" id="meta_description" class="form-control"  placeholder="Meta Description"><?php echo $editcategory_data->meta_description; ?></textarea>
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
                                <input type="radio" id="active" name="status" class="custom-control-input" required="required">
                                <label class="custom-control-label" for="active">Active</label>
                              </div>
                              <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2" name="status" class="custom-control-input" required="required">
                                <label class="custom-control-label" for="customRadioInline2">Inactive</label>
                              </div>
                            </div> -->
                            <div class="form-group mb-0">
                                <div>
                                  <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $editcategory_data->categoryid; ?>" />
                                  <input type="submit" class="btn btn-success waves-effect waves-light mr-1" name="editcategory" value="Update Details">
                                  <!-- <button type="reset" class="btn btn-danger waves-effect">Cancel</button> -->
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>             

    </div>
</div>