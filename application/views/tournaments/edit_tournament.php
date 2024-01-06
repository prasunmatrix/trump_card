<div class="page-content">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4 class="font-size-18">Edit Tournament</h4>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master Data</a></li>
                        <li class="breadcrumb-item active">Edit Tournament</li>
                    </ol>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="float-right d-none d-md-block">
                    <a href="<?=base_url()?>Tournaments"><button type="button" class="btn btn-success waves-effect waves-light">Tournament Lists</button></a>
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
                        <form class="custom-validation" action="" method="post" autocomplete="off" enctype="multipart/form-data">
                            <div class="form-group">
                              <label>Select Category</label>
                              <select required class="form-control" name="category_id" id="Category_Id">
                                <option value="">Select Category</option>
                                <?php
                                  if(!empty($all_category_name))
                                  {
                                    foreach ($all_category_name as  $value) {    
                                ?>
                                <option value="<?php echo $value->categoryid; ?>"<?php if($edittournaments_data->category_id==$value->categoryid){?> selected="selected" <?php } ?>><?php echo $value->category_name; ?></option>
                                <?php
                                    }
                                  }
                                ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Select Subcategory</label>
                              <select required class="form-control" name="subcategory_id" id="subcategory_id">
                                <option value="">Select Sub Category</option>
                                <?php
                                  if(!empty($all_subcategory_name))
                                  {
                                    foreach ($all_subcategory_name as  $value) {    
                                ?>
                                <option value="<?php echo $value['subcategoryid']; ?>"<?php if($edittournaments_data->subcategory_id==$value['subcategoryid']){?> selected="selected" <?php } ?>><?php echo $value['subcategory_name']; ?></option>
                                <?php
                                    }
                                  }
                                ?>
                              </select>
                            </div>
                            <div class="form-group">
                                <label>Tournament Name</label>
                                <input type="text" class="form-control" required name="tournament_name" id="tournament_name" placeholder="Tournament Name" value="<?php echo $edittournaments_data->tournament_name; ?>" />
                            </div>  
                            <div class="form-group">
                              <label>Tournament Banner Image</label><br/>
                              <?php
                              if($edittournaments_data->tournament_banner_image!="")
                              {
                              ?>
                              <img src="<?php echo base_url()?>assets/uploads/tournament/<?php echo $edittournaments_data->tournament_banner_image; ?>" style="width:90px;height:60px;" /><br/><br/>
                              <?php
                              }
                              ?>
                              <input type="file" class="filestyle"  name="tournament_banner_image" id="tournament_banner_image" placeholder="Tournament Banner Image"/>
                              <p class="note">NOTE : Image size maximum 2MB and dimentions ( 100 X 100 ) PX</p>
                              <input type="hidden" name="old_tournament_banner_image" id="old_tournament_banner_image" value="<?php echo $edittournaments_data->tournament_banner_image; ?>" />
                            </div>
                            <!-- <div align="right">
                              <button type="button" id="add_more" class="btn btn-primary waves-effect waves-light mr-1">Add More</button>
                            </div> -->
                            <div class="form-group mb-0">
                              <div>
                                <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $edittournaments_data->tournamentid; ?>" />
                                <input type="submit" class="btn btn-success waves-effect waves-light mr-1" name="edittournament" id="edittournament" value="Update Details">
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
//     var counter = 0;
//     jQuery('#add_more').click(function(event){
//       //alert("1");
//       event.preventDefault();
//       counter++;
//       var session_id = "addmore_session_" + counter;
//       var newRow = jQuery('<div id="'+session_id+'"><div class="form-group"><label>Tournament Name</label><input type="text" class="form-control" required name="tournament_name[]" id="tournament_name'+session_id+'" placeholder="Tournament Name"/></div><div class="form-group"><label>Tournament Banner Image</label><input type="file" class="filestyle" required name="tournament_banner_image[]" id="tournament_banner_image'+session_id+'" placeholder="Tournament Banner Image"/><p class="note">NOTE : Image size maximum 2MB and dimentions ( 100 X 100 ) PX</p></div><div align="left"><a href="javascript:void(0)" class="btn btn-danger waves-effect" onclick="remove(this);" data-sessionid="'+session_id+'">Remove</a></div></div>');
//       jQuery('div.tournament_list').append(newRow);
//     });
// });
// function remove(anchor_obj) {
//   var removeId = "#" + $(anchor_obj).data('sessionid');
//   $(removeId).remove();
// }
</script>