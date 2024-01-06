<div class="page-content">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4 class="font-size-18">Add Gifts</h4>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master Data</a></li>
                        <li class="breadcrumb-item active">Add Gifts</li>
                    </ol>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="float-right d-none d-md-block">
                    <button type="button" data-toggle="modal" data-target="#player" class="btn btn-success waves-effect waves-light">Upload Excel</button>
                </div>
                <div class="float-right d-none d-md-block mr-2">
                    <a href="<?=base_url()?>Gifts"><button type="button" class="btn btn-success waves-effect waves-light">Gifts Lists</button></a>
                </div>
            </div>
        </div>     

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form class="custom-validation" action="#">
                            <div class="form-group">
                              <label>Select Category</label>
                              <select required class="form-control">
                                  <option value="">Select Category</option>
                              </select>
                            </div>
                            <div class="gifts_list">
                              <div class="form-group">
                                <label>Select Subcategory</label>
                                <select required class="form-control">
                                  <option value="">Select Subcategory</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label>Gift / Voucher Name</label>
                                <input type="text" class="form-control" required name="gift_name[]" id="gift_name" placeholder="Gift / Voucher name"/>
                              </div>
                              <div class="form-group">
                                <label>Gift / Voucher Value</label>
                                <input type="number" class="form-control" required name="gift_value[]" id="gift_value" placeholder="Gift / Voucher Value"/>
                              </div>
                              <div class="form-group">
                                <label>Coins Redeem Value</label>
                                <input type="number" class="form-control" required name="coins_redeem_value[]" id="coins_redeem_value" placeholder="Coins Redeem Value"/>
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
      var newRow = jQuery('<div class="form-group"><label>Select Subcategory</label><select required class="form-control"><option value="">Select Subcategory</option></select></div><div class="form-group"><label>Gift / Voucher Name</label><input type="text" class="form-control" required name="gift_name[]" id="gift_name'+counter+'" placeholder="Gift / Voucher name"/></div><div class="form-group"><label>Gift / Voucher Value</label><input type="number" class="form-control" required name="gift_value[]" id="gift_value'+counter+'" placeholder="Gift / Voucher Value"/></div><div class="form-group"><label>Coins Redeem Value</label><input type="number" class="form-control" required name="coins_redeem_value[]" id="coins_redeem_value'+counter+'" placeholder="Coins Redeem Value"/></div><div class="form-group"><label>Status</label><div class="custom-control custom-radio custom-control-inline"><input type="radio" id="active'+counter+'" name="status['+counter+']" class="custom-control-input" required="required"><label class="custom-control-label" for="active'+counter+'">Active</label></div><div class="custom-control custom-radio custom-control-inline"><input type="radio" id="inactive'+counter+'" name="status['+counter+']" class="custom-control-input" required="required"><label class="custom-control-label" for="inactive'+counter+'">Inactive</label></div></div>');
      jQuery('div.gifts_list').append(newRow);
    });
});
</script>