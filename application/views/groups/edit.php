<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Manage
    <small>Groups</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url('groups/') ?>">Groups</a></li>
      <li class="active">Edit</li>
    </ol>
  </section>
    <?php
  $branch_name=array();
  $branch_id=array();
  foreach ($branch_data as $branch_key => $branch_value){
  $branch_name[]=$branch_value['branch_name'];
  $branch_id[]=$branch_value['branch_id'];
  } ?>
  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">
        
        <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <?php echo $this->session->flashdata('success'); ?>
        </div>
        <?php elseif($this->session->flashdata('error')): ?>
        <div class="alert alert-error alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <?php echo $this->session->flashdata('error'); ?>
        </div>
        <?php endif; ?>
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Edit Group</h3>
          </div>
          <form role="form" action="<?php base_url('groups/update') ?>" method="post">
            <div class="box-body">
              <?php echo validation_errors(); ?>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="group_name">Group Name</label>
                    <input type="text" class="form-control" id="group_name" name="group_name" placeholder="Enter group name" value="<?php echo $group_data['group_name']; ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="group_name">Type</label>
                    <select id="type" name="type " class="form-control">
                      <option value="">--Select--</option>
                      <option value="-1">All</option>
                      <option value="0">Teacher</option>
                      <option value="1">Student</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="permission">Permission</label>
                    <?php $serialize_permission = unserialize($group_data['permission']); ?>
     
                    
                    <table class="table table-responsive">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Create</th>
                          <th>Update</th>
                          <th>View </th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th colspan="5">Basic Settings</th>
                        </tr>
                        <tr>
                          <td>Users</td>
                          <td><input type="checkbox" class="minimal" name="permission[]" id="permission" class="minimal" value="createUser" <?php if($serialize_permission) {
                            if(in_array('createUser', $serialize_permission)) { echo "checked"; }
                          } ?> ></td>
                          <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateUser" <?php
                            if($serialize_permission) {
                            if(in_array('updateUser', $serialize_permission)) { echo "checked"; }
                            }
                          ?>></td>
                          <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewUser" <?php
                            if($serialize_permission) {
                            if(in_array('viewUser', $serialize_permission)) { echo "checked"; }
                            }
                          ?>></td>
                          <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteUser" <?php
                            if($serialize_permission) {
                            if(in_array('deleteUser', $serialize_permission)) { echo "checked"; }
                            }
                          ?>></td>
                        </tr>
                        <tr>
                          <td>Groups</td>
                          <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="createGroup" <?php
                            if($serialize_permission) {
                            if(in_array('createGroup', $serialize_permission)) { echo "checked"; }
                            }
                          ?>></td>
                          <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateGroup" <?php
                            if($serialize_permission) {
                            if(in_array('updateGroup', $serialize_permission)) { echo "checked"; }
                            }
                          ?>></td>
                          <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewGroup" <?php
                            if($serialize_permission) {
                            if(in_array('viewGroup', $serialize_permission)) { echo "checked"; }
                            }
                          ?>></td>
                          <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteGroup" <?php
                            if($serialize_permission) {
                            if(in_array('deleteGroup', $serialize_permission)) { echo "checked"; }
                            }
                          ?>></td>
                        </tr>
                        <tr>
                          <td>Branch</td>
                          <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="createBranch" <?php
                            if($serialize_permission) {
                            if(in_array('createBranch', $serialize_permission)) { echo "checked"; }
                            }
                          ?>></td>
                          <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateBranch" <?php
                            if($serialize_permission) {
                            if(in_array('updateBranch', $serialize_permission)) { echo "checked"; }
                            }
                          ?>></td>
                          <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewBranch" <?php
                            if($serialize_permission) {
                            if(in_array('viewBranch', $serialize_permission)) { echo "checked"; }
                            }
                          ?>></td>
                          <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteBranch" <?php
                            if($serialize_permission) {
                            if(in_array('deleteBranch', $serialize_permission)) { echo "checked"; }
                            }
                          ?>></td>
                        </tr>
                        <tr>
                          <th colspan="5">System Settings</th>
                        </tr>
                        <tr>
                          <td>Course</td>
                          <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="createCourse" <?php if($serialize_permission) {
                            if(in_array('createCourse', $serialize_permission)) { echo "checked"; }
                          } ?>></td>
                          <td>
                            <input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateCourse" <?php if($serialize_permission) {
                            if(in_array('updateCourse', $serialize_permission)) { echo "checked"; }
                            } ?>>
                            
                          </td>
                          <td>
                            <input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewCourse" <?php if($serialize_permission) {
                            if(in_array('viewCourse', $serialize_permission)) { echo "checked"; }
                            } ?>>
                            
                          </td>
                          <td>
                            <input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteCourse" <?php if($serialize_permission) {
                            if(in_array('deleteCourse', $serialize_permission)) { echo "checked"; }
                            } ?>>
                            
                          </td>
                        </tr>
                        <tr>
                          <td>Subject</td>
                          <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="createSubject" <?php if($serialize_permission) {
                            if(in_array('createSubject', $serialize_permission)) { echo "checked"; }
                          } ?>></td>
                          <td>
                            <input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateSubject" <?php if($serialize_permission) {
                            if(in_array('updateSubject', $serialize_permission)) { echo "checked"; }
                            } ?>>
                            
                          </td>
                          <td>
                            <input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewSubject" <?php if($serialize_permission) {
                            if(in_array('viewSubject', $serialize_permission)) { echo "checked"; }
                            } ?>>
                            
                          </td>
                          <td>
                            <input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteSubject" <?php if($serialize_permission) {
                            if(in_array('deleteSubject', $serialize_permission)) { echo "checked"; }
                            } ?>>
                            
                          </td>
                        </tr>
                         <tr>
                          <th colspan="5">Branch Settings</th>
                        </tr>
                        <?php
                        $chunks=array();
                        $chunk = array_chunk($branch_name, 5);
                        
                        foreach ($chunk as $k=> $inner) {
                         foreach ($inner as $key => $value) {

                          $temp=$value.': <input type="checkbox" name="permission[]" id="permission" value="'. preg_replace('/\s+/', '', $value) .'" class="minimal" ';
                          if($serialize_permission) {

                          if(in_array(preg_replace('/\s+/', '', $value), $serialize_permission)) {    $temp.= " checked "; }
                          }
                            $temp.='>';
                           $chunks[$k][$key]=$temp;
                         }
                        }
            
                        foreach ($chunks as $row){
                        echo '<tr><td>' . implode('</td><td>', $row) . '</td></tr>';
                        }
                        
                        ?>
                        <tr>
                          <th colspan="5">Profile Settings</th>
                        </tr>
                        
                        <tr>
                          <td>Profile</td>
                          <td> - </td>
                          <td> - </td>
                          <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewProfile" <?php if($serialize_permission) {
                            if(in_array('viewProfile', $serialize_permission)) { echo "checked"; }
                          } ?>></td>
                          <td> - </td>
                        </tr>
                        <tr>
                          <td>Setting</td>
                          <td>-</td>
                          <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateSetting" <?php if($serialize_permission) {
                            if(in_array('updateSetting', $serialize_permission)) { echo "checked"; }
                          } ?>></td>
                          <td> - </td>
                          <td> - </td>
                        </tr>
                      </tbody>
                    </table>
                    
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Update Changes</button>
              <a href="<?php echo base_url('groups/') ?>" class="btn btn-warning">Back</a>
            </div>
          </form>
        </div>
        <!-- /.box -->
      </div>
      <!-- col-md-12 -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
$(document).ready(function() {
$("#mainGroupNav").addClass('active');
$("#manageGroupNav").addClass('active');
$('input[type="checkbox"].minimal').iCheck({
checkboxClass: 'icheckbox_minimal-blue',
radioClass   : 'iradio_minimal-blue'
});
});
$(document).on('change','#type',function() {
var v=$(this).val();

if (v=='-1') {
$('input[type="checkbox"].minimal').each(function(){
$(this).iCheck('check');
})
}else if(v==''){
$('input[type="checkbox"].minimal').each(function(){
$(this).iCheck('uncheck');
});
}
})
</script>