<div class="page-content">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4 class="font-size-18">Edit Gifts</h4>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master Data</a></li>
                        <li class="breadcrumb-item active">Edit Gifts</li>
                    </ol>
                </div>
            </div>

            <div class="col-sm-6">
              <!-- <div class="float-right d-none d-md-block">
                <button type="button" data-toggle="modal" data-target="#player" class="btn btn-success waves-effect waves-light">Upload Excel</button>
              </div> -->
              <div class="float-right d-none d-md-block mr-2">
                <a href="<?=base_url()?>Gifts"><button type="button" class="btn btn-success waves-effect waves-light">Gifts Lists</button></a>
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
                        <form class="custom-validation" action="" method="post" autocomplete="off">
                            <div class="form-group">
                              <label>Select Category</label>
                              <select required class="form-control" name="category_id" id="Category_Id">
                                <option value="">Select Category</option>
                                <?php
                                if(!empty($all_category_name))
                                {
                                  foreach ($all_category_name as  $value) {    
                                  ?>
                                  <option value="<?php echo $value->categoryid; ?>"<?php if($editgifts_data->category_id==$value->categoryid){?> selected="selected" <?php } ?>><?php echo $value->category_name; ?></option>
                                  <?php
                                  }
                                }
                                ?>
                              </select>
                            </div>
                            <div class="gifts_list">
                              <div class="form-group">
                                <label>Select Subcategory</label>
                                <select required class="form-control" name="subcategory_id" id="subcategory_id">
                                  <option value="">Select Subcategory</option>
                                  <?php
                                  if(!empty($all_subcategory_name))
                                  {
                                    foreach ($all_subcategory_name as  $value) {    
                                ?>
                                  <option value="<?php echo $value['subcategoryid']; ?>"<?php if($editgifts_data->subcategory_id==$value['subcategoryid']){?> selected="selected" <?php } ?>><?php echo $value['subcategory_name']; ?></option>
                                <?php
                                    }
                                  }
                                ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <label>Gift / Voucher Name</label>
                                <input type="text" class="form-control" required name="gift_name" id="gift_name" placeholder="Gift / Voucher name" value="<?php echo $editgifts_data->gift_voucher_name; ?>" />
                              </div>
                              <div class="form-group">
                                <label>Gift / Voucher Value</label>
                                <input type="number" class="form-control" required name="gift_value" id="gift_value" placeholder="Gift / Voucher Value" value="<?php echo $editgifts_data->gift_voucher_value; ?>"/>
                              </div>
                              <div class="form-group">
                                <label>Coins Redeem Value</label>
                                <input type="number" class="form-control" required name="coins_redeem_value" id="coins_redeem_value" placeholder="Coins Redeem Value" value="<?php echo $editgifts_data->coin_reedem_value; ?>" />
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
                            </div>  
                            <!-- <div align="right">
                              <button type="button" id="add_more" class="btn btn-primary waves-effect waves-light mr-1">Add More</button>
                            </div> -->
                            <div class="form-group mb-0">
                              <div>
                                <!-- <button type="submit" class="btn btn-success waves-effect waves-light mr-1">Add Details</button>
                                <button type="reset" class="btn btn-danger waves-effect">Cancel</button> -->
                                <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $editgifts_data->giftsid; ?>" />
                                <input type="submit" name="editgifts" id="editgifts" class="btn btn-success waves-effect waves-light mr-1" value="Update Details">
                              </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>             
    </div>
</div>
