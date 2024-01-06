<div class="page-content">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4 class="font-size-18">Add Attribute & Points</h4>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master Data</a></li>
                        <li class="breadcrumb-item active">Add Attribute & Points</li>
                    </ol>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="float-right d-none d-md-block">
                    <button type="button" data-toggle="modal" data-target="#player" class="btn btn-success waves-effect waves-light">Upload Excel</button>
                </div>
                <div class="float-right d-none d-md-block mr-2">
                    <a href="<?=base_url()?>Attribute"><button type="button" class="btn btn-success waves-effect waves-light">Attribute Lists</button></a>
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
                            <div class="attribute_list">
                              <div class="form-group">
                                <label>Attribute Name</label>
                                <input type="text" class="form-control" required name="attribute_name[]" id="attribute_name" placeholder="Attribute Name"/>
                              </div>
                              <div class="form-group">
                                <label>Attribute Win</label>
                                <select  class="form-control" name="attribute_win[]" id="attribute_win" required="required">
                                  <option value="">Select Attribute Win</option>
                                  <option value="Highest Value">Highest Value</option>
                                  <option value="Lowest Value">Lowest Value</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label>Point Assigned</label>
                                <input type="number" class="form-control" required name="point_assigned[]" id="point_assigned" placeholder="Point Assigned"/>
                              </div>
                            </div>
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
    var counter = 1;
    jQuery('#add_more').click(function(event){
      //alert("1");
      event.preventDefault();
      counter++;
      var newRow = jQuery('<div class="form-group"><label>Attribute Name</label><input type="text" class="form-control" name="attribute_name[]" id="attribute_name'+counter+'" placeholder="Attribute Name"/></div><div class="form-group"><label>Attribute Win</label><select  class="form-control" name="attribute_win[]" id="attribute_win'+counter+'" required="required"><option value="">Select Attribute Win</option><option value="Highest Value">Highest Value</option><option value="Lowest Value">Lowest Value</option></select></div><div class="form-group"><label>Point Assigned</label><input type="number" class="form-control" name="point_assigned[]" id="point_assigned'+counter+'" placeholder="Point Assigned"/></div>');
      jQuery('div.attribute_list').append(newRow);
    });
});
</script>