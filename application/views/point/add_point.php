<div class="page-content">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4 class="font-size-18">Add Point</h4>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master Data</a></li>
                        <li class="breadcrumb-item active">Add Point</li>
                    </ol>
                </div>
            </div>

            <div class="col-sm-6">
                <!-- <div class="float-right d-none d-md-block">
                  <button type="button" data-toggle="modal" data-target="#player" class="btn btn-success waves-effect waves-light">Upload Excel</button>
                </div> -->
                <div class="float-right d-none d-md-block mr-2">
                  <a href="<?=base_url()?>Point"><button type="button" class="btn btn-success waves-effect waves-light">Point Lists</button></a>
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
                        <form class="custom-validation" action="<?php echo site_url(); ?>Point/addpoint" method="post" autocomplete="off">
                          <div class="form-group">
                            <label>Select Category</label>
                            <select required class="form-control" name="category_id" id="Category_Id">
                              <option value="">Select Category</option>
                              <?php
                                if(!empty($all_category_name))
                                {
                                  foreach ($all_category_name as  $value) {    
                                  ?>
                                  <option value="<?php echo $value->categoryid; ?>"><?php echo $value->category_name; ?></option>
                                  <?php
                                  }
                                }
                              ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Select Subcategory</label>
                            <select required class="form-control subcategoryId" name="subcategory_id" id="subcategory_id">
                              <option value="">Select Subcategory</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Select Tournament</label>
                            <select class="form-control" required name="tournament_id" id="tournament_id">
                              <option value="">Select Tournament</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Points On Win</label>
                            <select class="form-control" required name="points_on_win" id="points_on_win">
                              <option value="">Select Points On Win</option>
                              <option value="1.5X">1.5X</option>
                              <option value="2X">2X</option>
                              <option value="2.5X">2.5X</option>
                              <option value="3X">3X</option>
                            </select>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <label>Tenure</label>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <input class="form-control date" type="text" name="formDate" id="formDate" required="required" placeholder="From Date" />
                              </div>
                            </div>
                            
                            <div class="col-md-6">
                              <div class="form-group">
                                <input class="form-control date" type="text" name="toDate" id="toDate" required="required" placeholder="To Date" />
                              </div>
                            </div>
                          </div> 
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
                          <!-- <div align="right">
                            <button type="button" id="add_more" class="btn btn-primary waves-effect waves-light mr-1">Add More</button>
                          </div> -->
                          <div class="form-group mb-0">
                            <div>
                              <!-- <button type="submit" class="btn btn-success waves-effect waves-light mr-1">Add Details</button> -->
                              <!-- <button type="reset" class="btn btn-danger waves-effect">Cancel</button> -->
                              <input type="submit" class="btn btn-success waves-effect waves-light mr-1" name="addpoint" id="addpoint" value="Add Details">
                            </div>
                          </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>             

    </div>
</div>

