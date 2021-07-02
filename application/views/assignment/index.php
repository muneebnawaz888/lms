<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Manage
    <small>Assingment</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Assingment</li>
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
        
        <?php if(in_array('createAssingemnt', $user_permission)): ?>
        <button  data-toggle="modal" data-target="#addpump" class="btn btn-primary">Add Assingment</button>
        <br /> <br />
        <?php endif; ?>
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Manage Assingment</h3>
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
<script type="text/javascript">
$(document).ready(function() {
$('#userTable').DataTable();
$("#mainUserNav").addClass('active');
$("#manageUserNav").addClass('active');
});
</script>
<?php foreach ($subject_data as $key => $value) {
$ids[]=$value['subject_id'];
} ?>
<!-- Modal -->
<div class="modal fade"  id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Submit Assingment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?php echo base_url('assignment/add_assingemnt') ?>"  enctype="multipart/form-data">
        <div class="modal-body">
          <input type="hidden" name="id" id="id" value=""/>
          <div class="form-group">
            <input type="file" name="file" class="form-control">
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
      
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade"  id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Marks</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?php echo base_url('assignment/add_marks') ?>"  enctype="multipart/form-data">
        <div class="modal-body">
          <input type="hidden" name="id" id="id" value=""/>
          <input type="hidden" name="user_id" id="user_id" value=""/>
          <div class="form-group">
            <input type="text" name="marks" class="form-control">
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
      
    </div>
  </div>
</div>
<div class="modal fade"  id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Submitted Assingments</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
        <div class="modal-body">
         <table class="table table-bordered">
           <thead>
             <tr>
               <td>File Name</td>
               <td>Student Name</td>
               <td>Marks</td>
               <td>Action</td>
             </tr>
           </thead>
           <tbody id="inne_append"></tbody>
         </table>
        
      </div>
      <div class="modal-footer">
       
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
     </div>
      
    </div>
  </div>

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
        <h5 class="modal-title" id="exampleModalLabel">Add Assingment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="message">  </div>
      
      
      <div class="modal-body">
        <div class="form-example-int">
          <div class="form-group">
            <label>Assingment Name</label>
            <div class="nk-int-st">
              <input type="text" required name="assignment_name"  id="assignment_name" class="form-control input-sm" placeholder="Enter Assingment Name">
            </div>
          </div>
        </div>
        <div class="form-example-int mg-t-15">
          <div class="form-group">
            <label>Assingment Duration (Days)</label>
            <div class="nk-int-st">
              <input type="number" required name="assignment_duration" id="assignment_duration" class="form-control input-sm" placeholder="Enter Assingment Duration">
            </div>
          </div>
        </div>
        <div class="form-example-int mg-t-15">
          <div class="form-group">
            <label>Assingment Marks</label>
            <div class="nk-int-st">
              <input type="number" required name="assignment_marks" id="assignment_marks" class="form-control input-sm" placeholder="Enter Assingment Marks">
            </div>
          </div>
        </div>
        <div class="form-example-int mg-t-15">
          <div class="form-group">
            <label for="phone">Assingment Subject</label>
            <select name="announcment_subject" id="announcment_subject" class="form-control" <?php if(in_array($user_data['subject'],$ids)){ echo 'disabled'; } ?>>
              <option>--Select--</option>
              <?php foreach($subject_data as $value){ ?>
              <option value="<?php echo $value['subject_id']; ?>" <?php if($user_data['subject']==$value['subject_id']){ echo 'selected';  } ?>><?php echo $value['subject_name']; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="form-example-int mg-t-15">
          <div class="form-group">
            <label>Assingment Description</label>
            <div class="nk-int-st">
              <textarea class="form-control input-sm" placeholder="Enter Assingment Description" name="assignment_des" id="assignment_des" cols="10" style="  height: 100px;"></textarea>
            </div>
          </div>
        </div>
        
        
      </div>
      <div class="modal-footer">
        <button type="submit" onclick="addPumpSubmit()" id="addPumpSubmit" name="submit" class="btn btn-primary">Add Assingment</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      
    </div>
  </div>
</div>
<script type="text/javascript">
var $=jQuery;
function assignment_data(){
$.ajax({
type: "POST",
url: " <?php echo site_url('assignment/GetAssignmentData'); ?>",
success: function(data) {
$('#show').html(data);
$('#mytable').DataTable();
}
});
}
$(document).ready(function() {
assignment_data();
});
function addPumpSubmit() {
var assignment_name = $('#assignment_name').val();
var assignment_duration=$('#assignment_duration').val();
var assignment_marks=$('#assignment_marks').val();
var announcment_subject = $('#announcment_subject').val();
var assignment_des=$('#assignment_des').val();
if(assignment_name!=""){
$.ajax({
url: "<?php echo base_url("assignment/create");?>",
type: "POST",
data: {
assignment_duration:assignment_duration,
assignment_name: assignment_name,
announcment_subject:announcment_subject,
assignment_marks: assignment_marks,
assignment_des: assignment_des,
},
cache: false,
success: function(data){
$('#message').html(data);
assignment_data();
}
});
}
}
$(document).on("click", ".delete", function () {
var id = $(this).data('id');
$(".modal-body #id").val( id );
});
$(document).on("click", ".sub", function () {
  var base_url='<?php echo base_url('assets/uploads/'); ?>';
  var html='';
  var sub = JSON.parse(JSON.stringify($(this).data('sub')));
  $(sub).each(function(i,v) {
    html+='<tr>';

    html+='<td><a>'+v.file+'</a></td>';
    html+='<td><a>'+v.firstname+ ' ' +v.lastname +'</a></td>';
     html+='<td><a>'+v.marks+'</a></td>';
    html+='<td><a  class="btn btn-default" href="'+base_url+v.file+'" target="_blank">Downlaod</a>  <button data-user='+v.user_id+'  data-id='+v.assignment_id+' class="btn btn-default add_marks" data-toggle="modal" data-target="#exampleModal4"><i class="fa fa-plus"></i></button> </td>'

    html+='</tr>';

  });
  $('#inne_append').html(html);
 console.log(sub[0]);
});
$(document).on("click", ".add_marks", function () {
  var id = $(this).data('id');
  $(".modal-body #id").val( id );
  $('.modal-body #user_id').val($(this).data('user'));

});
function deletePumpSubmit(){
var id= $('#id').val();
$.ajax({
type: "POST",
url: " <?php echo site_url('assignment/delete'); ?>",
data:{id:id},
success: function(data) {
$('#main_response').html(data);
assignment_data();
}
});
}
</script>