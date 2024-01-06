  <?php
  if(!empty($attribute))
  {
    foreach($attribute as $value)
    {
  ?>
    <tr>
      <td><?php echo $value['attribute_name'] ?></td>
      <td>
        <input type="hidden" name="attributeid[]" id="attributeid" value="<?php echo $value['attributeid']; ?>">
        <input type="number" step="any" class="form-control" name="attribute_value[]" id="attribute_value" placeholder="Attribute Value" required="required" />
      </td>
    </tr>
  <?php
    }
  }  
  ?>     
  <!-- <tr> 
    <td>Attribute Name</td>
    <td><input type="text" class="form-control" name="" placeholder="Attribute Value"></td>
  </tr> -->                   