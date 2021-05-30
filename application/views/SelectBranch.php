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
<body class="hold-transition login-page">

<div class="container-fluid">
  
  <div class="row">
      <div class="col-sm-12">
        

    <?php if($branch_data): ?>                  
                        <?php foreach ($branch_data as $branch_key => $branch_value): ?>
                            <?php 

                            $user_id = $this->session->userdata('id');
                            if($user_id==1):
                                ?>
                                
           
                      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" style="background-color: #5B5B5B; margin-left: 25px; margin-top: 100px; width: 300px; border-radius: 5px; ">
                        <a href="<?php echo base_url('dashboard/proceed') ?>/<?php echo $branch_value['branch_id']; ?>" style="color: white; text-align: center;">
                        <div class="dash-box">
                            <div class="website-traffic-ctn align-center" style="padding-top: 30px">
                               
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
                               <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" style="background-color: #5B5B5B; margin-left: 25px; margin-top: 100px; width: 300px; border-radius: 5px; ">
                        <a href="<?php echo base_url('dashboard/proceed') ?>/<?php echo $branch_value['branch_id']; ?>" style="color: white; text-align: center;">
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

</body>
</html>
