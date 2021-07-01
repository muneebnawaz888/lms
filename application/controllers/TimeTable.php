<?php 

class TimeTable extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Time Table';
		

		$this->load->model('model_timetable','TimeTable');
		$this->load->model('model_users','users');
		$this->load->model('model_groups','groups');
		$this->load->model('model_course','course');
	}
	public function index()
	{
		$this->data['timetable']=$this->TimeTable->getTimeTableData();
		$this->render_template('timetable/index', $this->data);
	}
	public function generate()
	{
		$this->db->query("TRUNCATE TABLE `timetable`");
		//ini_set('memory_limit', '-1');
		$TimeTable=array();
		$TimeTable_shuffle=array();
		$TimeTable_final=array();
		
		$course_data = $this->course->GetCourseData();



		foreach ($course_data as $ck => $cv) {
			$TimeTable[$cv['course_name']]['course_id']=$cv['course_id'];
			$TimeTable[$cv['course_name']]['subjects']=$this->_get_course_subject($cv['course_id']);
		}
		$TimeTable_shuffle=$this->_shuffle($TimeTable);
		// echo '<pre>';
		// //var_dump($TimeTable);
		// //var_dump($TimeTable_shuffle);
		// var_dump($this->_check_shuffle($TimeTable_shuffle));
		// echo '</pre>';
		$TimeTable_final=array('time_table'=>serialize($this->_check_shuffle($TimeTable_shuffle)));
		$create=$this->db->insert('timetable',$TimeTable_final);
		if($create == true) {
    		$this->session->set_flashdata('success', 'Successfully created');
    		redirect('TimeTable/', 'refresh');
    	}
    	else {
    		$this->session->set_flashdata('errors', 'Error occurred!!');
    		redirect('TimeTable/', 'refresh');
    	}
		
	}
	public function _get_course_subject($course_id=null)
	{
		$subject_data=array();
		$course_subject=array();
		$positions=array();
		$course_subject_json=array();
		$subject_data=$this->db->query("SELECT * FROM `subjects`")->result_array();
		foreach ($subject_data as $key => $value) {
			if (in_array($course_id,json_decode($value['course_ids']))) {

				$teacher_data=$this->_get_techer($value['subject_id']);
				
				
				$course_subject[$key]['subject_id']=$value['subject_id'];
				$course_subject[$key]['subject_name']=$value['subject_name'];
				$course_subject[$key]['teacher_name']=$teacher_data['firstname'] . ' ' . $teacher_data['lastname'];
				$course_subject[$key]['start_time']=strtotime($teacher_data['start_time']);
				$course_subject[$key]['end_time']=strtotime($teacher_data['end_time']);
				$course_subject[$key]['start_time_normal']=$teacher_data['start_time'];
				$course_subject[$key]['end_time_normal']=$teacher_data['end_time'];

				

			}
		}
		foreach ($course_subject as $key => $value) {
			$course_subject_json[$key]=json_encode($value);
		}
		 //return $course_subject_json;
		return $course_subject;
	}
	public function _get_techer($subject_id)
	{
		return $this->db->query("SELECT * FROM `users` WHERE subject='$subject_id'")->row_array();
	}
	public function _shuffle($TimeTable)
	{
		$subjects=array();
		$TimeTable_new=array();
		foreach ($TimeTable as $key => $value) {
			$subjects=$value['subjects'];
			
			$TimeTable_new[$key]['course_id']=$value['course_id'];

			shuffle($subjects);
			$TimeTable_new[$key]['subjects']['Monday']=$subjects;

			shuffle($subjects);
			$TimeTable_new[$key]['subjects']['Tuesday']=$subjects;

			shuffle($subjects);
			$TimeTable_new[$key]['subjects']['Wednesday']=$subjects;

			shuffle($subjects);
			$TimeTable_new[$key]['subjects']['Thursday']=$subjects;

			shuffle($subjects);
			$TimeTable_new[$key]['subjects']['Friday']=$subjects;

		}
		return $TimeTable_new;
	}
	public function _check_shuffle($TimeTable_shuffle)
	{
		$checks=0;
		$check_array=array();
		foreach ($TimeTable_shuffle as $tk => $tv) {
			$subjects=$tv['subjects'];
			foreach ($subjects as $sk => $sv) {
				foreach ($sv as $key => $value) {
			
					if ($key==0) {
						if ($value['start_time']<=strtotime('08:00:00') AND $value['end_time']>=strtotime('09:00:00')) {
							$check_array[]='true';
						}else{
							$check_array[]='false';
						}
					}elseif ($key==1) {
						if ($value['start_time']<=strtotime('09:00:00') AND $value['end_time']>=strtotime('10:00:00')) {
							$check_array[]='true';
						}else{
							$check_array[]='false';
						}
					}if ($key==2) {
						if ($value['start_time']<=strtotime('10:00:00') AND $value['end_time']>=strtotime('11:00:00')) {
							$check_array[]='true';
						}else{
							$check_array[]='false';
						}
					}if ($key==3) {
						if ($value['start_time']<=strtotime('11:30:00') AND $value['end_time']>=strtotime('12:30:00')) {
							$check_array[]='true';
						}else{
							$check_array[]='false';
						}
					}if ($key==4) {
						if ($value['start_time']<=strtotime('12:30:00') AND $value['end_time']>=strtotime('01:30:00')) {
							$check_array[]='true';
						}else{
							$check_array[]='false';
						}
					}
						
				}
			}
		}
		if ($checks>10) {
			return 'Cannot Generate A TimeTable Data not Optimal';
		}else{
			if (in_array('false',$check_array)) {
				$checks=$checks+1;
				$this->_check_shuffle($this->_shuffle($TimeTable_shuffle));
			}else{
				return $TimeTable_shuffle;
			}
		}
		
	}

}