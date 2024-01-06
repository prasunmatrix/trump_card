<div class="page-content">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4 class="font-size-18">Add Game Type</h4>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master Data</a></li>
                        <li class="breadcrumb-item active">Add Game Type</li>
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
                      <form class="custom-validation" action="<?php echo base_url(); ?>Gametype/addgametype" method="post" autocomplete="off">
                        <div class="form-group">
                          <label>Select Category</label>
                          <select required class="form-control" name="category_id" id="Category_Id">
                            <option value="">Select Category</option>
                            <?php
                              if(!empty($all_category_name))
                              {
                                foreach ($all_category_name as  $value) {    
                            ?>
                            <option value="<?php echo $value->categoryid; ?>"><?php echo $value->category_name; ?></option>
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
                                <?php
                                  if(!empty($all_game_category))
                                  {
                                    foreach ($all_game_category as  $value) 
                                    {   
                                    ?>
                                    <tr>
                                      <td>
                                        <?php echo $value['gametype_name'] ?>
                                        <input type="hidden" name="gamecategoryid[]" id="gamecategoryid" value="<?php echo $value['gamecategoryid']; ?>">
                                      </td>  
                                      <td>
                                        <input type="text" class="form-control" name="cards_to_be_played[]" id="cards_to_be_played"  data-role="tagsinput" />
                                      </td>
                                    </tr>
                                <?php
                                    }
                                  }
                                  ?>                     
                              </tbody>
                            </table> 
                        </div>
                        
                        <!-- <div align="right">
                          <button type="button" id="add_more" class="btn btn-primary waves-effect waves-light mr-1">Add More</button>
                        </div> -->  
                        <div class="form-group mb-0">
                          <div>
                            <input type="submit" name="addgametype" id="addgametype" class="btn btn-success waves-effect waves-light mr-1" value="Add Details">
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
// jQuery(function(){
//     var counter = 0;
//     jQuery('#add_more').click(function(event){
//       //alert("1");
//       event.preventDefault();
//       counter++;
//       var newRow = jQuery('<div class="form-group"><label>Game Type Name</label><select required class="form-control" name="game_type_name[]" id="game_type_name'+counter+'" onchange="changeCardPlayed1(this.value,'+counter+');"><option value="">Select Game Type Name</option><?php if(!empty($all_game_category)){ foreach ($all_game_category as  $value) { ?><option value="<?php echo $value['gamecategoryid']; ?>"><?php echo $value['gametype_name']; ?></option><?php }} ?></select></div><div class="form-group"><label>Cards To Be Played</label><select required class="form-control" name="cards_to_be_played[]" id="cards_to_be_played'+counter+'" multiple data-live-search="true"><option value="">Select Cards To Be Played</option></select></div>');
//       jQuery('div.gametype_list').append(newRow);
//     });
// });

// function changeCardPlayed(val){
//   //alert(val);
//   var colours = ['14','22','30'];
//   var shapes = ['20', '28', '40'];
//   if(val==4)
//   {
//     cards_to_be_played.options.length = 0;
//     for (i = 0; i < shapes.length; i++) {
//       createOption(cards_to_be_played, shapes[i], shapes[i]);
//     }
//   }
//   else
//   {
//     cards_to_be_played.options.length = 0;
//     for (i = 0; i < colours.length; i++) {
//       createOption(cards_to_be_played, colours[i], colours[i]);
//     }
//   }
// }
// function changeCardPlayed1(val,counter){
//   //alert(val);
//   var cards_played="cards_to_be_played"+counter;
//   alert(cards_played);
//   var colours = ['14','22','30'];
//   var shapes = ['20', '28', '40'];
//   if(val==4)
//   {
//     $('#'+cards_played).length = 0;
//     for (i = 0; i < shapes.length; i++) {
//       createOption(cards_played, shapes[i], shapes[i]);
//     }
//   }
//   else
//   {
//     $('#'+cards_played).length = 0;
//     for (i = 0; i < colours.length; i++) {
//       createOption(cards_played, colours[i], colours[i]);
//     }
//   }
// }
// function createOption(game_type_name, text, value) {
//   var opt = document.createElement('option');
//   opt.value = value;
//   opt.text = text;
//   game_type_name.options.add(opt);
// }
</script>