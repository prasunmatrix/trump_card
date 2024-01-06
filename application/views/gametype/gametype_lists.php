<div class="page-content">
    <div class="container-fluid">

        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4 class="font-size-18">Game Type Lists</h4>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master Data</a></li>
                        <li class="breadcrumb-item active">Game Type Lists</li>
                    </ol>
                </div>
            </div>

            <div class="col-sm-6">
                <!-- <div class="float-right d-none d-md-block">
                  <button type="button" data-toggle="modal" data-target="#player" class="btn btn-success waves-effect waves-light">Upload Excel</button>
                </div> -->
                <div class="float-right d-none d-md-block mr-2">
                    <a href="<?=base_url()?>Gametype/add_gametype"><button type="button" class="btn btn-success waves-effect waves-light">Add Game Type</button></a>
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
                              <th>Game Type Name</th>
                              <th>Cards To Be Played</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php
                              if(!empty($all_gametype_data))
                              {
                                $count=1;
                                foreach($all_gametype_data as $value)
                                {
                              ?>
                                  <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $value['category_name']; ?></td>
                                    <td><?php echo $value['subcategory_name']; ?></td>
                                    <td><?php echo $value['gametype_name']; ?></td>
                                    <td><?php echo $value['cards_to_be_played']; ?></td>
                                    <td>
                                      <?php if($value['status']==1){ ?>
                                        <a href="<?php echo base_url();?>Gametype/statuschange/<?php echo $value['gametypeid']; ?>" onclick="return statusChange();"><button type="button" class="btn btn-success waves-effect waves-light">Active</button></a>
                                      <?php }else{ ?>  
                                        <a href="<?php echo base_url();?>Gametype/statuschange/<?php echo $value['gametypeid']; ?>" onclick="return statusChange();"><button type="button" class="btn btn-danger waves-effect waves-light">Inactive</button></a>
                                      <?php } ?>
                                    </td>
                                    <td>
                                      <!-- <button type="button" class="btn btn-success waves-effect waves-light">View</button> -->
                                      <a href="<?php echo base_url();?>Gametype/editgametype/<?php echo $value['gametypeid']; ?>"><button type="button" class="btn btn-primary waves-effect waves-light">Update</button></a>
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
                                <td>15,21,30</td>
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
                                <td>20,28,40</td>
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
