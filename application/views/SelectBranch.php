<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" value="width=device-width, initial-scale=1.0">
    <title>Select Pump</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
    ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

      <link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css'); ?>">

    <!-- Google Fonts
    ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <!-- Bootstrap CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>">
    <!-- owl.carousel CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.carousel.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.theme.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.transitions.css'); ?>">
    <!-- meanmenu CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/meanmenu/meanmenu.min.css'); ?>">
    <!-- animate CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css'); ?>">
    <!-- normalize CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/normalize.css'); ?>">
    <!-- mCustomScrollbar CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/scrollbar/jquery.mCustomScrollbar.min.css'); ?>">
    <!-- jvectormap CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/jvectormap/jquery-jvectormap-2.0.3.css'); ?>">
    <!-- notika icon CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/notika-custom-icon.css'); ?>">
    <!-- wave CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/wave/waves.min.css'); ?>">
    <!-- main CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css'); ?>">
    <!-- style CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/style.css'); ?>">
    <!-- responsive CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.css'); ?>">

    <!-- modernizr JS
    ============================================ -->
    <script src="<?php echo base_url('assets/js/vendor/modernizr-2.8.3.min.js'); ?>"></script>
</head>

<body>
   
    
    
    <br><br><br><br><br>
<div class="notika-status-area">
        <div class="container">
            <div class="row">


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

</body>
</html>
 <!-- Modal -->
<div class="modal fade"  id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Pump</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                <div class="form-example-wrap">
                        <div class="cmp-tb-hd">
                            <h2>Add Pumps</h2>
                            
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
                                <label>Pump Name</label>
                                <div class="nk-int-st">
                                    <input type="text"  name="branch_name" class="form-control input-sm" placeholder="Enter Pump Name">
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int mg-t-15">
                            <div class="form-group">
                                <label>Address</label>
                                <div class="nk-int-st">
                                    <input type="text"  name="branch_address" class="form-control input-sm" placeholder="Enter Pump Address">
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

    <!-- jquery
    ============================================ -->
    <script src="<?php echo base_url('assets/js/vendor/jquery-1.12.4.min.js'); ?>"></script>
    <!-- bootstrap JS
    ============================================ -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <!-- wow JS
    ============================================ -->
    <script src="<?php echo base_url('assets/js/wow.min.js'); ?>"></script>
    <!-- price-slider JS
    ============================================ -->
    <script src="<?php echo base_url('assets/js/jquery-price-slider.js'); ?>"></script>
    <!-- owl.carousel JS
    ============================================ -->
    <script src="<?php echo base_url('assets/js/owl.carousel.min.js'); ?>"></script>
    <!-- scrollUp JS
    ============================================ -->
    <script src="<?php echo base_url('assets/js/jquery.scrollUp.min.js'); ?>"></script>
    <!-- meanmenu JS
    ============================================ -->
    <script src="<?php echo base_url('assets/js/meanmenu/jquery.meanmenu.js'); ?>"></script>
    <!-- counterup JS
    ============================================ -->
    <script src="<?php echo base_url('assets/js/counterup/jquery.counterup.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/counterup/waypoints.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/counterup/counterup-active.js'); ?>"></script>
    <!-- mCustomScrollbar JS
    ============================================ -->
    <script src="<?php echo base_url('assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js'); ?>"></script>
    <!-- jvectormap JS
    ============================================ -->
    <script src="<?php echo base_url('assets/js/jvectormap/jquery-jvectormap-2.0.2.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jvectormap/jvectormap-active.js'); ?>"></script>
    <!-- sparkline JS
    ============================================ -->
    <script src="<?php echo base_url('assets/js/sparkline/jquery.sparkline.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/sparkline/sparkline-active.js'); ?>"></script>
    <!-- sparkline JS
    ============================================ -->
    <script src="<?php echo base_url('assets/js/flot/jquery.flot.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/flot/jquery.flot.resize.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/flot/curvedLines.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/flot/flot-active.js'); ?>"></script>
    <!-- knob JS
    ============================================ -->
    <script src="<?php echo base_url('assets/js/knob/jquery.knob.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/knob/jquery.appear.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/knob/knob-active.js'); ?>"></script>
    <!--  wave JS
    ============================================ -->
    <script src="<?php echo base_url('assets/js/wave/waves.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/wave/wave-active.js'); ?>"></script>
    <!--  todo JS
    ============================================ -->
    <script src="<?php echo base_url('assets/js/todo/jquery.todo.js'); ?>"></script>
    <!-- plugins JS
    ============================================ -->
    <script src="<?php echo base_url('assets/js/plugins.js'); ?>"></script>
  <!--  Chat JS
    ============================================ -->
    <script src="<?php echo base_url('assets/js/chat/moment.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/chat/jquery.chat.js'); ?>"></script>
    <!-- main JS
    ============================================ -->
    <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
  <!-- tawk chat JS
    ============================================ -->
    

