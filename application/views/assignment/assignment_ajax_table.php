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
    <?php
    $user_id = $this->session->userdata('id');
    $assignment_id=$value['assignment_id'];
    if ($type==1) {
    $assignment_sub = $this->db->query("SELECT * FROM assignment_sub WHERE assignment_id='$assignment_id' AND user_id='$user_id'")->row_array();
    }else{
    
    $assignment_sub = $this->db->query("SELECT * FROM assignment_sub,users WHERE assignment_sub.user_id=users.id AND  assignment_id='$assignment_id'")->result_array();
    }
    
    ?>
    <tr>
      <td><?php echo $value['assignment_name']; ?></td>
      <td><?php echo $value['assignment_duration'] . ' Days'; ?></td>
      <td><?php echo $value['assignment_marks']; ?></td>
      <td><?php echo $value['assignment_des']; ?></td>
      <td><?php
        if ($type==1) {
        if ($assignment_sub['file']!='') {
        ?>
        <span class="label label-primary"><a style="color: white;" href="<?php echo base_url('assets/uploads/'). $assignment_sub['file'] ?>" target="_blank">Completed</a></span>
        <?php
        }else{
        ?>
        <span class="label label-warning">Pending</span>
        <?php
        }
        }else{ ?>
        <?php  if($value['assignment_status']==0){  ?>
        <span class="label label-warning">Pending</span> <?php }else{ ?> <span class="label label-primary"> Completed</span>
        <?php } ?>
        <?php } ?>
      </td>
      <td>
        <?php if(in_array('deleteAssingemnt', $user_permission)): ?>
        <button <?php  if($value['assignment_status']==1){ echo 'disabled'; }  ?>
        data-id="<?php echo $value['assignment_id'] ?>" class="btn btn-default delete" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-trash"></i></button>
        <button <?php  if($value['assignment_status']==1){ echo 'disabled'; }  ?> data-id="<?php echo $value['assignment_id'] ?>" class="btn btn-default sub" data-toggle="modal" data-target="#exampleModal3" data-sub='<?php echo json_encode($assignment_sub); ?>'><i class="fa fa-plus"></i></button>
        <a <?php  if($value['assignment_status']==1){ echo 'disabled'; }  ?> href="<?php echo base_url('assignment/status/') . $value['assignment_id']; ?>" class="btn btn-default"><i class="fa fa-minus"></i></a>
        <?php endif; ?>
        <?php if(in_array('updateAssingemnt', $user_permission)): ?>
        <?php if ($type==1) { ?>
        <button <?php  if($value['assignment_status']==1){ echo 'disabled'; }  ?> data-id="<?php echo $value['assignment_id'] ?>" class="btn btn-default delete" data-toggle="modal" data-target="#exampleModal2" <?php if ($assignment_sub['file']!='') { echo 'disabled'; } ?>><i class="fa fa-save"></i></button>
        <?php }else{?>
        <button <?php  if($value['assignment_status']==1){ echo 'disabled'; }  ?> data-id="<?php echo $value['assignment_id'] ?>" class="btn btn-default delete" data-toggle="modal" data-target="#exampleModal2"><i class="fa fa-save"></i></button>
        <?php } ?>
        
        
        <?php endif; ?>
      </td>
      
      
    </tr>
    <?php } ?>
    
  </tbody>
  
</table>
