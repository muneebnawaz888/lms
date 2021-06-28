<?php 

class TimeTable extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Time Table';
		

		$this->load->model('model_timetable','timetable');
	}
	public function index()
	{

		$this->render_template('timetable/index', $this->data);
	}
	public function generate()
	{
		// code...
	}
}