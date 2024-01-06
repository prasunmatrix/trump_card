<div class="page-content">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4 class="font-size-18">Edit Attribute & Points</h4>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master Data</a></li>
                        <li class="breadcrumb-item active">Edit Attribute & Points</li>
                    </ol>
                </div>
            </div>

            <div class="col-sm-6">
                <!-- <div class="float-right d-none d-md-block">
                    <button type="button" data-toggle="modal" data-target="#player" class="btn btn-success waves-effect waves-light">Upload Excel</button>
                </div> -->
                <div class="float-right d-none d-md-block mr-2">
                    <a href="<?=base_url()?>Attribute"><button type="button" class="btn btn-success waves-effect waves-light">Attribute Lists</button></a>
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
                                <option value="<?php echo $value->categoryid; ?>"<?php if($editattribute_data->category_id==$value->categoryid){?> selected="selected" <?php } ?>><?php echo $value->category_name; ?></option>
                                <?php
                                    }
                                  }
                                ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Select Sub Category</label>
                              <select required class="form-control" name="subcategory_id" id="subcategory_id">
                                <option value="">Select Subcategory</option>
                                <?php
                                  if(!empty($all_subcategory_name))
                                  {
                                    foreach ($all_subcategory_name as  $value) {    
                                ?>
                                  <option value="<?php echo $value['subcategoryid']; ?>"<?php if($editattribute_data->subcategory_id==$value['subcategoryid']){?> selected="selected" <?php } ?>><?php echo $value['subcategory_name']; ?></option>
                                <?php
                                    }
                                  }
                                ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Select Card Type</label>
                              <select required class="form-control" name="cardtype_id" id="cardtype_id">
                                <option value="">Select Card Type</option>
                                <?php
                                  if(!empty($all_cardtype_name))
                                  {
                                    foreach ($all_cardtype_name as  $value) {    
                                ?>
                                  <option value="<?php echo $value['cardtypeid']; ?>"<?php if($editattribute_data->card_type_id==$value['cardtypeid']){?> selected="selected" <?php } ?>><?php echo $value['card_type']; ?></option>
                                <?php
                                    }
                                  }
                                ?>
                              </select>
                            </div>
                            <div class="attribute_list">
                              <div class="form-group">
                                <label>Attribute Name</label>
                                <input type="text" class="form-control" required name="attribute_name" id="attribute_name" placeholder="Attribute Name" value="<?php echo $editattribute_data->attribute_name; ?>" />
                              </div>
                              <!-- <div class="form-group">
                                <label>Attribute Value</label>
                                <input type="number" class="form-control" required name="attribute_value" id="attribute_value" placeholder="Attribute Value" step="any" value="<?php echo $editattribute_data->attribute_value; ?>"/>
                              </div> -->
                              <div class="form-group">
                                <label>Attribute Win</label>
                                <select  class="form-control" name="attribute_win" id="attribute_win" required="required">
                                  <option value="">Select Attribute Win</option>
                                  <option value="Highest Value"<?php if($editattribute_data->attribute_win=="Highest Value"){?> selected="selected" <?php } ?>>Highest Value</option>
                                  <option value="Lowest Value"<?php if($editattribute_data->attribute_win=="Lowest Value"){?> selected="selected" <?php } ?>>Lowest Value</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label>Point Assigned</label>
                                <input type="number" class="form-control" required name="point_assigned" id="point_assigned" placeholder="Point Assigned" step="any" value="<?php echo $editattribute_data->point_assigned; ?>"/>
                              </div>
                            </div>
                            <!-- <div align="right">
                              <button type="button" id="add_more" class="btn btn-primary waves-effect waves-light mr-1">Add More</button>
                            </div> -->    
                            <div class="form-group mb-0">
                              <div>
                                <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $editattribute_data->attributeid; ?>" />
                                <input type="submit" class="btn btn-success waves-effect waves-light mr-1" name="editattribute" id="editattribute" value="Update Details">
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
jQuery(function(){
    var counter = 1;
    jQuery('#add_more').click(function(event){
      //alert("1");
      event.preventDefault();
      counter++;
      var session_id = "addmore_session_" + counter;
      var newRow = jQuery('<div id="'+session_id+'"><div class="form-group"><label>Attribute Name</label><input type="text" class="form-control" required name="attribute_name[]" id="attribute_name'+session_id+'" placeholder="Attribute Name"/></div><div class="form-group"><label>Attribute Value</label><input type="number" class="form-control" required name="attribute_value[]" id="attribute_value'+session_id+'" placeholder="Attribute Value" step="any"/></div><div class="form-group"><label>Attribute Win</label><select  class="form-control" name="attribute_win[]" id="attribute_win'+session_id+'" required="required"><option value="">Select Attribute Win</option><option value="Highest Value">Highest Value</option><option value="Lowest Value">Lowest Value</option></select></div><div class="form-group"><label>Point Assigned</label><input type="number" class="form-control" required name="point_assigned[]" id="point_assigned'+session_id+'" placeholder="Point Assigned" step="any"/></div><div align="left"><a href="javascript:void(0)" class="btn btn-danger waves-effect" onclick="remove(this);" data-sessionid="'+session_id+'">Remove</a></div></div>');
      jQuery('div.attribute_list').append(newRow);
    });
});

function remove(anchor_obj) {
  var removeId = "#" + $(anchor_obj).data('sessionid');
  $(removeId).remove();
}
</script>