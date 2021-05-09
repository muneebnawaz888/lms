    <table id="mytable" class="table table-striped">
                           <thead>
                <tr>
                  <th>Course Name</th>
                  <?php if(in_array('updateCourse', $user_permission) || in_array('deleteCourse', $user_permission)): ?>
                    <th>Action</th>
                  <?php endif; ?>
                </tr>
                </thead>
                          <tbody  >
           <?php
            foreach ($course_data as $course_key => $course_value): ?>
            <tr>
               
                <td><?php echo $course_value['course_name'] ?></td>
                <?php if(in_array('updateCourse', $user_permission) || in_array('deleteCourse', $user_permission)): ?>
                        <td>
                          <?php if(in_array('updateCourse', $user_permission)): ?>
                         <button data-id="<?php echo $course_value['course_id'] ?>" data-name="<?php echo $course_value['course_name'] ?>" class="btn btn-default Edit" data-toggle="modal" data-target="#editpump"><i class="fa fa-edit"></i></button>
        
                          <?php endif; ?>
                         <!-- <?php if(in_array('deleteCourse', $user_permission)): ?>-->
                          
                         <!--<button data-id="<?php echo $pump_value['pump_id'] ?>" class="btn btn-default delete" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-trash"></i></button>-->
                
                         <!-- <?php endif; ?>-->
                        </td>
                        <?php endif; ?>

            </tr>
            <?php endforeach; ?>
            
                          </tbody>
                                
                            </table> 