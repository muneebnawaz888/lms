<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Assignment extends Admin_Controller 
{

	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		
		$this->data['page_title'] = 'Assignments';
		$this->load->model('Model_assignment','assignment');
		$this->load->model('model_users','users');
		$this->load->model('model_course');
	}
	public function index()
	{
		if(!in_array('viewAssingemnt', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		// $course_data = $this->model_course->getCourseData();
	 //   	$this->data['course_data']=$course_data;
		$user_id = $this->session->userdata('id');

		$user_data = $this->users->getUserData($user_id);
		$this->data['user_data'] = $user_data;
		$subject_data = $this->model_course->GetCourseSubjectData();
		$this->data['subject_data']=$subject_data;
		$this->render_template('assignment/index', $this->data);
	}
	public function GetAssignmentData()
	{
		if(!in_array('viewAssingemnt', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		$assignment_data = $this->assignment->getAssignmentData();
	   $this->data['assignment_data']=$assignment_data;
	   $this->load->view('assignment/assignment_ajax_table',$this->data);
	}

}