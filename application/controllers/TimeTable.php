<?php 

class TimeTable extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Time Table';
		

		$this->load->model('model_timetable','timetable');
		$this->load->model('model_users','users');
		$this->load->model('model_groups','groups');
		$this->load->model('model_course','course');
	}
	public function index()
	{

		$this->render_template('timetable/index', $this->data);
	}
	public function generate()
	{
		$lectures=array(
			'08:00,09:00',
			'09:00,10:00',
			'10:00,11:00',
			'11:30,12:30',
			'12:30,01:30',
		);
		$days=array('Monday','Tuesday','Wednesday','Thursday','Friday');

		$user_data = $this->users->getUserData();

		$teachers = array();
		foreach ($user_data as $k => $v) {

			

			$group = $this->users->getUserGroup($v['id']);
			if ($group['type']==0) {
				$teachers[$k]['user_info'] = $v;
				$teachers[$k]['user_group'] = $group;
			}
			
		}
		$subject_data = $this->course->GetCourseSubjectData();

		echo '<pre>';
		var_dump($lectures);
		var_dump($days);
		var_dump($teachers);
		var_dump($subject_data);
		echo '</pre>';

		foreach ($teachers as $key => $teacher) {
			$start_time=$teacher['user_info']['start_time'];
			$end_time=$teacher['user_info']['end_time'];
			foreach($lectures as $lecture){
				$time=explode($lecture);
				
			}
		}
		
	}

}