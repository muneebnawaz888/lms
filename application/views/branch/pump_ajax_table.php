    <table id="mytable" class="table table-striped">
                           <thead>
                <tr>
                  <th>Pump Name</th>
                  <th>Pump Address</th>
                  <?php if(in_array('updatePump', $user_permission) || in_array('deletePump', $user_permission)): ?>
                    <th>Action</th>
                  <?php endif; ?>
                </tr>
                </thead>
                          <tbody  >
           <?php
            foreach ($pump_data as $pump_key => $pump_value): ?>
            <tr>
               
                <td><?php echo $pump_value['pump_name'] ?></td>
                <td><?php echo $pump_value['pump_address'] ?></td>
                <?php if(in_array('updatePump', $user_permission) || in_array('deletePump', $user_permission)): ?>
                        <td>
                          <?php if(in_array('updatePump', $user_permission)): ?>
                         <button data-id="<?php echo $pump_value['pump_id'] ?>" data-name="<?php echo $pump_value['pump_name'] ?>" data-address="<?php echo $pump_value['pump_address'] ?>" class="btn btn-default Edit" data-toggle="modal" data-target="#editpump"><i class="fa fa-edit"></i></button>
        
                          <?php endif; ?>
                         <!-- <?php if(in_array('deletePump', $user_permission)): ?>-->
                          
                         <!--<button data-id="<?php echo $pump_value['pump_id'] ?>" class="btn btn-default delete" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-trash"></i></button>-->
                
                         <!-- <?php endif; ?>-->
                        </td>
                        <?php endif; ?>

            </tr>
            <?php endforeach; ?>
            
                          </tbody>
                                
                            </table> 