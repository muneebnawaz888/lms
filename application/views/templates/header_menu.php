  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>dmin</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
         
          <!-- /.messages-menu -->
          <?php 
        
          $user_id = $this->session->userdata('id');
          $sql = "SELECT * FROM user_group WHERE user_id = ?";
          $query = $this->db->query($sql, array($user_id));
          $result = $query->row_array();
          $group_id = $result['group_id'];
          $g_sql = "SELECT * FROM groups WHERE id = ?";
          $g_query = $this->db->query($g_sql, array($group_id));
          $user_group = $g_query->row_array();
          


              $assignment_data=array();
              $course_subject=array();
              $user_id = $this->session->userdata('id');
              $branch_id = $this->session->userdata('branch_id');
              $user_data=$this->db->query("SELECT * FROM `users`WHERE id='$user_id'")->row_array();
              $course=$user_data['course'];
              $subject_data=$this->db->query("SELECT * FROM `subjects`")->result_array();
              foreach ($subject_data as $key => $value) {
                if (in_array($course,json_decode($value['course_ids']))) {
                  $course_subject[]=$value['subject_id'];
                }
              }
              
              $result = $this->db->query("SELECT * FROM assignments ")->result_array();
              
              foreach ($result as $key => $value) {
                $announcment_subject=$value['announcment_subject'];
                if (in_array($announcment_subject,$course_subject)) {
                  $assignment_data[]=$value;
                }
              }


          
          
          if ($user_group['type']==1) { ?>
            <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
             <?php $count_as=0; foreach ($assignment_data as $key => $value) { ?>
                    <?php 
                    $assignment_id=$value['assignment_id'];
                    $assignment_sub = $this->db->query("SELECT * FROM assignment_sub WHERE assignment_id='$assignment_id' AND user_id='$user_id'")->row_array();
                    if ($assignment_sub['file']!='') {
                      continue;
                    }
                    $count_as=$count_as+1;
                  }
                     ?>
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"><?php echo $count_as; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <?php echo $count_as; ?> notifications</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <?php foreach ($assignment_data as $key => $value) { ?>
                    <?php 
                    $assignment_id=$value['assignment_id'];
                    $assignment_sub = $this->db->query("SELECT * FROM assignment_sub WHERE assignment_id='$assignment_id' AND user_id='$user_id'")->row_array();
                    if ($assignment_sub['file']!='') {
                      continue;
                    }
                     ?>
                    <li><!-- start notification -->
                    <a href="<?php echo base_url('assignment') ?>">
                      <i class="fa fa-gears text-aqua"></i> <?php echo $value['assignment_des'] ?>
                    </a>
                  </li>
                  <?php } ?>
                  
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="<?php echo base_url('assignment') ?>">View all</a></li>
            </ul>
          </li>
          <?php  } ?>

          
          <!-- Tasks Menu -->
          <?php $user_id = $this->session->userdata('id');
                            if($user_id==1){ ?>
 <?php $count=0; foreach ($branch_data as $branch_key => $branch_value){ $count=$count+1; }  ?>
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-gears"></i>
              <span class="label label-danger"><?php echo $count; ?></span>
            </a>
            
            <ul class="dropdown-menu">
              <li class="header">You have <?php echo $count; ?> branch</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                  <?php foreach ($branch_data as $branch_key => $branch_value){ ?> 
                     
                  <li><!-- Task item -->
                    <a href="<?php echo base_url('dashboard/proceed') ?>/<?php echo $branch_value['branch_id']; ?>">
                      <!-- Task title and progress text -->
                      <h3>
                        <?php echo $branch_value['branch_name']; ?>
                        <!-- <small class="pull-right">20%</small> -->
                      </h3>
                      <!-- The progress bar -->
                  
                    </a>
                  </li>
                     

                  <!-- end task item -->
                  <?php  } ?>
                </ul>
              </li>
              
            </ul>
          </li>
                           <?php }else{ ?> 
 <?php $count=0; foreach ($branch_data as $branch_key => $branch_value){ if(in_array(preg_replace('/\s+/', '', $branch_value['branch_name']), $user_permission)){ $count=$count+1; } } ?>
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-gears"></i>
              <span class="label label-danger"><?php echo $count; ?></span>
            </a>
            
            <ul class="dropdown-menu">
              <li class="header">You have <?php echo $count; ?> branch</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                  <?php foreach ($branch_data as $branch_key => $branch_value){ ?> 
                     <?php if(in_array(preg_replace('/\s+/', '', $branch_value['branch_name']), $user_permission)): ?>
                  <li><!-- Task item -->
                    <a href="<?php echo base_url('dashboard/proceed') ?>/<?php echo $branch_value['branch_id']; ?>">
                      <!-- Task title and progress text -->
                      <h3>
                        <?php echo $branch_value['branch_name']; ?>
                        <!-- <small class="pull-right">20%</small> -->
                      </h3>
                      <!-- The progress bar -->
                  
                    </a>
                  </li>
                     <?php endif; ?>

                  <!-- end task item -->
                  <?php  } ?>
                </ul>
              </li>
              
            </ul>
          </li>
                           <?php } ?>
         
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-filter"></i></a>
          </li>
          </li>
          
        </ul>
      </div>
    </nav>
  </header>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">

    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <ul class="control-sidebar-menu">
          <li>
            <a href="<?php echo base_url('users/profile/') ?>">
              <i class="menu-icon fa fa-user bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Profile</h4>
                <p>Click to Open Profile</p>
              </div>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('auth/setting') ?>">
              <i class="menu-icon fa fa-gears bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Setting</h4>

                <p>Click to Open Setting</p>
              </div>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('auth/logout') ?>">
              <i class="menu-icon fa fa-sign-out bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">logout</h4>

                <p>Click to logout</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

    </div>
  </aside>
    <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  