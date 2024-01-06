<div class="page-content">
    <div class="container-fluid">

        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4 class="font-size-18">Statistics Lists</h4>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Members</a></li>
                        <li class="breadcrumb-item active">Statistics Lists</li>
                    </ol>
                </div>
            </div>

        </div>     

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">                       

                        <table id="datatable" class="table table-bordered table-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Member ID</th>
                                <th>Photo</th>
                                <th>Full Name</th>
                                <th>Display Name</th>
                                <th>Member Since</th>
                                <th>Played</th>
                                <th>Win</th>
                                <th>Loss</th>
                                <th>Points</th>
                                <th>Coins</th>
                                <th>Redeem</th>
                                <!-- <th>Status</th> -->
                                <th>View</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php 
                                if(!empty($all_statistics_data))
                                {
                                  $count=1;
                                  foreach($all_statistics_data as $key=>$value)
                                  {
                                ?>  
                                  <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $value['memberid']; ?></td>
                                    <td><?php echo $value['photo']; ?></td>
                                    <td><?php echo $value['fullname']; ?></td>
                                    <td><?php echo $value['displayname']; ?></td>
                                    <td><?php echo date("jS F, Y", strtotime($value['created_at']));?></td>
                                    <td><?php echo $value['total_played']; ?></td>
                                    <td><?php echo $value['win']; ?></td>
                                    <td><?php echo $value['loss']; ?></td>
                                    <td><?php echo $value['points']; ?></td>
                                    <td><?php echo $value['coins']; ?></td>
                                    <td><?php echo $value['redeem']; ?></td>
                                    <!-- <td>
                                      <?php if($value['status']==1){ ?>
                                      <button type="button" class="btn btn-success waves-effect waves-light">Active</button>
                                      <?php }else{ ?>  
                                      <button type="button" class="btn btn-dark waves-effect waves-light">Inactive</button>
                                      <?php } ?>
                                    </td> -->
                                    <td><a href="<?php echo base_url();?>Members/viewparticularstatistics/<?php echo $value['statisticsid']; ?>"><button type="button" class="btn btn-success waves-effect waves-light">View</button></a></td>   
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
                                    <td>Test</td>
                                    <td>Test</td>
                                    <td>Test</td>
                                    <td>Test</td>
                                    <td>Test</td>
                                    <td>4</td>
                                    <td>
                                        <button type="button" class="btn btn-dark waves-effect waves-light">Active</button>
                                        <button type="button" class="btn btn-success waves-effect waves-light">Inactive</button>
                                    </td>
                                    <td><button type="button" class="btn btn-success waves-effect waves-light">View</button></td>
                                    
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Test</td>
                                    <td>Test</td>
                                    <td>Test</td>
                                    <td>Test</td>
                                    <td>Test</td>
                                    <td>Test</td>
                                    <td>Test</td>
                                    <td>Test</td>
                                    <td>Test</td>
                                    <td>Test</td>
                                    <td>5</td>
                                    <td>
                                        <button type="button" class="btn btn-dark waves-effect waves-light">Active</button>
                                        <button type="button" class="btn btn-success waves-effect waves-light">Inactive</button>
                                    </td>
                                    <td><button type="button" class="btn btn-success waves-effect waves-light">View</button></td>
                                    
                                </tr> -->                                 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>            

    </div>
</div>