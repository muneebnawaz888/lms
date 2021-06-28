<table id="mytable" class="table table-striped">
  <thead>
    <tr>
      <th>Subject Name</th>
      <th>Course Name</th>
      <?php if(in_array('updateCourse', $user_permission) || in_array('deleteCourse', $user_permission)): ?>
      <th>Action</th>
      <?php endif; ?>
    </tr>
  </thead>
  <tbody  >
    <?php

    foreach ($subject_data as $subject_key => $subject_value): ?>
    <tr>
      <td><?php echo $subject_value['subject_name'] ?></td>
      <td><?php echo implode(',', json_decode($subject_value['course_name'])) ?></td>
      <?php if(in_array('updateCourse', $user_permission) || in_array('deleteCourse', $user_permission)): ?>
      <td>
        <?php if(in_array('updateCourse', $user_permission)): ?>
        <button data-id="<?php echo $subject_value['subject_id'] ?>" data-course_id='<?php echo $subject_value['course_ids'] ?>' data-name="<?php echo $subject_value['subject_name'] ?>" class="btn btn-default Edit" data-toggle="modal" data-target="#editpump"><i class="fa fa-edit"></i></button>
        
        <?php endif; ?>
        
      </td>
      <?php endif; ?>
    </tr>
    <?php endforeach; ?>
    
  </tbody>
  
</table>