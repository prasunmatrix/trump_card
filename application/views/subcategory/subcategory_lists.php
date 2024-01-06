<div class="page-content">
    <div class="container-fluid">

        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4 class="font-size-18">Subcategory Lists</h4>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master Data</a></li>
                        <li class="breadcrumb-item active">Subcategory Lists</li>
                    </ol>
                </div>
            </div>

            <div class="col-sm-6">
                <!-- <div class="float-right d-none d-md-block">
                  <button type="button" data-toggle="modal" data-target="#player" class="btn btn-success waves-effect waves-light">Upload Excel</button>
                </div> -->
                <div class="float-right d-none d-md-block mr-2">
                  <a href="<?=base_url()?>Subcategory/add_subcategory"><button type="button" class="btn btn-success waves-effect waves-light">Add Subcategory</button></a>
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
                              <th>Sub Category Name</th>
                              <th>Sub Category Banner Image</th>
                              <!-- <th>Meta Keyword</th>
                              <th>Meta Description</th> -->
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php 
                                if(!empty($all_subcategory_data))
                                {
                                  $count=1;
                                  foreach($all_subcategory_data as $value)
                                  {
                                ?>
                                <tr>
                                  <td><?php echo $count; ?></td>
                                  <td><?php echo  $value['category_name']; ?></td>
                                  <td><?php echo  $value['subcategory_name']; ?></td>
                                  <td><img src="<?php echo base_url()?>assets/uploads/subcategory/<?php echo $value['subcategory_banner_image'] ?>" style="width:90px;height:60px;" /></td>
                                  <!-- <td><?php echo  $value['meta_keyword']; ?></td>
                                  <td><?php echo  $value['meta_description']; ?></td> -->
                                  <td>
                                    <?php if($value['status']==1){ ?>
                                    <a href="<?php echo base_url();?>Subcategory/statuschange/<?php echo $value['subcategoryid']; ?>" onclick="return statusChange();"><button type="button" class="btn btn-success waves-effect waves-light">Active</button></a>
                                    <?php }else{ ?>  
                                    <a href="<?php echo base_url();?>Subcategory/statuschange/<?php echo $value['subcategoryid']; ?>" onclick="return statusChange();"><button type="button" class="btn btn-danger waves-effect waves-light">Inactive</button></a>
                                    <?php } ?>
                                  </td>
                                  <td>
                                    <!-- <button type="button" class="btn btn-success waves-effect waves-light">View</button> -->
                                    <a href="<?php echo base_url();?>Subcategory/editsubcategory/<?php echo $value['subcategoryid']; ?>"><button type="button" class="btn btn-primary waves-effect waves-light">Update</button></a>
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
                                <td>Test</td>
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
                                <td>Test</td>
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
