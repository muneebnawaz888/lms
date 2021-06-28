<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();

		$this->data['page_title'] = 'Course';		
		$this->load->model('model_course');
	}
	public function index()
	{
		if(!in_array('viewCourse', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->render_template('course/index', $this->data);
	}
	public function subjects()
	{
		if(!in_array('viewSubject', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		$course_data = $this->model_course->getCourseData();
	   	$this->data['course_data']=$course_data;
		$this->render_template('course/subjects', $this->data);
	}
	public function GetCourseData()
	{
		if(!in_array('viewCourse', $this->permission) ) {
			redirect('dashboard', 'refresh');
		}
		
		$course_data = $this->model_course->getCourseData();
	   $this->data['course_data']=$course_data;
	   $this->load->view('course/course_ajax_table',$this->data);
	}
	public function GetCourseSubjectData()
	{
		if(!in_array('viewSubject', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		
		$subject_data = $this->model_course->GetCourseSubjectData();
	   $this->data['subject_data']=$subject_data;
	   $this->load->view('course/course_subject_ajax_table',$this->data);
	}

	public function create()
	{
		if(!in_array('createCourse', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
			$branch_id = $this->session->userdata('branch_id');
           
        	$data = array(
        		'course_name' => $this->input->post('course_name'),
        		'branch_id' 	=> $branch_id

        		);

        	$create = $this->model_course->create($data);



        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		if($this->input->post('check')=="check"){
        			redirect('dashboard/SelectCourse', 'refresh');
        		}else{
        			echo( '<div class="alert alert-info alert-dismissible" role="alert">
					      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> Succesfully Inserted
					  </div>' );
					   
        			
        		}
        		
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		if($this->input->post('check')=="check"){
        			redirect('dashboard/SelectCourse', 'refresh');
        		}else{
        			echo( '<div class="alert alert-danger alert-dismissible alert-mg-b-0" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>  Error Occoured
                            </div>' );
        		}
        	}
        	

		
	}
	public function create_subject()
	{
		if(!in_array('createSubject', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

           $branch_id = $this->session->userdata('branch_id');
        	$data = array(
        		'subject_name' => $this->input->post('subject_name'),
        		'course_ids' => json_encode($this->input->post('course_ids')),
        		'branch_id'	=> $branch_id
        		);

        	$create = $this->model_course->create_subject($data);

        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        	
    			echo( '<div class="alert alert-info alert-dismissible" role="alert">
				      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> Succesfully Inserted
				  </div>' );

        		
        		
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        	
			echo( '<div class="alert alert-danger alert-dismissible alert-mg-b-0" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>  Error Occoured
                    </div>' );
        		
        	}	
	}

	public function edit()
	{
		if(!in_array('updateCourse', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		$id= $this->input->post('id');
	       $data = array(
        		'course_name' => $this->input->post('course_name'),
        		);
    	$update = $this->model_course->edit($data, $id);
    	if($update == true) {
    		echo( '<div class="alert alert-info alert-dismissible" role="alert">
					      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> Succesfully Updated
					  </div>' );
    	}
    	else {
    		echo( '<div class="alert alert-danger alert-dismissible alert-mg-b-0" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> Error Occoured
                            </div>' );
    	}
	}
	        
	public function edit_subject()
	{
		if(!in_array('updateSubject', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		$id= $this->input->post('id');
	       $data = array(
        		'subject_name' => $this->input->post('subject_name'),
        		'course_ids' => json_encode($this->input->post('course_ids')),
        		);
    	$update = $this->model_course->edit_subject($data, $id);
    	if($update == true) {
    		echo( '<div class="alert alert-info alert-dismissible" role="alert">
					      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> Succesfully Updated
					  </div>' );
    	}
    	else {
    		echo( '<div class="alert alert-danger alert-dismissible alert-mg-b-0" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> Error Occoured
                            </div>' );
    	}
	}
	      

	public function delete()
	{
		if(!in_array('deleteCourse', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
        $id=$this->input->post('id');
    	$delete = $this->model_course->delete($id);
    	if($delete == true) {
    		echo( '<div class="alert alert-info alert-dismissible" role="alert">
					      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> Succesfully Deleted
					  </div>' );
    	}
    	else {
    		echo( '<div class="alert alert-danger alert-dismissible alert-mg-b-0" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> Error Occoured
                            </div>' );
    	}	
	}
}