<div class="page-content">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4 class="font-size-18">View Enquiry</h4>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master Data</a></li>
                        <li class="breadcrumb-item active">View Enquiry</li>
                    </ol>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="float-right d-none d-md-block mr-2">
                  <a href="<?=base_url()?>Managerequests"><button type="button" class="btn btn-success waves-effect waves-light">Enquiry Lists</button></a>
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
                        <div class="form-group">
                          <label>Full Name</label>
                          <input type="text" class="form-control" value="<?php echo $particular_enquiry_data->full_name ?>" readonly />
                        </div>
                        <div class="form-group">
                          <label>Email Id</label>
                          <input type="text" class="form-control" value="<?php echo $particular_enquiry_data->email_id ?>" readonly />
                        </div>
                        <div class="form-group">
                          <label>Mobile Number</label>
                          <input type="text" class="form-control"  value="<?php echo $particular_enquiry_data->mobile_no ?>" readonly />
                        </div>
                        <div class="form-group">
                          <label>Location</label>
                          <input type="text" class="form-control"  value="<?php echo $particular_enquiry_data->location ?>" readonly />
                        </div>
                        <div class="form-group">
                          <label>Message Date</label>
                          <input type="text" class="form-control"  value="<?php echo date("jS F, Y", strtotime($particular_enquiry_data->message_date)); ?>" readonly />
                        </div>  
                        <div class="form-group">
                          <label>Message Subject</label>
                          <input type="text" class="form-control"  value="<?php echo $particular_enquiry_data->message_subject ?>" readonly />
                        </div>
                        <div class="form-group">
                          <label>Message Body</label>
                          <textarea class="form-control" rows="8" readonly="readonly"><?php echo $particular_enquiry_data->message_body ?></textarea>
                        </div> 
                        <div class="form-group mb-0">
                        <!-- <div>
                            <input type="submit" class="btn btn-success waves-effect waves-light mr-1" name="addsubcategory" id="addsubcategory" value="Add Details">
                        </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>             
    </div>
</div>
