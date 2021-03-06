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
            <h3 class="box-title">Add Group</h3>
          </div>
          <form role="form" action="<?php base_url('groups/create') ?>" method="post">
            <div class="box-body">
              <?php echo validation_errors(); ?>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="group_name">Group Name</label>
                    <input type="text" class="form-control" id="group_name" name="group_name" placeholder="Enter group name" >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="group_name">Type</label>
                    <select id="type" name="subject" class="form-control">
                      <option value="">--Select--</option>
                      <option value="-1">All</option>
                      <option value="0">Teacher</option>
                      <option value="1">Student</option>
                      <option value="2">Parents</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="permission">Permission</label>
                    <table class="table table-responsive">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Create</th>
                          <th>Update</th>
                          <th>View</th>
                          <th>Delete</th>
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
                          <td><input type="checkbox" name="permission[]" id="permission" value="updateCourse" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" id="permission" value="viewCourse" class="minimal"> </td>
                          <td> <input type="checkbox" name="permission[]" id="permission" value="deleteCourse" class="minimal"> </td>
                        </tr>
                        <tr>
                          <td>Subject</td>
                          <td><input type="checkbox" name="permission[]" id="permission" value="createSubject" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" id="permission" value="updateSubject" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" id="permission" value="viewSubject" class="minimal"> </td>
                          <td> <input type="checkbox" name="permission[]" id="permission" value="deleteSubject" class="minimal"> </td>
                        </tr>
                         <tr>
                          <td>Assingemnt</td>
                          <td><input type="checkbox" name="permission[]" id="permission" value="createAssingemnt" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" id="permission" value="updateAssingemnt" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" id="permission" value="viewAssingemnt" class="minimal"> </td>
                          <td> <input type="checkbox" name="permission[]" id="permission" value="deleteAssingemnt" class="minimal"> </td>
                        </tr>
                        <tr>
                          <td>Time Table</td>
                          <td><input type="checkbox" name="permission[]" id="permission" value="createTimeTable" class="minimal"></td>
                          <td>-</td>
                          <td><input type="checkbox" name="permission[]" id="permission" value="viewTimeTable" class="minimal"> </td>
                          <td>-</td>
                        </tr>
                        <tr>
                          <td>Students</td>
                          <td>-</td>
                          <td>-</td>
                          <td><input type="checkbox" name="permission[]" id="permission" value="viewStudents" class="minimal"> </td>
                          <td>-</td>
                        </tr>
                        <tr>
                          <th colspan="5">Branch Settings</th>
                        </tr>
                        <?php
                        $chunks=array();
                        $chunk = array_chunk($branch_name, 5);
                        
                        foreach ($chunk as $k=> $inner) {
                         foreach ($inner as $key => $value) {
                           $chunks[$k][$key]=$value.': <input type="checkbox" name="permission[]" id="permission" value=" '. preg_replace('/\s+/', '', $value) .' " class="minimal">';
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
              </div>
            </div>
            <!-- /.box-body -->

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
$(document).on('change','#type',function() {
  var v=$(this).val();

  if (v=='-1') { 
    $('input[type="checkbox"].minimal').each(function(){
      $(this).iCheck('check');
    })   
  }else if(v=='0'){
    $('input[type="checkbox"].minimal').iCheck('uncheck');
     $('input[type="checkbox"].minimal').each(function(){
        
       if ($(this).val()=='viewBranch'  || $(this).val()=='viewCourse'  || $(this).val()=='viewSubject'  || $(this).val()=='viewStudents' || $(this).val()=='viewProfile' || $(this).val()=='updateSetting' || $(this).val()=='viewAssingemnt' || $(this).val()=='createAssingemnt' || $(this).val()=='deleteAssingemnt' || $(this).val()=='viewTimeTable' ) {

        $(this).iCheck('check');
      }
      
    });
  }else if(v=='1'){
    $('input[type="checkbox"].minimal').iCheck('uncheck');
     $('input[type="checkbox"].minimal').each(function(){
   
       if ($(this).val()=='viewProfile' || $(this).val()=='updateSetting' || $(this).val()=='viewAssingemnt' || $(this).val()=='updateAssingemnt' || $(this).val()=='viewTimeTable' ) {

        $(this).iCheck('check');
      }
      
    });
  }else if(v=='2'){
    $('input[type="checkbox"].minimal').iCheck('uncheck');
     $('input[type="checkbox"].minimal').each(function(){
   
       if ($(this).val()=='viewProfile' || $(this).val()=='updateSetting' || $(this).val()=='viewTimeTable' || $(this).val()=='viewStudents' ) {

        $(this).iCheck('check');
      }
      
    });
  }else if(v==''){
     $('input[type="checkbox"].minimal').iCheck('uncheck');
  }
})
</script>