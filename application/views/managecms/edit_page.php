<div class="page-content">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4 class="font-size-18">Edit Page</h4>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Manage CMS</a></li>
                        <li class="breadcrumb-item active">Edit Page</li>
                    </ol>
                </div>
            </div>

            <div class="col-sm-6">
              <!-- <div class="float-right d-none d-md-block">
                <button type="button" data-toggle="modal" data-target="#player" class="btn btn-success waves-effect waves-light">Upload Excel</button>
              </div> -->
              <div class="float-right d-none d-md-block mr-2">
                <a href="<?=base_url()?>Managecms"><button type="button" class="btn btn-success waves-effect waves-light">CMS Lists</button></a>
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
                        <form class="custom-validation" method="post" action=""  enctype="multipart/form-data" autocomplete="off">
                          <div class="form-group">
                            <label>Page Title</label>
                            <input type="text" class="form-control" required name="page_title" id="page_title" placeholder="Page Title" value="<?php echo $editpage_data->page_title; ?>" />
                          </div>
                          <div class="form-group">
                            <label>Page Slug</label>
                            <input type="text" class="form-control" required name="page_slug" id="page_slug" placeholder="Page Slug" readonly="readonly" value="<?php echo $editpage_data->page_slug; ?>" />
                          </div>
                          <div class="form-group">
                            <label>Image</label><br/>
                            <?php
                            if($editpage_data->image!="")
                            {
                            ?>
                            <img src="<?php echo base_url()?>assets/uploads/cms/<?php echo $editpage_data->image; ?>" style="width:90px;height:60px;" /><br/><br/>
                            <?php
                            }
                            ?>
                            <input type="file" class="filestyle" name="page_image" id="page_image" placeholder="Image"/>
                            <p class="note">NOTE : Image size maximum 2MB and dimentions ( 100 X 100 ) PX</p>
                            <input type="hidden" name="page_old_image" id="page_old_image" value="<?php echo $editpage_data->image; ?>" />
                          </div>
                          <div class="form-group">
                            <label>Content</label>
                            <textarea name="content" id="summernote" class="form-control" required><?php echo $editpage_data->content; ?></textarea>
                          </div>  
                          <div class="form-group mb-0">
                            <div>
                              <!-- <button type="submit" class="btn btn-success waves-effect waves-light mr-1">
                                  Add Details
                              </button> -->
                              <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $editpage_data->cmsid; ?>" />
                              <input type="submit" class="btn btn-success waves-effect waves-light mr-1" name="editpage" id="editpage" value="Update Details"/>
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