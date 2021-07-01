<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Time Table
    <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Time Table</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    
    <div class="row">
      <div class="col-lg-12 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3 style="text-align:center;">Generate Time Table</h3>
            <p style="text-align:center;">Click the Button to Generate the timatable</p>
          </div>
          <div class="icon">
            <i class="ion ion-clock"></i>
          </div>
          <a href="<?php echo base_url('TimeTable/generate') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
    <!-- /.row -->
    <?php 
// echo '<pre>';
// var_dump(unserialize($timetable['time_table']));
// echo '</pre>';
    $time_table=unserialize($timetable['time_table']);
     ?>
    <div class="row">
      <?php foreach ($time_table as $key => $value) { 
        $subjects=$value['subjects']; ?>
        <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h1 style="font-size: 80px; text-align: center;font-weight: 900;"><?php echo $key; ?></h1>
          </div>
          <div class="box-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th></th>
                  <th>08:00,09:00</th>
                  <th>09:00,10:00</th>
                  <th>10:00,11:00</th>
                  <th>11:00,11:30</th>
                  <th>11:30,12:30</th>
                  <th>12:30,01:30</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th>Monday</th>
                  <td><?php echo $subjects['Monday'][0]['teacher_name']; ?> <br> <small>(<?php echo $subjects['Monday'][0]['subject_name']; ?>)</small></td>
                  <td><?php echo $subjects['Monday'][1]['teacher_name']; ?> <br> <small>(<?php echo $subjects['Monday'][1]['subject_name']; ?>)</small></td>
                  <td><?php echo $subjects['Monday'][2]['teacher_name']; ?> <br> <small>(<?php echo $subjects['Monday'][2]['subject_name']; ?>)</small></td>
                  <th>Break</th>
                  <td><?php echo $subjects['Monday'][3]['teacher_name']; ?> <br> <small>(<?php echo $subjects['Monday'][3]['subject_name']; ?>)</small></td>
                  <td><?php echo $subjects['Monday'][4]['teacher_name']; ?> <br> <small>(<?php echo $subjects['Monday'][4]['subject_name']; ?>)</small></td>
                </tr>
                <tr>
                  <th>Tuesday</th>
                  <td><?php echo $subjects['Tuesday'][0]['teacher_name']; ?> <br> <small>(<?php echo $subjects['Tuesday'][0]['subject_name']; ?>)</small></td>
                  <td><?php echo $subjects['Tuesday'][1]['teacher_name']; ?> <br> <small>(<?php echo $subjects['Tuesday'][1]['subject_name']; ?>)</small></td>
                  <td><?php echo $subjects['Tuesday'][2]['teacher_name']; ?> <br> <small>(<?php echo $subjects['Tuesday'][2]['subject_name']; ?>)</small></td>
                  <th>Break</th>
                  <td><?php echo $subjects['Tuesday'][3]['teacher_name']; ?> <br> <small>(<?php echo $subjects['Tuesday'][3]['subject_name']; ?>)</small></td>
                  <td><?php echo $subjects['Tuesday'][4]['teacher_name']; ?> <br> <small>(<?php echo $subjects['Tuesday'][4]['subject_name']; ?>)</small></td>
                </tr>
                <tr>
                  <th>Wednesday</th>
                  <td><?php echo $subjects['Wednesday'][0]['teacher_name']; ?> <br> <small>(<?php echo $subjects['Wednesday'][0]['subject_name']; ?>)</small></td>
                  <td><?php echo $subjects['Wednesday'][1]['teacher_name']; ?> <br> <small>(<?php echo $subjects['Wednesday'][1]['subject_name']; ?>)</small></td>
                  <td><?php echo $subjects['Wednesday'][2]['teacher_name']; ?> <br> <small>(<?php echo $subjects['Wednesday'][2]['subject_name']; ?>)</small></td>
                  <th>Break</th>
                  <td><?php echo $subjects['Wednesday'][3]['teacher_name']; ?> <br> <small>(<?php echo $subjects['Wednesday'][3]['subject_name']; ?>)</small></td>
                  <td><?php echo $subjects['Wednesday'][4]['teacher_name']; ?> <br> <small>(<?php echo $subjects['Wednesday'][4]['subject_name']; ?>)</small></td>
                </tr>
                <tr>
                  <th>Thursday</th>
                 <td><?php echo $subjects['Thursday'][0]['teacher_name']; ?> <br> <small>(<?php echo $subjects['Thursday'][0]['subject_name']; ?>)</small></td>
                  <td><?php echo $subjects['Thursday'][1]['teacher_name']; ?> <br> <small>(<?php echo $subjects['Thursday'][1]['subject_name']; ?>)</small></td>
                  <td><?php echo $subjects['Thursday'][2]['teacher_name']; ?> <br> <small>(<?php echo $subjects['Thursday'][2]['subject_name']; ?>)</small></td>
                  <th>Break</th>
                  <td><?php echo $subjects['Thursday'][3]['teacher_name']; ?> <br> <small>(<?php echo $subjects['Thursday'][3]['subject_name']; ?>)</small></td>
                  <td><?php echo $subjects['Thursday'][4]['teacher_name']; ?> <br> <small>(<?php echo $subjects['Thursday'][4]['subject_name']; ?>)</small></td>
                </tr>
                <tr>
                  <th>Friday</th>
                  <td><?php echo $subjects['Friday'][0]['teacher_name']; ?> <br> <small>(<?php echo $subjects['Friday'][0]['subject_name']; ?>)</small></td>
                  <td><?php echo $subjects['Friday'][1]['teacher_name']; ?> <br> <small>(<?php echo $subjects['Friday'][1]['subject_name']; ?>)</small></td>
                  <td><?php echo $subjects['Friday'][2]['teacher_name']; ?> <br> <small>(<?php echo $subjects['Friday'][2]['subject_name']; ?>)</small></td>
                  <th>Break</th>
                  <td>-</td>
                  <td>-</td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>
      </div>
      <?php } ?>
     
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
$(document).ready(function() {
$("#dashboardMainMenu").addClass('active');
});
</script>
<style type="text/css">
/*  tr{
    height: 80px;
  }
  td,th{
    font-size: 30px;
    text-align: center;
  }
  small{
        font-size: 20px;
  }*/
</style>