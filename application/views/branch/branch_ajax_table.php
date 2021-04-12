    <table id="mytable" class="table table-striped">
                           <thead>
                <tr>
                  <th>Branch Name</th>
                  <?php if(in_array('updateBranch', $user_permission) || in_array('deleteBranch', $user_permission)): ?>
                    <th>Action</th>
                  <?php endif; ?>
                </tr>
                </thead>
                          <tbody  >
           <?php
            foreach ($branch_data as $branch_key => $branch_value): ?>
            <tr>
               
                <td><?php echo $branch_value['branch_name'] ?></td>
                <?php if(in_array('updateBranch', $user_permission) || in_array('deleteBranch', $user_permission)): ?>
                        <td>
                          <?php if(in_array('updateBranch', $user_permission)): ?>
                         <button data-id="<?php echo $branch_value['branch_id'] ?>" data-name="<?php echo $branch_value['branch_name'] ?>" class="btn btn-default Edit" data-toggle="modal" data-target="#editpump"><i class="fa fa-edit"></i></button>
        
                          <?php endif; ?>
                         <!-- <?php if(in_array('deleteBranch', $user_permission)): ?>-->
                          
                         <!--<button data-id="<?php echo $pump_value['pump_id'] ?>" class="btn btn-default delete" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-trash"></i></button>-->
                
                         <!-- <?php endif; ?>-->
                        </td>
                        <?php endif; ?>

            </tr>
            <?php endforeach; ?>
            
                          </tbody>
                                
                            </table> 