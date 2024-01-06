<div class="page-content">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4 class="font-size-18">View Cards</h4>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master Data</a></li>
                        <li class="breadcrumb-item active">View Cards</li>
                    </ol>
                </div>
            </div>

            <div class="col-sm-6">
                <!-- <div class="float-right d-none d-md-block">
                  <button type="button" data-toggle="modal" data-target="#player" class="btn btn-success waves-effect waves-light">Upload Excel</button>
                </div> -->
                <div class="float-right d-none d-md-block mr-2">
                  <a href="<?=base_url()?>Cards"><button type="button" class="btn btn-success waves-effect waves-light">Cards Lists</button></a>
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
                        <form class="custom-validation" action="" method="post" autocomplete="off">
                          <div class="form-group">
                            <label>Category</label>
                            <select required class="form-control" name="category_id" id="Category_Id" disabled="true">
                                <option value=""><?php echo $cards_details->category_name; ?></option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Subcategory</label>
                            <select required class="form-control subcategory_id" name="subcategory_id" id="subcategory_id" disabled="true">
                                <option value=""><?php echo $cards_details->subcategory_name ?></option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Cards Type</label>
                            <select class="form-control cardtypeId" required name="cardtype_id" id="cardtype_id" disabled="true">
                              <option value=""><?php echo $cards_details->card_type ?></option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Cards Details</label>
                            <select class="form-control" required name="carddetails_id" id="carddetails_id" disabled="true">
                              <option value=""><?php echo $cards_details->card_name ?></option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Attributes Name and Value</label>
                              <table class="table table-bordered dt-responsive nowrap">
                                <thead>
                                <tr>
                                  <th>Attribute Name</th>
                                  <th>Attribute Value</th>
                                </tr>
                                </thead>
                                <tbody>
                                 <?php
                                if(!empty($cards_attribute_details))
                                {
                                  foreach($cards_attribute_details as $value)
                                  {
                                ?>
                                  <tr>
                                    <td><?php echo $value['attribute_name'] ?></td>
                                    <td>
                                      <input type="hidden" name="attributeid" id="attributeid" value="<?php echo $value['cards_attribute_id']; ?>">
                                      <input type="number" step="any" class="form-control" name="attribute_value" id="attribute_value" placeholder="Attribute Value"  value="<?php echo $value['attribute_value']; ?>" readonly="readonly" />
                                    </td>
                                  </tr>
                                <?php
                                  }
                                }  
                                ?>                      
                                </tbody>
                              </table> 
                          </div>  
                          <div class="form-group mb-0">
                            <div>
                              <!-- <input type="submit" name="addcards" id="addcards" class="btn btn-success waves-effect waves-light mr-1" value="Add Details"> -->
                              <!-- <button type="reset" class="btn btn-danger waves-effect">Cancel</button> -->
                            </div>
                          </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>             
    </div>
</div>
