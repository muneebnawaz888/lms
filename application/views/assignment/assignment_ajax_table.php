<table id="mytable" class="table table-striped">
  <thead>
    <tr>
      <th>Assingemnt Name</th>
      <th>Assingemnt Duration</th>
      <th>Assingemnt Marks</th>
      <th>Assingemnt Description</th>
      <th>Assingemnt Status</th>
      <?php if(in_array('updateAssingemnt', $user_permission) || in_array('deleteAssingemnt', $user_permission)): ?>
      <th>Action</th>
      <?php endif; ?>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($assignment_data as $key => $value) { ?>
      <tr>
      <td><?php echo $value['assignment_name']; ?></td>
      <td><?php echo $value['assignment_duration'] . ' Days'; ?></td>
      <td><?php echo $value['assignment_marks']; ?></td>
      <td><?php echo $value['assignment_des']; ?></td>
      <td><?php if($value['assignment_status']==0){ ?><span class="label label-warning">Pending</span> <?php }else{ ?> <span class="label label-primary">Completed</span><?php } ?> </td>
      <td>  
              <?php if(in_array('deleteAssingemnt', $user_permission)): ?>

        <button data-id="<?php echo $value['assignment_id'] ?>" class="btn btn-default delete" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-trash"></i></button>
        <?php endif; ?>
        <?php if(in_array('updateAssingemnt', $user_permission)): ?>
  <button data-id="<?php echo $value['assignment_id'] ?>" class="btn btn-default delete" data-toggle="modal" data-target="#exampleModal2"><i class="fa fa-save"></i></button>
          

      <?php endif; ?>
      </td>
      
       
      </tr>
    <?php } ?>
    
  </tbody>
  
</table>