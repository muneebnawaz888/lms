<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  
  
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css') ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css') ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/square/blue.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/style.css') ?>">

 

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>



 <?php if($branch_data): ?>                  
                    <?php foreach ($branch_data as $branch_key => $branch_value): ?>
                        <?php 

                        $user_id = $this->session->userdata('id');
                        if($user_id==1):
                            ?>
                            
       
                  <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <a href="<?php echo base_url('dashboard/proceed') ?>/<?php echo $branch_value['branch_id']; ?>">
                    <div class="dash-box">
                        <div class="website-traffic-ctn align-center" style="padding-top: 30px">
                            <img src="<?php echo base_url('assets/images/branch.png'); ?>" style="height: 100px !important;width: auto !important;" >
                            <br>
                            <h4><?php echo $branch_value['branch_name']; ?></h4>
                        </div>
                        <div class="sparkline-bar-stats1"><canvas width="58" height="36" style="display: inline-block; width: 58px; height: 36px; vertical-align: top;"></canvas></div>
                    </div>
                </a>
                </div>
               
                            <?php
                        else:
                            ?>
                     
                         <?php if(in_array(preg_replace('/\s+/', '', $branch_value['branch_name']), $user_permission)): ?>
                           <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <a href="<?php echo base_url('dashboard/proceed') ?>/<?php echo $branch_value['branch_id']; ?>">
                    <div class="dash-box">
                        <div class="website-traffic-ctn align-center" style="padding-top: 30px">
                            <img src="<?php echo base_url('assets/images/branch.png'); ?>" style="height: 100px !important;width: auto !important;" >
                            <br>
                            <h4><?php echo $branch_value['branch_name']; ?></h4>
                        </div>
                        <div class="sparkline-bar-stats1"><canvas width="58" height="36" style="display: inline-block; width: 58px; height: 36px; vertical-align: top;"></canvas></div>
                    </div>
                </a>
                </div>
                 <?php  endif;
                        ?>
                <?php endif; ?>
      <?php endforeach ?>
                  <?php endif; ?>
          
            </div>
        </div>
    </div>
<?php
$user_id = $this->session->userdata('id');
                        if($user_id==1): 
?>
    <div class="notika-status-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-offset-4 col-sm-4" style="text-align: center;">
        <button class="btn btn-default delete" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i></button>
    </div>
 <?php endif; ?>
          
            </div>
        </div>
    </div>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->

<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js') ?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
 <!-- Modal -->
<div class="modal fade"  id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Branch</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                <div class="form-example-wrap">
                        <div class="cmp-tb-hd">
                            <h2>Add Branch</h2>
                            
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
                        </div>

              <form action="<?php echo base_url('branch/create') ?>" method="post">
                        <div class="form-example-int">
                            <div class="form-group">
                                <label>Branch Name</label>
                                <div class="nk-int-st">
                                    <input type="text"  name="branch_name" class="form-control input-sm" placeholder="Enter Branch Name">
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int mg-t-15">
                            <div class="form-group">
                                <label>Address</label>
                                <div class="nk-int-st">
                                    <input type="text"  name="branch_address" class="form-control input-sm" placeholder="Enter Branch Address">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="check" value="check">
          
                     
                   
                    
      </div>
      
      <div class="modal-footer">
         <button type="submit" name="submit" class="btn btn-primary">ADD</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>