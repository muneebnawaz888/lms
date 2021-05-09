 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        
        <?php if($user_permission): ?>
           <li id="dashboardMainMenu">
          <a href="<?php echo base_url('dashboard') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
          <?php if(in_array('createUser', $user_permission) || in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
            <li class="treeview" id="mainUserNav">
            <a href="#">
              <i class="fa fa-users"></i>
              <span>Users</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php if(in_array('createUser', $user_permission)): ?>
              <li id="createUserNav"><a href="<?php echo base_url('users/create') ?>"><i class="fa fa-circle-o"></i> Add User</a></li>
              <?php endif; ?>

              <?php if(in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
              <li id="manageUserNav"><a href="<?php echo base_url('users') ?>"><i class="fa fa-circle-o"></i> Manage Users</a></li>
            <?php endif; ?>
            </ul>
          </li>
          <?php endif; ?>

          <?php if(in_array('createGroup', $user_permission) || in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)): ?>
            <li class="treeview" id="mainGroupNav">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Groups</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <?php if(in_array('createGroup', $user_permission)): ?>
                  <li id="addGroupNav"><a href="<?php echo base_url('groups/create') ?>"><i class="fa fa-circle-o"></i> Add Group</a></li>
                <?php endif; ?>
                <?php if(in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)): ?>
                <li id="manageGroupNav"><a href="<?php echo base_url('groups') ?>"><i class="fa fa-circle-o"></i> Manage Groups</a></li>
                <?php endif; ?>
              </ul>
            </li>
          <?php endif; ?>

          <?php if(in_array('createCourse', $user_permission) || in_array('updateCourse', $user_permission) || in_array('viewCourse', $user_permission) || in_array('deleteCourse', $user_permission)): ?>
            <li class="treeview" id="mainCourseNav">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Courses</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <?php if(in_array('createCourse', $user_permission)): ?>
                  <li id="addCourseNav"><a href="<?php echo base_url('course/') ?>"><i class="fa fa-circle-o"></i> Add Course</a></li>
                <?php endif; ?>
                <?php if(in_array('updateCourse', $user_permission) || in_array('viewCourse', $user_permission) || in_array('deleteCourse', $user_permission)): ?>
                <li id="manageCourseNav"><a href="<?php echo base_url('course') ?>"><i class="fa fa-circle-o"></i> Manage Courses</a></li>
                <?php endif; ?>
              </ul>
            </li>
          <?php endif; ?>
            <?php endif; ?>
      <li class="treeview" id="mainGroupNav">
              <a href="#">
                <i class="fa fa-filter"></i>
                <span>Options</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
               <?php if(in_array('createBranch', $user_permission) || in_array('updateBranch', $user_permission) || in_array('vieBranch', $user_permission) || in_array('deleteBranch', $user_permission)): ?>
                <li><a href="<?php echo base_url('branch/') ?>"><i class="fa fa-user-o"></i> <span>Branch</span></a></li>
                 <?php endif; ?>
                  <li><a href="<?php echo base_url('users/profile/') ?>"><i class="fa fa-user-o"></i> <span>Profile</span></a></li>
                
               <li><a href="<?php echo base_url('users/setting/') ?>"><i class="fa fa-wrench"></i> <span>Setting</span></a></li>
                <li><a href="<?php echo base_url('users/logout/') ?>"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
              </ul>
            </li>

<!--admin Menu items end--> 
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>