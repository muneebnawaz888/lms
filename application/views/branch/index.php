

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Users</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
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
          
       <?php if(in_array('createBranch', $user_permission)): ?>
        <button  data-toggle="modal" data-target="#addpump" class="btn btn-primary">Add User</button>
        <br /> <br />
        <?php endif; ?>


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Branch</h3>
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
      <h5 class="modal-title" id="exampleModalLabel">Add Branch</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div id="message">  </div>
    
    
    <div class="modal-body">
      <div class="form-example-int">
        <div class="form-group">
          <label>Branch Name</label>
          <div class="nk-int-st">
            <input type="text" required name="branch_name"  id="branch_name" class="form-control input-sm" placeholder="Enter Pump Name">
          </div>
        </div>
      </div>
  <!--     <div class="form-example-int mg-t-15">
        <div class="form-group">
          <label>Address</label>
          <div class="nk-int-st">
            <input type="text" required name="pump_address" id="pump_address" class="form-control input-sm" placeholder="Enter Pump Address">
          </div>
        </div>
      </div> -->
      
      
    </div>
    <div class="modal-footer">
      <button type="submit" onclick="addPumpSubmit()" id="addPumpSubmit" name="submit" class="btn btn-primary">Add Pumps</button>
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
      <h5 class="modal-title" id="exampleModalLabel">Add Pumps</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div id="message_edit">  </div>
    
    
    <div class="modal-body">
      <div class="form-example-int">
        <div class="form-group">
          <label>Pump Name</label>
          <div class="nk-int-st">
            <input type="text" required name="pump_name"  id="pump_name_edit" class="form-control input-sm" placeholder="Enter Pump Name">
          </div>
        </div>
      </div>
      <div class="form-example-int mg-t-15">
        <div class="form-group">
          <label>Address</label>
          <div class="nk-int-st">
            <input type="text" required name="pump_address" id="pump_address_edit" class="form-control input-sm" placeholder="Enter Pump Address">
          </div>
        </div>
      </div>
      <input type="hidden" name="id" id="id" value=""/>
      
    </div>
    <div class="modal-footer">
      <button type="submit" onclick="EditPumpSubmit()" id="addPumpSubmit" name="submit" class="btn btn-primary">Edit Pumps</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
    
  </div>
</div>
</div>
<script type="text/javascript">
var $=jQuery;
function branch_data(){
$.ajax({
type: "POST",
url: " <?php echo site_url('branch/GetBranchData'); ?>",
success: function(data) {
$('#show').html(data);
$('#mytable').DataTable();

}
});
}
$(document).ready(function() {

branch_data();

});

function addPumpSubmit() {
var branch_name = $('#branch_name').val();
// var pump_address = $('#pump_address').val();
var submit = $('#addPumpSubmit').val();
if(branch_name!=""){

$.ajax({
url: "<?php echo base_url("branch/create");?>",
type: "POST",
data: {
submit:submit,
branch_name: branch_name,
},
cache: false,
success: function(data){

$('#message').html(data);

branch_data();


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

pump_data();
}
});
}
function EditPumpSubmit()
{
var pump_name = $('#pump_name_edit').val();;
var id= $('#id').val();
var pump_address= $('#pump_address_edit').val();

$.ajax({
type: "POST",
url: " <?php echo site_url('pump/edit'); ?>",
data:{id:id,pump_address:pump_address,pump_name:pump_name},
success: function(data) {
$('#message_edit').html(data);

pump_data();
}
});
}
$(document).on("click", ".Edit", function () {
var pump_name = $(this).data('name');
var pump_address = $(this).data('address');
var id = $(this).data('id');
$(".modal-body #pump_name_edit").val( pump_name );
$(".modal-body #pump_address_edit").val( pump_address );
$(".modal-body #id").val( id );
});


</script>