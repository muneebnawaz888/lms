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
		$user_id = $this->session->userdata('id');
		$user_group = $this->users->getUserGroup($user_id);
		$user_data = $this->users->getUserData($user_id);
		if ($user_group['type']==0) {
			$assignment_data = $this->assignment->getAssignmentData();
		}elseif($user_group['type']==-1){
			$assignment_data = $this->assignment->getAssignmentData(null,'-1');
		}else{
			$assignment_data = $this->assignment->getAssignmentDataStudent();
		}
		
	   $this->data['assignment_data']=$assignment_data;
	   $this->load->view('assignment/assignment_ajax_table',$this->data);
	}
	public function create()
	{
		if(!in_array('createAssingemnt', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

           $user_id = $this->session->userdata('id');
        	$data = array(
        		'assignment_duration' => $this->input->post('assignment_duration'),
        		'assignment_name' => $this->input->post('assignment_name'),
        		'announcment_subject' => $this->input->post('announcment_subject'),
        		'assignment_marks' => $this->input->post('assignment_marks'),
        		'assignment_des' => $this->input->post('assignment_des'),
        		'user_id' => $this->session->userdata('id'),
        		'branch_id' => $this->session->userdata('branch_id'),
         		);

        	$create = $this->assignment->create($data);



        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		if($this->input->post('check')=="check"){
        			redirect('dashboard/SelectBranch', 'refresh');
        		}else{
        			echo( '<div class="alert alert-info alert-dismissible" role="alert">
					      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> Succesfully Inserted
					  </div>' );
					   
        			
        		}
        		
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		if($this->input->post('check')=="check"){
        			redirect('dashboard/SelectBranch', 'refresh');
        		}else{
        			echo( '<div class="alert alert-danger alert-dismissible alert-mg-b-0" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>  Error Occoured
                            </div>' );
        		}
        	}
        	

		
	}
		public function delete()
	{
		if(!in_array('deleteAssingemnt', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
        $id=$this->input->post('id');
    	$delete = $this->assignment->delete($id);
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
	public function add_assingemnt()
    {
    	  $user_id = $this->session->userdata('id');
    	$files = $_FILES;
    	$file='';
        // If file upload form submitted
        if (!empty($_FILES['file']['name'])) {

            $_FILES['file']['name'] = $files['file']['name'];
            $_FILES['file']['type'] = $files['file']['type'];
            $_FILES['file']['tmp_name'] = $files['file']['tmp_name'];
            $_FILES['file']['error'] = $files['file']['error'];
            $_FILES['file']['size'] = $files['file']['size'];

            // File upload configuration
            $config['upload_path']   = './assets/uploads/';
            $config['allowed_types'] = '*';
            /*$config['max_size'] = '2';*/

            // Load and initialize upload library
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('file');
            $data1 = $this->upload->data();
            $file = $data1['file_name'];

        } else {
            $file = '';
        }
        $file = array('file' =>  $file,'user_id'=>$user_id,'assignment_id'=>$_POST['id']);
        $create=$this->db->insert('assignment_sub',$data);
        if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('assignment/', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('assignment/', 'refresh');
        	}
    }


}