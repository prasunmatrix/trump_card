<div class="page-content">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4 class="font-size-18">Profile</h4>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="fa fa-home"></i> Home</a></li>
                        <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Master Data</a></li> -->
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>

            <div class="col-sm-6">
                <!-- <div class="float-right d-none d-md-block">
                    <button type="button" data-toggle="modal" data-target="#player" class="btn btn-success waves-effect waves-light">Upload Excel</button>
                </div> -->
                <!-- <div class="float-right d-none d-md-block mr-2">
                    <a href="<?=base_url()?>Attribute"><button type="button" class="btn btn-success waves-effect waves-light">Attribute Lists</button></a>
                </div> -->
            </div>
        </div>     

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div align="center">
                          <?php echo $this->session->flashdata('msg'); ?>  
                        </div>
                        <form class="custom-validation" action="<?php echo site_url(); ?>Admin/editProfile" method="post" autocomplete="off">
                          <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" required name="profile_name" id="profile_name" placeholder="Name" value="<?php echo $profile_details->name; ?>" />
                          </div>
                          <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" required name="username" id="username" placeholder="Username" value="<?php echo $profile_details->username; ?>"/>
                          </div>
                          <div class="form-group">
                            <label>Contact No</label>
                            <input type="number" class="form-control" required name="contact_no" id="contact_no" placeholder="Contact No" value="<?php echo $profile_details->contact_no; ?>"/>
                          </div>
                          <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" id="address" required="required" class="form-control"  placeholder="Address"><?php echo $profile_details->address; ?></textarea>
                          </div>    
                          <div class="form-group mb-0">
                            <div>
                              <input type="submit" class="btn btn-success waves-effect waves-light mr-1" name="edit_profile" id="edit_profile" value="Edit Profile">
                              <!-- <button type="reset" class="btn btn-danger waves-effect">Cancel</button> -->
                            </div>
                          </div>
                        </form><br/><hr><hr>
                        <div align="center">
                          <?php echo $this->session->flashdata('error'); ?>
                          <?php echo $this->session->flashdata('success'); ?>  
                        </div>
                        <form class="custom-validation" action="<?php echo site_url(); ?>Admin/password_change" method="post" autocomplete="off">
                          <div class="form-group">
                            <label>Old Password</label>
                            <input type="password" class="form-control" required name="old_password" id="old_password" placeholder="Old Password"/>
                          </div>
                          <div class="form-group">
                            <label>New Password</label>
                            <input type="password" class="form-control" required name="new_password" id="new_password" placeholder="New Password"/>
                          </div>
                          <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" required name="confirm_password" id="confirm_password" placeholder="Confirm Password" />
                          </div>    
                          <div class="form-group mb-0">
                            <div>
                              <input type="submit" class="btn btn-success waves-effect waves-light mr-1" name="passwordChange" id="passwordChange" value="Password Change">
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
<script>
// jQuery(function(){
//     var counter = 1;
//     jQuery('#add_more').click(function(event){
//       //alert("1");
//       event.preventDefault();
//       counter++;
//       var session_id = "addmore_session_" + counter;
//       var newRow = jQuery('<div id="'+session_id+'"><div class="form-group"><label>Attribute Name</label><input type="text" class="form-control" required name="attribute_name[]" id="attribute_name'+session_id+'" placeholder="Attribute Name"/></div><div class="form-group"><label>Attribute Win</label><select  class="form-control" name="attribute_win[]" id="attribute_win'+session_id+'" required="required"><option value="">Select Attribute Win</option><option value="Highest Value">Highest Value</option><option value="Lowest Value">Lowest Value</option></select></div><div class="form-group"><label>Point Assigned</label><input type="number" class="form-control" required name="point_assigned[]" id="point_assigned'+session_id+'" placeholder="Point Assigned" step="any"/></div><div align="left"><a href="javascript:void(0)" class="btn btn-danger waves-effect" onclick="remove(this);" data-sessionid="'+session_id+'">Remove</a></div></div>');
//       jQuery('div.attribute_list').append(newRow);
//     });
// });

// function remove(anchor_obj) {
//   var removeId = "#" + $(anchor_obj).data('sessionid');
//   $(removeId).remove();
// }
</script>