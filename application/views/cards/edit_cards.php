<div class="page-content">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4 class="font-size-18">Edit Cards</h4>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master Data</a></li>
                        <li class="breadcrumb-item active">Edit Cards</li>
                    </ol>
                </div>
            </div>

            <div class="col-sm-6">
                <!-- <div class="float-right d-none d-md-block">
                  <button type="button" data-toggle="modal" data-target="#player" class="btn btn-success waves-effect waves-light">Upload Excel</button>
                </div> -->
                <div class="float-right d-none d-md-block mr-2">
                  <a href="<?=base_url()?>Cards"><button type="button" class="btn btn-success waves-effect waves-light">Cards Lists</button></a>
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
                                <option value="<?php echo $value->categoryid; ?>"<?php if($editcardsdetails_data->category_id==$value->categoryid){?> selected="selected" <?php } ?>><?php echo $value->category_name; ?></option>
                                <?php
                                  }
                                }
                                ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Select Subcategory</label>
                            <select required class="form-control subcategory_id" name="subcategory_id" id="subcategory_id">
                              <option value="">Select Subcategory</option>
                              <?php
                                if(!empty($all_subcategory_name))
                                {
                                  foreach ($all_subcategory_name as  $value) {    
                                ?>
                                <option value="<?php echo $value['subcategoryid']; ?>"<?php if($editcardsdetails_data->subcategory_id==$value['subcategoryid']){?> selected="selected" <?php } ?>><?php echo $value['subcategory_name']; ?></option>
                                <?php
                                  }
                                }
                              ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Cards Type</label>
                            <select class="form-control cardtypeId" required name="cardtype_id" id="cardtype_id">
                              <option value="">Select Cards Type</option>
                              <?php
                                if(!empty($all_cardtype_name))
                                {
                                  foreach ($all_cardtype_name as  $value) {    
                                ?>
                                <option value="<?php echo $value['cardtypeid']; ?>"<?php if($editcardsdetails_data->card_type_id==$value['cardtypeid']){?> selected="selected" <?php } ?>><?php echo $value['card_type']; ?></option>
                                <?php
                                  }
                                }
                              ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Select Cards Details</label>
                            <select class="form-control" required name="carddetails_id" id="carddetails_id">
                              <option value="">Select Cards Details</option>
                              <?php
                                if(!empty($all_carddetails_name))
                                {
                                  foreach ($all_carddetails_name as  $value) {    
                                ?>
                                <option value="<?php echo $value['carddetailsid']; ?>"<?php if($editcardsdetails_data->carddetails_id==$value['carddetailsid']){?> selected="selected" <?php } ?>><?php echo $value['card_name']; ?></option>
                                <?php
                                  }
                                }
                              ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Attributes Name and Value</label>
                              <table class="table table-bordered dt-responsive nowrap">
                                <thead>
                                <tr>
                                  <th>Attribute Name</th>
                                  <th>Attribute Value</th>
                                </tr>
                                </thead>
                                <tbody id="attribute_data">
                                 <?php
                                if(!empty($editcardsattributedetails_data))
                                {
                                  foreach($editcardsattributedetails_data as $value1)
                                  {
                                ?>
                                  <tr>
                                    <td><?php echo $value1['attribute_name'] ?></td>
                                    <td>
                                      <input type="hidden" name="attributeid[]" id="attributeid" value="<?php echo $value1['cards_attribute_id']; ?>">
                                      <input type="number" step="any" class="form-control" name="attribute_value[]" id="attribute_value" placeholder="Attribute Value"  value="<?php echo $value1['attribute_value']; ?>"  />
                                    </td>
                                  </tr>
                                <?php
                                  }
                                }  
                                ?>                     
                                </tbody>
                              </table> 
                          </div>  
                          <!-- <div class="form-group">
                            <label>Card Name</label>
                            <input type="text" class="form-control" required name="card_name[]" id="card_name" placeholder="Card Name"/>
                          </div>
                          <div class="form-group">
                            <label>Card Banner Image</label>
                            <input type="file" class="filestyle" required name="card_banner_image[]" id="card_banner_image" placeholder="Card Banner Image"/>
                            <p class="note">NOTE : Image size maximum 2MB and dimentions ( 100 X 100 ) PX</p>
                          </div> -->                          
                          <!-- <div align="right">
                            <button type="button" id="add_more" class="btn btn-primary waves-effect waves-light mr-1">Add More</button>
                          </div> -->
                          <div class="form-group mb-0">
                            <div>
                              <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $editcardsdetails_data->cardsid; ?>" />
                              <input type="submit" name="editcards" id="editcards" class="btn btn-success waves-effect waves-light mr-1" value="Update Details">
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
//     var counter = 0;
//     jQuery('#add_more').click(function(event){
//       //alert("1");
//       event.preventDefault();
//       counter++;
//       var newRow = jQuery('<div class="form-group"><label>Cards Type</label><select class="form-control cardtypeId" required name="cardtype_id" id="cardtype_id"><option value="">Select Cards Type</option></select></div><div class="form-group"><label>Attributes Name and Value</label><table class="table table-bordered dt-responsive nowrap"><thead><tr><th>Attribute Name</th><th>Attribute Value</th></tr></thead><tbody id="attribute_data"></tbody></table></div><div class="form-group"><label>Card Name</label><input type="text" class="form-control"  name="card_name[]" id="card_name'+counter+'" placeholder="Card Name"/></div><div class="form-group"><label>Card Banner Image</label><input type="file" class="filestyle" name="card_banner_image[]" id="card_banner_image'+counter+'" placeholder="Card Banner Image"/><p class="note">NOTE : Image size maximum 2MB and dimentions ( 100 X 100 ) PX</p></div><div class="form-group"><label>Type of Cards</label><select  class="form-control" name="type_of_cards[]" id="type_of_cards'+counter+'"><option value="">Type of Cards</option></select></div><div class="form-group"><label>Attributes Name and Value</label><select  class="form-control" name="attributes_name_value[]" id="attributes_name_value'+counter+'"><option value="">Attributes Name and Value</option></select></div>');
//       jQuery('div.card_list').append(newRow);
//     });
// });
$('#Category_Id').attr("style", "pointer-events: none;");
$('#subcategory_id').attr("style", "pointer-events: none;");
</script>