

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Course Subject</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Course Subject</li>
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
          
       <?php if(in_array('createCourse', $user_permission)): ?>
        <button  data-toggle="modal" data-target="#addpump" class="btn btn-primary">Add Course Subject</button>
        <br /> <br />
        <?php endif; ?>


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Course Subject</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                    <div id="main_response"></div>
                      <div class="table-responsive" id="show">
                        
                      </div>
            
            </div>
            <!-- /.box-body -->
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


<!-- Modal -->
<div class="modal fade"  id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </div>
    
    
    
    <div class="modal-body">
      Are You Sure You Want To Delete!!!!
      <input type="hidden" name="del" id="id" value=""/>
    </div>
    <div class="modal-footer">
      <button type="submit" onclick="deletePumpSubmit()"  name="submit" class="btn btn-primary">Delete</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
    
  </div>
</div>
</div>
<!-- Add Modal -->
<div class="modal fade"  id="addpump" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Add Course Subject</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div id="message">  </div>
    
    
    <div class="modal-body">
      <div class="form-example-int">
        <div class="form-group">
          <label>Subject Name</label>
          <div class="nk-int-st">
            <input type="text" required name="subject_name"  id="subject_name" class="form-control input-sm" placeholder="Enter Course Name">
          </div>
        </div>
      </div>
      <div class="form-example-int mg-t-15">
        <div class="form-group">
          <label>Course</label>
          <div class="nk-int-st">
          <select name="course_ids[]" id="course_id" class="form-control select2" multiple=""  style="width: 100%;">
            <option value="">--SELECT--</option>
            <?php foreach ($course_data as $key => $value) {
             echo "<option value='".$value['course_id']."'>".$value['course_name']."</option>";
            } ?>
          </select>
          </div>
        </div>
      </div>
      
      
    </div>
    <div class="modal-footer">
      <button type="submit" onclick="addPumpSubmit()" id="addPumpSubmit" name="submit" class="btn btn-primary">Add Course Subject</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
    
  </div>
</div>
</div>
<!-- Edit Modal -->
<div class="modal fade"  id="editpump" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Edit Course Subject</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div id="message_edit">  </div>
    
    
    <div class="modal-body">
      <div class="form-example-int">
        <div class="form-group">
          <label>Subject Name</label>
          <div class="nk-int-st">

            <input type="text" required name="subject_name_edit"  id="subject_name_edit" class="form-control input-sm" placeholder="Enter Course Name">
          </div>
        </div>
      </div>
      <div class="form-example-int mg-t-15">
        <div class="form-group">
          <label>Course</label>
          <div class="nk-int-st">
          <select name="course_id[]" id="course_id_edit" class="form-control select2" multiple=""  style="width: 100%;">
            <option value="">--SELECT--</option>
            <?php foreach ($course_data as $key => $value) {
             echo "<option value='".$value['course_id']."'>".$value['course_name']."</option>";
            } ?>
          </select>
          </div>
        </div>
      </div>
      <input type="hidden" name="id" id="id" value=""/>
      
    </div>
    <div class="modal-footer">
      <button type="submit" onclick="EditPumpSubmit()" id="addPumpSubmit" name="submit" class="btn btn-primary">Edit Course Subject</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
    
  </div>
</div>
</div>
<script type="text/javascript">
var $=jQuery;
function subject_data(){
$.ajax({
type: "POST",
url: " <?php echo site_url('course/GetCourseSubjectData'); ?>",
success: function(data) {
$('#show').html(data);
$('#mytable').DataTable();

}
});
}
$(document).ready(function() {
$('.select2').select2();
subject_data();

});

function addPumpSubmit() {
var subject_name = $('#subject_name').val();
 var course_id = $('#course_id').val();
var submit = $('#addPumpSubmit').val();
if(course_id!=""){

$.ajax({
url: "<?php echo base_url("course/create_subject");?>",
type: "POST",
data: {
submit:submit,
subject_name:subject_name,
course_ids: course_id,
},
cache: false,
success: function(data){

$('#message').html(data);

subject_data();


}
});
}

}

$(document).on("click", ".delete", function () {
var id = $(this).data('id');
$(".modal-body #id").val( id );
});

function deletePumpSubmit(){
var id= $('#id').val();

$.ajax({
type: "POST",
url: " <?php echo site_url('pump/delete'); ?>",
data:{id:id},
success: function(data) {
$('#main_response').html(data);

subject_data();
}
});
}
function EditPumpSubmit()
{
var subject_name = $('#subject_name_edit').val();
var course_id=$('#course_id_edit').val();
var id= $('#id').val();


$.ajax({
type: "POST",
url: " <?php echo site_url('course/edit_subject'); ?>",
data:{id:id,course_ids:course_id,subject_name:subject_name},
success: function(data) {
$('#message_edit').html(data);

subject_data();
}
});
}
$(document).on("click", ".Edit", function () {
var pump_name = $(this).data('name');
var course_ids = $(this).data('course_id');
var id = $(this).data('id');
$(".modal-body #subject_name_edit").val( pump_name );
console.log(course_ids);
$(".modal-body #course_id_edit").val( course_ids ).trigger('change');
$(".modal-body #id").val( id );
});


</script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#userTable').DataTable();

      $("#mainCourseNav").addClass('active');
      $("#manageCourseSubjectNav").addClass('active');
    });
  </script>