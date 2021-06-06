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
      <li class="active">groups</li>
    </ol>
  </section>
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
            <h3 class="box-title">Add Group</h3>
          </div>
          <form role="form" action="<?php base_url('groups/create') ?>" method="post">
            <div class="box-body">
              <?php echo validation_errors(); ?>
              <div class="form-group">
                <label for="group_name">Group Name</label>
                <input type="text" class="form-control" id="group_name" name="group_name" placeholder="Enter group name">
              </div>
              <div class="form-group">
                <label for="permission">Permission</label>
                <table class="table table-responsive">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Create</th>
                      <th>Update (Normal , Partial)</th>
                      <th>View (All , ID)</th>
                      <th>Delete (All , ID)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th colspan="5">Basic Settings</th>
                    </tr>
                    <tr>
                      <td>Users</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createUser" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateUser" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewUser" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteUser" class="minimal"></td>
                    </tr>
                    <tr>
                      <td>Groups</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createGroup" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateGroup" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewGroup" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteGroup" class="minimal"></td>
                    </tr>
                    <tr>
                      <td>Branch</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createBranch" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateBranch" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewBranch" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteBranch" class="minimal"></td>
                    </tr>
                    <tr>
                      <th colspan="5">System Settings</th>
                    </tr>
                  
                     <tr>
                      <td>Course</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createCourse" class="minimal"></td>
                      <td>
                        <input type="checkbox" name="permission[]" id="permission" value="updateCourse" class="minimal">
                        <input type="checkbox" name="permission[]" id="permission" value="updateCoursePar" class="minimal">
                      </td>
                      <td>
                        <input type="checkbox" name="permission[]" id="permission" value="viewCourse" class="minimal">
                        <input type="checkbox" name="permission[]" id="permission" value="viewCourseID" class="minimal">
                      </td>
                      <td>
                        <input type="checkbox" name="permission[]" id="permission" value="deleteCourse" class="minimal">
                        <input type="checkbox" name="permission[]" id="permission" value="deleteCourseID" class="minimal">
                      </td>
                    </tr>
                    <tr>
                       <th colspan="5">Branch Settings</th>
                    </tr>

                    <tr>
                       <?php
                     $count=count($branch_data);
                      if($branch_data){ 
                        foreach ($branch_data as $branch_key => $branch_value){ ?> 
                           <td>
                        <?php echo $branch_value['branch_name']; ?>
                    <input type="checkbox" name="permission[]" id="permission" value="<?php echo ( preg_replace('/\s+/', '', $branch_value['branch_name']));?>" class="minimal">
                            </td>
                     <?php } } ?>
                     
                    </tr>
                    <tr>
                      <th colspan="5">Profile Settings</th>
                    </tr>
                    
                    
                    <tr>
                      <td>Profile</td>
                      <td> - </td>
                      <td> - </td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewProfile" class="minimal"></td>
                      <td> - </td>
                    </tr>
                    <tr>
                      <td>Setting</td>
                      <td>-</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateSetting" class="minimal"></td>
                      <td> - </td>
                      <td> - </td>
                    </tr>

                  </tbody>
                </table>
                
              </div>
            </div>
            <!-- /.box-body -->
            <div class="container">
              <div class="row">
                <div class="col-sm-12">
                  <h4>Branch Controls<h4>
                  <?php if($branch_data): ?>
                  <?php foreach ($branch_data as $branch_key => $branch_value): ?>
                  <div class="col-sm-4">
                    
                    <?php echo $branch_value['branch_name']; ?>
                    <input type="checkbox" name="permission[]" id="permission" value="<?php echo ( preg_replace('/\s+/', '', $branch_value['branch_name']));?>" class="minimal">
                  </div>
                  
                  <?php endforeach ?>
                  <?php endif; ?>
                  
                </div>
              </div>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Save Changes</button>
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
$("#addGroupNav").addClass('active');
$('input[type="checkbox"].minimal').iCheck({
checkboxClass: 'icheckbox_minimal-blue',
radioClass   : 'iradio_minimal-blue'
});
});
</script>