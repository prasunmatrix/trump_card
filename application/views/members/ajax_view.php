<?php
if(!empty($all_members_data))
{ 
$count=1; foreach ($all_members_data as $key => $value) { ?>
  <tr>
    <td><?php echo $count; ?></td>
    <td><?php echo $value['memberid']; ?></td>
    <td><?php echo $value['photo']; ?></td>
    <td><?php echo $value['fullname']; ?></td>
    <td><?php echo $value['displayname']; ?></td>
    <td><?php echo $value['age']; ?></td>
    <td><?php echo $value['email_id']; ?></td>
    <td><?php echo $value['mobile_number']; ?></td>
    <td><?php echo date("jS F, Y", strtotime($value['created_at']));?></td>
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
<?php $count++;}} ?>