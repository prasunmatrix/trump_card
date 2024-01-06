<div class="page-content">
    <div class="container-fluid">

        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4 class="font-size-18">Cardtype Lists</h4>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master Data</a></li>
                        <li class="breadcrumb-item active">Cardtype Lists</li>
                    </ol>
                </div>
            </div>

            <div class="col-sm-6">
                <!-- <div class="float-right d-none d-md-block">
                  <button type="button" data-toggle="modal" data-target="#player" class="btn btn-success waves-effect waves-light">Upload Excel</button>
                </div> -->
                <div class="float-right d-none d-md-block mr-2">
                  <a href="<?=base_url()?>Cardtype/add_cardtype"><button type="button" class="btn btn-success waves-effect waves-light">Add Cardtype</button></a>
                </div>
            </div>

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
                              <th>Category Name</th>
                              <th>Subcategory Name</th>
                              <th>Card Type</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php 
                                if(!empty($all_cardtype_data))
                                {
                                  $count=1;
                                  foreach($all_cardtype_data as $value)
                                  {
                              ?>
                              <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $value['category_name']; ?></td>
                                <td><?php echo $value['subcategory_name']; ?></td>
                                <td><?php echo $value['card_type']; ?></td>
                                <td>
                                  <?php if($value['status']==1){ ?>
                                  <a href="<?php echo base_url();?>Cardtype/statuschange/<?php echo $value['cardtypeid']; ?>" onclick="return statusChange();"><button type="button" class="btn btn-success waves-effect waves-light">Active</button></a>
                                  <?php }else{ ?>  
                                  <a href="<?php echo base_url();?>Cardtype/statuschange/<?php echo $value['cardtypeid']; ?>" onclick="return statusChange();"><button type="button" class="btn btn-danger waves-effect waves-light">Inactive</button></a>
                                  <?php } ?>
                                </td>
                                <td>
                                  <!-- <button type="button" class="btn btn-success waves-effect waves-light">View</button> -->
                                  <a href="<?php echo base_url();?>Cardtype/editcardtype/<?php echo $value['cardtypeid']; ?>"><button type="button" class="btn btn-primary waves-effect waves-light">Update</button></a>
                                </td>                                
                              </tr>
                              <?php
                                  $count++;
                                  }
                                }
                              ?> 
                              <!-- <tr>
                                <td>2</td>
                                <td>Test</td>
                                <td>Test</td>
                                <td>
                                    <button type="button" class="btn btn-primary waves-effect waves-light">Active</button>
                                    <button type="button" class="btn btn-warning waves-effect waves-light">Inactive</button>
                                </td>
                                <td>
                                  <button type="button" class="btn btn-success waves-effect waves-light">View</button>
                                  <button type="button" class="btn btn-success waves-effect waves-light">Edit</button>
                                </td>                                
                              </tr>
                              <tr>
                                <td>3</td>
                                <td>Test</td>
                                <td>Test</td>
                                <td>
                                    <button type="button" class="btn btn-primary waves-effect waves-light">Active</button>
                                    <button type="button" class="btn btn-warning waves-effect waves-light">Inactive</button>
                                </td>
                                <td>
                                  <button type="button" class="btn btn-success waves-effect waves-light">View</button>
                                  <button type="button" class="btn btn-success waves-effect waves-light">Edit</button>
                                </td>                                
                              </tr> -->                                  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>
