<div class="page-content">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4 class="font-size-18">Add Cards</h4>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master Data</a></li>
                        <li class="breadcrumb-item active">Add Cards</li>
                    </ol>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="float-right d-none d-md-block">
                    <button type="button" data-toggle="modal" data-target="#player" class="btn btn-success waves-effect waves-light">Upload Excel</button>
                </div>
                <div class="float-right d-none d-md-block mr-2">
                    <a href="<?=base_url()?>Cards"><button type="button" class="btn btn-success waves-effect waves-light">Cards Lists</button></a>
                </div>
            </div>
        </div>     

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form class="custom-validation" action="#">
                            <div class="form-group">
                              <label>Select Sub Category</label>
                              <select required class="form-control">
                                  <option value="">Select Sub Category</option>
                              </select>
                            </div>
                            <div class="card_list">
                              <div class="form-group">
                                <label>Card Name</label>
                                <input type="text" class="form-control" required name="card_name[]" id="card_name" placeholder="Card Name"/>
                              </div>
                              <div class="form-group">
                                <label>Card Banner Image</label>
                                <input type="file" class="filestyle" required name="card_banner_image[]" id="card_banner_image" placeholder="Card Banner Image"/>
                                <p class="note">NOTE : Image size maximum 2MB and dimentions ( 100 X 100 ) PX</p>
                              </div>
                              <div class="form-group">
                                <label>Type of Cards</label>
                                <select  class="form-control" name="type_of_cards[]" id="type_of_cards">
                                  <option value="">Type of Cards</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label>Attributes Name and Value</label>
                                <select  class="form-control" name="attributes_name_value[]" id="attributes_name_value">
                                  <option value="">Attributes Name and Value</option>
                                </select>
                              </div> 
                              <div class="form-group">
                                <label>Status</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="active" name="status[0]" class="custom-control-input" required="required">
                                  <label class="custom-control-label" for="active">Active</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="inactive" name="status[0]" class="custom-control-input" required="required">
                                  <label class="custom-control-label" for="inactive">Inactive</label>
                                </div>
                              </div>
                            </div>  
                            <!-- <div class="form-group">
                                <label>Criteria</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                    <label class="form-check-label mr-1" for="inlineCheckbox1">Custom Checkbox</label>
                                </div>       
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option1">
                                    <label class="form-check-label mr-1" for="inlineCheckbox2">Custom Checkbox</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option1">
                                    <label class="form-check-label mr-1" for="inlineCheckbox3">Custom Checkbox</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="option1">
                                    <label class="form-check-label mr-1" for="inlineCheckbox4">Custom Checkbox</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="option1">
                                    <label class="form-check-label mr-1" for="inlineCheckbox5">Custom Checkbox</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox6" value="option1">
                                    <label class="form-check-label mr-1" for="inlineCheckbox6">Custom Checkbox</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox7" value="option1">
                                    <label class="form-check-label mr-1" for="inlineCheckbox7">Custom Checkbox</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox8" value="option1">
                                    <label class="form-check-label mr-1" for="inlineCheckbox8">Custom Checkbox</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox9" value="option1">
                                    <label class="form-check-label mr-1" for="inlineCheckbox9">Custom Checkbox</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox10" value="option1">
                                    <label class="form-check-label mr-1" for="inlineCheckbox10">Custom Checkbox</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox11" value="option1">
                                    <label class="form-check-label mr-1" for="inlineCheckbox11">Custom Checkbox</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox12" value="option1">
                                    <label class="form-check-label mr-1" for="inlineCheckbox12">Custom Checkbox</label>
                                </div>
                            </div> -->
                            <div align="right">
                              <button type="button" id="add_more" class="btn btn-primary waves-effect waves-light mr-1">Add More</button>
                            </div>
                            <div class="form-group mb-0">
                                <div>
                                    <button type="submit" class="btn btn-success waves-effect waves-light mr-1">
                                        Add Details
                                    </button>
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
      var newRow = jQuery('<div class="form-group"><label>Card Name</label><input type="text" class="form-control"  name="card_name[]" id="card_name'+counter+'" placeholder="Card Name"/></div><div class="form-group"><label>Card Banner Image</label><input type="file" class="filestyle" name="card_banner_image[]" id="card_banner_image'+counter+'" placeholder="Card Banner Image"/><p class="note">NOTE : Image size maximum 2MB and dimentions ( 100 X 100 ) PX</p></div><div class="form-group"><label>Type of Cards</label><select  class="form-control" name="type_of_cards[]" id="type_of_cards'+counter+'"><option value="">Type of Cards</option></select></div><div class="form-group"><label>Attributes Name and Value</label><select  class="form-control" name="attributes_name_value[]" id="attributes_name_value'+counter+'"><option value="">Attributes Name and Value</option></select></div><div class="form-group"><label>Status</label><div class="custom-control custom-radio custom-control-inline"><input type="radio" id="active'+counter+'" name="status['+counter+']" class="custom-control-input"><label class="custom-control-label" for="active'+counter+'">Active</label></div><div class="custom-control custom-radio custom-control-inline"><input type="radio" id="inactive'+counter+'" name="status['+counter+']" class="custom-control-input"><label class="custom-control-label" for="inactive'+counter+'">Inactive</label></div></div>');
      jQuery('div.card_list').append(newRow);
    });
});
</script>