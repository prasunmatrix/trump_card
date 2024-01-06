<div class="page-content">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4 class="font-size-18">Edit Game Type</h4>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master Data</a></li>
                        <li class="breadcrumb-item active">Edit Game Type</li>
                    </ol>
                </div>
            </div>

            <div class="col-sm-6">
              <!-- <div class="float-right d-none d-md-block">
                <button type="button" data-toggle="modal" data-target="#player" class="btn btn-success waves-effect waves-light">Upload Excel</button>
              </div> -->
              <div class="float-right d-none d-md-block mr-2">
                  <a href="<?=base_url()?>Gametype"><button type="button" class="btn btn-success waves-effect waves-light">Game Type Lists</button></a>
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
                          <label>Select Category</label>
                          <select required class="form-control" name="category_id" id="Category_Id">
                            <option value="">Select Category</option>
                            <?php
                              if(!empty($all_category_name))
                              {
                                foreach ($all_category_name as  $value) {    
                                ?>
                                <option value="<?php echo $value->categoryid; ?>"<?php if($editgametype_data->category_id==$value->categoryid){?> selected="selected" <?php } ?>><?php echo $value->category_name; ?></option>
                                <?php
                                }
                              }
                            ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Select Subcategory</label>
                          <select required class="form-control" name="subcategory_id" id="subcategory_id">
                            <option value="">Select Sub Category</option>
                            <?php
                              if(!empty($all_subcategory_name))
                              {
                                foreach ($all_subcategory_name as  $value) {    
                                ?>
                                  <option value="<?php echo $value['subcategoryid']; ?>"<?php if($editgametype_data->subcategory_id==$value['subcategoryid']){?> selected="selected" <?php } ?>><?php echo $value['subcategory_name']; ?></option>
                                <?php
                                }
                              }
                              ?>
                          </select>
                        </div>
                        <!-- <div class="form-group">
                          <label>Game Type Name</label>
                          <select required class="form-control" name="game_type_name[]" id="game_type_name" onchange="changeCardPlayed(this.value);">
                            <option value="">Select Game Type Name</option>
                            <?php
                            if(!empty($all_game_category))
                            {
                              foreach ($all_game_category as  $value) {    
                            ?>
                            <option value="<?php echo $value['gamecategoryid']; ?>"><?php echo $value['gametype_name']; ?></option>
                            <?php
                              }
                            }
                          ?>
                          </select>
                        </div> -->
                        <!-- <div class="form-group">
                          <label>Cards To Be Played</label>
                          <select required class="form-control" name="cards_to_be_played[]" id="cards_to_be_played" multiple data-live-search="true">
                            <option value="">Select Cards To Be Played</option>
                            <option value="14">14</option>
                            <option value="22">22</option>
                            <option value="30">30</option>
                          </select>
                        </div> -->
                        <div class="form-group">
                          <label>Cards To Be Played</label>
                            <table class="table table-bordered dt-responsive nowrap">
                              <thead>
                              <tr>
                                <th>Game Type Name</th>
                                <th>Cards To Be Played</th>
                              </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>
                                    <?php echo $game_category->gametype_name; ?>
                                    <input type="hidden" name="gamecategoryid" id="gamecategoryid" value="<?php echo $game_category->gamecategoryid; ?>">
                                  </td>  
                                  <td>
                                    <input type="text" class="form-control" name="cards_to_be_played" id="cards_to_be_played"  data-role="tagsinput" value="<?php echo $editgametype_data->cards_to_be_played; ?>" />
                                  </td>
                                </tr>                     
                              </tbody>
                            </table> 
                        </div>
                        
                        <!-- <div align="right">
                          <button type="button" id="add_more" class="btn btn-primary waves-effect waves-light mr-1">Add More</button>
                        </div> -->  
                        <div class="form-group mb-0">
                          <div>
                            <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $editgametype_data->gametypeid; ?>" />
                            <input type="submit" name="editgametype" id="editgametype" class="btn btn-success waves-effect waves-light mr-1" value="Update Details">
                          </div>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>             
    </div>
</div>
