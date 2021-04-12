 <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                    <div class="data-table-list  shadow">
                        <div class="basic-tb-hd">
                            <h2 class="border_b">Pumps</h2>
                                    
                          
                          <?php if(in_array('createPump', $user_permission)): ?>
                           
                          <button class="btn btn-shadow add-new" data-toggle="modal" data-target="#addpump"><i class="fa fa-plus"></i></button>
                            
                          <?php endif; ?>
               
                        </div>
                        <div id="main_response"></div>
                        <div class="table-responsive" id="show">
                        
                        </div>
                    </div>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Pumps</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <div id="message">  </div>
        
      
      <div class="modal-body">
       <div class="form-example-int">
                            <div class="form-group">
                                <label>Pump Name</label>
                                <div class="nk-int-st">
                                    <input type="text" required name="pump_name"  id="pump_name" class="form-control input-sm" placeholder="Enter Pump Name">
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int mg-t-15">
                            <div class="form-group">
                                <label>Address</label>
                                <div class="nk-int-st">
                                    <input type="text" required name="pump_address" id="pump_address" class="form-control input-sm" placeholder="Enter Pump Address">
                                </div>
                            </div>
                        </div>
          
                      
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
   function pump_data(){
          $.ajax({  
                    type: "POST",  
                    url: " <?php echo site_url('pump/GetPumpData'); ?>",
                    success: function(data) {
                        $('#show').html(data);
                       $('#mytable').DataTable();
                        
                    }
                });
   }

    $(document).ready(function() {
     
            pump_data();
    
    });
   

 function addPumpSubmit() {
    var pump_name = $('#pump_name').val();
    var pump_address = $('#pump_address').val();
    var submit = $('#addPumpSubmit').val();
    if(pump_name!="" && pump_address!=""){
      
      $.ajax({
        url: "<?php echo base_url("pump/create");?>",
        type: "POST",
        data: {
          submit:submit,
          pump_name: pump_name,
          pump_address: pump_address
        },
        cache: false,
        success: function(data){
       

          $('#message').html(data);
        

      pump_data();
          
          
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


