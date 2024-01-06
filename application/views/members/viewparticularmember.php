<div class="page-content">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4 class="font-size-18"><?php echo $view_particularmember->memberid ?></h4>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master Data</a></li>
                        <li class="breadcrumb-item active">View Member</li>
                    </ol>
                </div>
            </div>

            <div class="col-sm-6">
                <!-- <div class="float-right d-none d-md-block">
                    <button type="button" data-toggle="modal" data-target="#player" class="btn btn-success waves-effect waves-light">Upload Excel</button>
                </div> -->
                <div class="float-right d-none d-md-block mr-2">
                    <a href="<?=base_url()?>Members/all_members"><button type="button" class="btn btn-success waves-effect waves-light">Member Lists</button></a>
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
                              <label>Member ID</label>
                              <input type="text" class="form-control" value="<?php echo $view_particularmember->memberid ?>" readonly />
                            </div>
                            <div class="form-group">
                              <label>Photo</label><br/>
                                <?php
                                if($view_particularmember->photo=="")
                                {
                                ?> 
                                  <img src="<?php echo base_url()?>assets/uploads/registration/avatar.jpg" style="width:90px;height:90px;" /><br/><br/>
                                <?php  
                                }
                                else
                                {
                                ?>  
                                  <img src="<?php echo base_url()?>assets/uploads/registration/<?php echo $view_particularmember->photo; ?>" style="width:90px;height:90px;" /><br/><br/>  
                                <?php
                                }
                                ?>
                            </div>
                            <div class="form-group">
                              <label>Full Name</label>
                              <input type="text" class="form-control" value="<?php echo $view_particularmember->fullname ?>" readonly />
                            </div>
                            
                            <div class="form-group">
                              <label>Display Name</label>
                              <input type="text" class="form-control"  value="<?php echo $view_particularmember->displayname ?>" readonly />
                            </div>
                            <div class="form-group">
                              <label>Age</label>
                              <input type="text" class="form-control"  value="<?php echo $view_particularmember->age ?>" readonly />
                            </div>  
                            <div class="form-group">
                              <label>Email Id</label>
                              <input type="text" class="form-control"  value="<?php echo $view_particularmember->email_id ?>" readonly />
                            </div>
                            <div class="form-group">
                              <label>Mobile No.</label>
                              <input type="text" class="form-control"  value="<?php echo $view_particularmember->mobile_number ?>" readonly />
                            </div>
                            <div class="form-group">
                              <label>Member Since</label>
                              <input type="text" class="form-control"  value="<?php echo date("jS F, Y", strtotime($view_particularmember->created_at)); ?>" readonly />
                            </div>
                            <div class="form-group">
                              <label>Location</label>
                              <input type="text" class="form-control"  value="<?php echo $view_particularmember->location ?>" readonly />
                            </div> 
                            <!-- <div align="right">
                              <button type="button" id="add_more" class="btn btn-primary waves-effect waves-light mr-1">Add More</button>
                            </div> --> 
                            <div class="form-group mb-0">
                            <!-- <div>
                                <input type="submit" class="btn btn-success waves-effect waves-light mr-1" name="addsubcategory" id="addsubcategory" value="Add Details">
                                <button type="reset" class="btn btn-danger waves-effect">
                                    Cancel
                                </button>
                            </div> -->
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>             

    </div>
</div>
<script>
// jQuery(function(){
//     var counter = 0;
//     jQuery('#add_more').click(function(event){
//       //alert("1");
//       event.preventDefault();
//       counter++;
//       var newRow = jQuery('<div class="form-group"><label>Sub Category Name</label><input type="text" class="form-control" name="subcategory_name[]" id="subcategory_name'+counter+'" placeholder="Sub Category Name"/></div><div class="form-group"><label>Sub Category Banner Image</label><input type="file" class="filestyle"  name="sub_category_banner_image[]" id="sub_category_banner_image'+counter+'" placeholder="Sub Category Banner Image"/><p class="note">NOTE : Image size maximum 2MB and dimentions ( 100 X 100 ) PX</p></div><div class="form-group"><label>Meta Keyword</label><input type="text" class="form-control" name="meta_keyword[]" id="meta_keyword'+counter+'" placeholder="Meta Keyword"/></div><div class="form-group"><label>Meta Description</label><textarea name="meta_description[]" id="meta_description'+counter+'" class="form-control"  placeholder="Meta Description"></textarea></div>');
//       jQuery('div.subcategory_list').append(newRow);
//     });
// });
</script>