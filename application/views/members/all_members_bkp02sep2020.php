<div class="page-content">
    <div class="container-fluid">

        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4 class="font-size-18">Member Lists</h4>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Members</a></li>
                        <li class="breadcrumb-item active">All Members</li>
                    </ol>
                </div>
            </div>

        </div> 

        <div class="row">
          <div class="col-4">
              <div class="card">
                  <div class="card-body pb-1">                       
                      <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <select required class="form-control" id="mem_filter">
                                  <option <?php if($this->input->get('members') == 0){ ?> <?php echo "selected"; ?> <?php } ?> value="0">All Members</option>
                                  <option <?php if($this->input->get('members') == 1){ ?> <?php echo "selected"; ?> <?php } ?> value="1">Last 7 days</option>
                                  <option <?php if($this->input->get('members') == 2){ ?> <?php echo "selected"; ?> <?php } ?> value="2">Last 15 day</option>
                                  <option <?php if($this->input->get('members') == 3){ ?> <?php echo "selected"; ?> <?php } ?> value="3">Last 1 Month</option>
                              </select>
                            </div>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-8">
              <div class="card">
                  <div class="card-body" style="padding-bottom: 20px;">                       
                      <div class="row">
                        <div class="col-md-5">
                          <input type="text" placeholder="From Date" class="form-control" name="from_date">
                        </div>
                        <div class="col-md-5">
                          <input type="text" placeholder="To Date" class="form-control" name="to_date">
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-success" id="date_filter" type="button">Search</button>
                        </div>
                      </div>
                  </div>
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
                                <th>Age</th>
                                <th>Email Id</th>
                                <th>Mobile No.</th>
                                <th>Member Since</th>
                                <th>Location</th>
                                <th>View Details</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="Ajax_View">
                              <?php $count=1; foreach ($all_members_data as $key => $value) { ?>
                              <tr>
                                  <td><?php echo $count; ?></td>
                                  <td><?php echo $value['memberid']; ?></td>
                                  <td><?php echo $value['photo']; ?></td>
                                  <td><?php echo $value['fullname']; ?></td>
                                  <td><?php echo $value['displayname']; ?></td>
                                  <td><?php echo $value['age']; ?></td>
                                  <td><?php echo $value['email_id']; ?></td>
                                  <td><?php echo $value['mobile_number']; ?></td>
                                  <td><?php echo date("jS F, Y", strtotime($value['member_since']));?></td>
                                  <td><?php echo $value['location']; ?></td>
                                  <td><button type="button" class="btn btn-success waves-effect waves-light">View</button></td>
                                  <td>
                                    <?php if($value['status']==1){ ?>
                                        <button type="button" class="btn btn-success waves-effect waves-light">Active</button>
                                    <?php }else{ ?>  
                                        <button type="button" class="btn btn-dark waves-effect waves-light">Inactive</button>
                                    <?php } ?>
                                  </td>
                              </tr>
                              <?php $count++;} ?>                                   
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>            

    </div>
</div>
