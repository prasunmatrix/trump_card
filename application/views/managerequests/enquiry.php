<div class="page-content">
    <div class="container-fluid">

        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4 class="font-size-18">Enquiry Lists</h4>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master Data</a></li>
                        <li class="breadcrumb-item active">Enquiry Lists</li>
                    </ol>
                </div>
            </div>

            <!-- <div class="col-sm-6">
                <div class="float-right d-none d-md-block">
                  <button type="button" data-toggle="modal" data-target="#player" class="btn btn-success waves-effect waves-light">Upload Excel</button>
                </div>
                <div class="float-right d-none d-md-block mr-2">
                  <a href="<?=base_url()?>Category/add_category"><button type="button" class="btn btn-success waves-effect waves-light">Add Category</button></a>
                </div>
            </div> -->

        </div>     

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">                       
                        <div align="center">
                          <?php echo $this->session->flashdata('msg'); ?>  
                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                              <tr>
                                <th>Sl No.</th>
                                <th>Full Name</th>
                                <th>Email ID</th>
                                <th>Mobile</th>
                                <th>Location</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              if(!empty($all_enquiry_data))
                              {
                                $count=1;
                                foreach($all_enquiry_data as $value)
                                {
                                  ?>
                                  <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $value['full_name']; ?></td>
                                    <td><?php echo $value['email_id']; ?></td>
                                    <td><?php echo $value['mobile_no']; ?></td>
                                    <td><?php echo $value['location']; ?></td>
                                    <td>
                                      <a href="<?php echo base_url();?>Managerequests/viewenquiry/<?php echo $value['enquiryid']; ?>"><button type="button" class="btn btn-success waves-effect waves-light">View</button></a>
                                      <?php
                                      if($value['is_reply']=="1")
                                      {
                                        ?>
                                        <button type="button" class="btn btn-primary waves-effect waves-light" id="reply">Reply</button>
                                        <?php
                                      }
                                      else
                                      {
                                        ?>
                                        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#exampleModal">Reply</button>
                                        <?php
                                      }
                                      ?>   
                                    </td>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Reply</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <form method="post" name="replyfrm" id="replyfrm" action="<?php echo site_url(); ?>Managerequests/emailreply" autocomplete="off">
                                              <div class="form-group">
                                                <input type="email" class="form-control" name="email_id" id="email_id" value="<?php echo $value['email_id']; ?>" placeholder="To">
                                              </div>
                                              <div class="form-group">
                                                <input type="text" class="form-control" name="message_subject" id=" message_subject" value="RE: <?php echo $value['message_subject']; ?>" placeholder="Subject">
                                              </div>
                                              <div class="form-group">
                                                <textarea name="reply_meeage" id="summernote" class="form-control" required ></textarea>  
                                              </div>
                                              <div class="btn-toolbar form-group mb-0">
                                                <!-- <button class="btn btn-primary waves-effect waves-light" type="submit" onclick="submitForm();"><span>Send</span><i class="fab fa-telegram-plane ml-1"></i></button> -->
                                                <input type="hidden" name="enquiryid" id="enquiryid" value="<?php echo $value['enquiryid']; ?>">
                                                <input type="submit" class="btn btn-primary waves-effect waves-light" name="sendemail" id="sendemail" value="Send" />
                                              </div>
                                          </form>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                          </div>
                                        </div>
                                      </div>
                                    </div>                                
                                  </tr>
                                  <?php
                                  $count++;
                                }
                              }
                              ?>                                  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>


