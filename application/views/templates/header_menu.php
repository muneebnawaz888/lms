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
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <!-- The message -->
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- /.messages-menu -->
          <?php 
          $result=$this->db->query("SELECT * FROM assignments")
           ?>
          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks Menu -->
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
  